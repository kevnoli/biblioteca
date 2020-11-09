<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    
    /** Executa as tentativas de autenticacao
    * 
    * @param \Illuminate\Http\Request $request
    * 
    * @return Response
    */
    public function authenticate(Request $request){
        if (!$request->has(['cpf','senha'])) {
            return response()->json(['message' => 'Credenciais faltando'],401);
        }
        $credenciais = $request->only('cpf', 'senha');
        if (Auth::attempt($credenciais)) {
            return response()-json(['message' => 'Sucesso']);
        } else {
            return response()->json(['message' => 'Credenciais inválidas', $credenciais ], 401);
        }
    }
}
