<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\ForgotPasswordMail;

class PasswordController extends Controller
{
    /**
     * Solicita a redefinição de senha.
     * Valida o e-mail e a data de nascimento, gera um código de 4 dígitos,
     * armazena-o e envia por e-mail.
     */
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'           => 'required|string|email',
            'data_nascimento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Verifica se o usuário existe com base no e-mail e data de nascimento
        $user = User::where('email', $request->email)
            ->where('data_nascimento', $request->data_nascimento)
            ->first();

        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado com as credenciais fornecidas!'
            ], 404);
        }

        // Gera um código de 4 dígitos
        $code = random_int(1000, 9999);

        // Armazena ou atualiza o código na tabela password_resets
        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            [
                'code'       => $code,
                'created_at' => Carbon::now(),
            ]
        );

        // Envia o código por e-mail utilizando um Mailable
        Mail::to($user->email)->send(new ForgotPasswordMail($code));

        return response()->json([
            'message' => 'Código de recuperação enviado para o seu e-mail!'
        ], 200);
    }

    /**
     * Confirma a alteração da senha.
     * Recebe o e-mail, o código e a nova senha (com confirmação),
     * valida o código e atualiza a senha do usuário.
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email',
            'code'     => 'required|digits:4',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Busca o registro do código
        $record = DB::table('password_resets')->where('email', $request->email)->first();

        if (!$record || $record->code != $request->code) {
            return response()->json([
                'message' => 'Código inválido!'
            ], 400);
        }

        // (Opcional) Verifique se o código não expirou com base no campo created_at

        // Atualiza a senha do usuário
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado!'
            ], 404);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Remove o registro do código
        DB::table('password_resets')->where('email', $request->email)->delete();

        return response()->json([
            'message' => 'Senha atualizada com sucesso!'
        ], 200);
    }
}
