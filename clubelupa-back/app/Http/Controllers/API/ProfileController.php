<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class ProfileController extends Controller
{
    /**
     * Exibe os dados do perfil do usuário autenticado.
     */
    public function show(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'user' => $user
        ], 200);
    }

    /**
     * Atualiza os dados do perfil do usuário autenticado.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'nome_completo' => 'required|string|max:255',
            'celular'       => 'nullable|string|max:20',
            'cpf'           => 'nullable|string|max:20',
            'email'         => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'cep'           => 'nullable|string|max:10',
            'rua'           => 'nullable|string|max:255',
            'bairro'        => 'nullable|string|max:255',
            'cidade'        => 'nullable|string|max:255',
            'uf'            => 'nullable|string|max:2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user->update($validator->validated());

        return response()->json([
            'message' => 'Perfil atualizado com sucesso!',
            'user'    => $user,
        ], 200);
    }

    /**
     * Atualiza a foto de perfil do usuário autenticado via upload para S3 usando AWS SDK manual.
     */
    public function updateProfilePhoto(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'profile_photo' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $file = $request->file('profile_photo');
        $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $s3Path   = 'profile_photos/' . $user->id . '/' . $fileName;

        // Configurações do S3 a partir de config/filesystems.php
        $config = config('filesystems.disks.s3');

        try {
            // Instancia o cliente AWS S3
            $s3Client = new S3Client([
                'version'     => 'latest',
                'region'      => $config['region'],
                'credentials' => [
                    'key'    => $config['key'],
                    'secret' => $config['secret'],
                ],
            ]);

            // Parâmetros comuns
            $params = [
                'Bucket'      => $config['bucket'],
                'Key'         => $s3Path,
                'SourceFile'  => $file->getPathname(),
                'ContentType' => $file->getMimeType(),
            ];

            try {
                // Primeiro tenta com ACL public-read
                $result = $s3Client->putObject($params + ['ACL' => 'public-read']);
            } catch (S3Exception $ex) {
                if ($ex->getAwsErrorCode() === 'AccessControlListNotSupported') {
                    Log::warning('Bucket não suporta ACLs, fazendo upload sem ACL', [
                        'user_id' => $user->id,
                        'path'    => $s3Path,
                    ]);
                    // Retry sem ACL
                    $result = $s3Client->putObject($params);
                } else {
                    throw $ex;
                }
            }

            // URL pública retornada pelo SDK
            $url = $result['ObjectURL'] ?? $s3Client->getObjectUrl($config['bucket'], $s3Path);

        } catch (\Exception $e) {
            Log::error('Erro ao realizar upload via AWS SDK manual', [
                'user_id'   => $user->id,
                'path'      => $s3Path,
                'exception' => $e->getMessage(),
            ]);

            return response()->json([
                'error' => 'Erro ao realizar o upload da foto.'
            ], 500);
        }

        // Salva a URL no usuário
        $user->profile_photo = $url;
        $user->save();

        Log::info('Foto de perfil enviada com sucesso via AWS SDK manual', [
            'user_id' => $user->id,
            'path'    => $s3Path,
            'url'     => $url,
        ]);

        return response()->json([
            'message'       => 'Foto de perfil atualizada com sucesso!',
            'profile_photo' => $url
        ], 200);
    }
}
