<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        $credenciais = request(['cpf', 'password']);

        if ($token = Auth::attempt($credenciais)) {
            return response()->json()->header('Authorization', $token);
        } else {
            return response()->json(['message' => 'Não autorizado'], 401);
        }
    }

    /**
     * Retorna o usuario logado.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function usuario()
    {
        return response()->json(Auth::user());
    }

    /**
     * Faz logout (Invalida o token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Desconectado com sucesso.']);
    }

    /**
     * Atualiza um token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        if ($token = Auth::refresh()) {
            return response()
                ->json()
                ->header('Authorization', $token);
        }
    }

}
