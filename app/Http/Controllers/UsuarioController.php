<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Usuario;
use App\Rules\Cpf;

class UsuarioController extends Authenticatable implements JWTSubject
{
    /**
     * Lista todos os usuarios.
     *
     * @return Response
     */
    public function index(){
        return Usuario::all();
     }
     
     /**
     * Cria nova instância de usuario.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([ 
            'cpf' => [ 'required', new Cpf ], 
            'nome' => 'required',
            'telefone' => 'required',
            'senha' => 'required',
            'email' => 'required',
            'endereco_id' => 'required',
            'perfil_id' => 'required',
            ]);
        $usuario = new Usuario;
        $usuario->cpf = $request->cpf;
        $usuario->nome = $request->nome;
        $usuario->telefone = $request->telefone;
        $usuario->senha = $request->senha;
        $usuario->email = $request->email;
        $usuario->endereco_id = $request->endereco_id;
        $usuario->perfil_id = $request->perfil_id;
        $usuario->save();
        return response()->json($usuario, 201);
    }
       
    /**
     * Atualiza uma instância de usuario.
     *
     * @param Usuario $usuario
     * @param Request $request
     * @return Response
     */
    public function update(Usuario $usuario, Request $request){
                
    }

    /**
     * Deleta uma instância de usuario.
     *
     * @param Usuario $usuario
     * @return Response
     */        
    public function destroy(Usuario $usuario){
        $usuario->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um usuario.
     *
     * @param Usuario $usuario
     * @return Response
     */        
    public function show(Usuario $usuario){
        return $usuario;
    }
}
