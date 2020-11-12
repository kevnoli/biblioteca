<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    
    /**
     * Cria uma instância de AuthController.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Retorna o token JWT através das credenciais.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['cpf', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['erro' => 'Não autorizado'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Retorna o usuario logado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Faz logout (Invalida o token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['mensagem' => 'Desconectado com sucesso']);
    }

    /**
     * Atualizar um token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Retorna a estrutura do token.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_tipo' => 'bearer',
            'expira_em' => auth()->factory()->getTTL() * 60
        ]);
    }
}
