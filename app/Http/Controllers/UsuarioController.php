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
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Cria nova instância de usuario.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => ['required', new Cpf],
            'nome' => ['required', 'alpha'],
            'telefone' => 'required',
            'senha' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'email' => ['required', 'email:strict'],
            'endereco_id' => 'required',
            'perfil_id' => 'required',
        ]);
        $usuario = new Usuario;
        $usuario->cpf = $request->cpf;
        $usuario->nome = $request->nome;
        $usuario->telefone = $request->telefone;
        $usuario->password = $request->senha;
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
    public function update(Usuario $usuario, Request $request)
    {
        if ($request->filled(['senha', 'nova_senha', 'senha_confirmation'])) {
            $request->validate([
                'senha' => ['required_with:nova_senha,nova_senha_confirmation'],
                'nova_senha' => ['confirmed', 'required_with:senha', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
                'nova_senha_confirmation' => ['required_with:senha,nova_senha']
            ]);
            $usuario->password = $request->senha;
        }
        $usuario->update($request->except('senha'));
        return response($usuario, 200);
    }

    /**
     * Deleta uma instância de usuario.
     *
     * @param Usuario $usuario
     * @return Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um usuario.
     *
     * @param Usuario $usuario
     * @return Response
     */
    public function show(Usuario $usuario)
    {
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
        $request->validate([
            'cpf' =>  new Cpf,
            'nome' => ['alpha', 'min:3'],
            'email' => 'email:strict',
        ]);
        $builder = Usuario::query();
        if ($request->anyFilled(['cpf', 'nome', 'email'])) {
            foreach ($request->keys() as $chave) {
                $builder->where($chave, 'LIKE', '%' . $request[$chave] . '%');
            }
            $resultado = $builder->get();
            if (!$resultado->isEmpty()) {
                return response()->json($resultado);
            } else {
                return response(['errors' => 'Nenhum registro encontrado'], 404);
            }
        } else {
            return response()->json(['errors' => 'Ao menos um dos campos deve ser prenchido: cpf, nome, email'], 422);
        }
    }
}
