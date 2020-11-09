<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /** Executa as tentativas de autenticação
    * 
    * @param \Illuminate\Http\Request $request
    * 
    * @return Response
    */
    public function authenticate(Request $request){
        if (!$request->has(['cpf','senha'])) {
            return response()->json(['message' => 'Credenciais faltando'],401);
        }
        $credentials = $request->only('cpf', 'senha');
        if (Auth::attempt($credentials)) {
            return response()-json(['message' => 'Sucesso']);
        } else {
            return response()->json(['message' => 'Credenciais inválidas', $credentials ], 401);
        }
    }
}
