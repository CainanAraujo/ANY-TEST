<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Affiliate;

class CadastroAfiliadosController extends Controller
{
    /**
     * Lista todos os afiliados cadastrados.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $affiliates = Affiliate::all();

        return response()->json([
            'affiliates' => $affiliates
        ], 200);
    }

    /**
     * Armazena um novo cadastro de afiliado.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'cnpj'          => 'required|string|max:20|unique:affiliates,cnpj',
            'tempo_empresa' => 'required|integer|min:0',
            'telefone'      => 'required|string|max:20',
            'email'         => 'required|email|max:255|unique:affiliates,email',
        ]);

        $affiliate = Affiliate::create([
            'nome_fantasia' => $validatedData['nome_fantasia'],  
            'cnpj'          => $validatedData['cnpj'],
            'tempo_empresa' => $validatedData['tempo_empresa'],
            'telefone'      => $validatedData['telefone'],
            'email'         => $validatedData['email'],
            'status'        => 'pending',
        ]);

        return response()->json([
            'message'   => 'Cadastro enviado para aprovação!',
            'affiliate' => $affiliate,
        ], 201);
    }

    /**
     * Atualiza os dados do afiliado.
     *
     * @param  Request  $request
     * @param  int      $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $affiliate = Affiliate::find($id);
        if (!$affiliate) {
            return response()->json(['message' => 'Afiliado não encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nome_local'            => 'sometimes|required|string|max:255',
            'celular'               => 'sometimes|required|string|max:20',
            'horario_funcionamento' => 'sometimes|required|string|max:255',
            'email'                 => 'sometimes|required|email|max:255|unique:affiliates,email,' . $affiliate->id,
            'cep'                   => 'sometimes|required|string|max:20',
            'bairro'                => 'sometimes|required|string|max:100',
            'rua'                   => 'sometimes|required|string|max:255',
            'cidade'                => 'sometimes|required|string|max:100',
            'uf'                    => 'sometimes|required|string|max:2',
            'categoria'             => 'sometimes|required|string|max:255',
            'demais_categorias'     => 'sometimes|nullable|string',
            'instagram'             => 'sometimes|nullable|string|max:255',
            'site'                  => 'sometimes|nullable|url|max:255',
        ]);

        $affiliate->update($validatedData);

        return response()->json([
            'message'   => 'Informações atualizadas com sucesso!',
            'affiliate' => $affiliate,
        ], 200);
    }

    /**
     * Envia ou atualiza a foto de perfil do afiliado.
     *
     * @param  Request  $request
     * @param  int      $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadProfilePhoto(Request $request, $id)
    {
        $affiliate = Affiliate::find($id);
        if (!$affiliate) {
            return response()->json(['message' => 'Afiliado não encontrado'], 404);
        }

        $request->validate([
            'foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('foto_perfil')->store('profile_images', 'public');
        $affiliate->update(['foto_perfil' => $imagePath]);

        return response()->json([
            'message'     => 'Foto de perfil atualizada com sucesso!',
            'foto_perfil' => $imagePath,
        ], 200);
    }
}
