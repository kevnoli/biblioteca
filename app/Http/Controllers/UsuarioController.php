<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\Usuario;
use App\Rules\Cpf;

class UsuarioController extends Controller
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
        if($request->has('password')){
            $request->validate([
                'password' => [ 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
            ]);
        }
        $usuario->update($request->all());
        return response($usuario, 200);
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

    /**
     * Pesquisa usuarios.
     *
     * @param Request $request
     * @return Response
     */
    public function pesquisar(Request $request)
    {
        $builder = Usuario::query();
        if ($request->anyFilled(['cpf', 'nome', 'email'])) {
            foreach ($request->keys() as $chave) {
                $builder->where($chave, 'LIKE', $request[$chave]);
            }
            $resultado = $builder->get();
            if (!$resultado->isEmpty()) {
                return response()->json($resultado);
            } else {
                return response(['mensagem' => 'Nenhum registro encontrado'], 404);
            }
        } else {
            return response()->json(['mensagem' => 'Parâmetros faltando'], 422);
        }
    }
}
