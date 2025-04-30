<?php

// app/Http/Controllers/API/AuthController.php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Registra um novo usuário e gera um token de acesso.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome_completo'   => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'telefone'        => 'required|string|max:20',
            'email'           => 'required|string|email|max:255|unique:users',
            'password'        => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'nome_completo'   => $request->nome_completo,
            'data_nascimento' => $request->data_nascimento,
            'telefone'        => $request->telefone,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'      => 'Usuário registrado com sucesso!',
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user' => [
                'id'             => $user->id,
                'nome_completo'   => $user->nome_completo,
                'email'          => $user->email,
                'profile_photo'  => $user->profile_photo,
            ],
        ], 201);
    }

    /**
     * Realiza o login do usuário e gera um token.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciais inválidas!'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'      => 'Login realizado com sucesso!',
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user' => [
                'id'             => $user->id,
                'nome_completo'   => $user->nome_completo,
                'email'          => $user->email,
                'profile_photo'  => $user->profile_photo,
            ],
        ], 200);
    }

    /**
     * Realiza o logout do usuário revogando o token atual.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso!'
        ], 200);
    }

    /**
     * Recupera o usuário autenticado via token, incluindo link da foto.
     */
    public function getUserByToken(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Token inválido ou usuário não encontrado!'
            ], 401);
        }

        return response()->json([
            'message' => 'Usuário encontrado com sucesso!',
            'user' => [
                'id'             => $user->id,
                'nome_completo'   => $user->nome_completo,
                'email'          => $user->email,
                'profile_photo'  => $user->profile_photo,
            ],
        ], 200);
    }
}