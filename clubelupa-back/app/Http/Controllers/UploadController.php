<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validação do arquivo recebido
        $request->validate([
            'arquivo' => 'required|file|max:10240', // máximo 10MB, por exemplo
        ]);

        // Faz o upload e armazena na pasta 'uploads' dentro do bucket S3
        $path = $request->file('arquivo')->store('uploads', 's3');

        // Se desejar tornar o arquivo público:
        Storage::disk('s3')->setVisibility($path, 'public');

        // Recupera a URL do arquivo armazenado no S3
        $url = Storage::disk('s3')->url($path);

        return response()->json([
            'caminho' => $path,
            'url' => $url,
        ]);
    }
}
