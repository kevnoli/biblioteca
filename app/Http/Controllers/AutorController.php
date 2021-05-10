<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Rules\Cpf;

class AutorController extends Controller
{
    /**
     * Lista todos os autores.
     *
     * @return Response
     */
    public function index()
    {
        return Autor::all();
    }

    /**
     * Cria nova instância de autor.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'usuario_cpf' => ['required', new Cpf]
        ]);
        $autor = new Autor;
        $autor->nome = $request->nome;
        $autor->sobrenome = $request->sobrenome;
        $autor->usuario_cpf = $request->usuario_cpf;
        $autor->save();
        return response()->json($autor, 201);
    }

    /**
     * Atualiza uma instância de autor.
     *
     * @param Autor $autor
     * @param Request $request
     * @return Response
     */
    public function update(Autor $autor, Request $request)
    {
        $autor->update($request->all());
        return response()->json($autor);
    }

    /**
     * Deleta uma instância de autor.
     *
     * @param Autor $autor
     * @return Response
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um autor.
     *
     * @param Autor $autor
     * @return Response
     */
    public function show(Autor $autor)
    {
        return $autor;
    }

    /**
     * Pesquisa autores.
     *
     * @param Request $request
     * @return Response
     */
    public function pesquisar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'alpha_num',
                'sobrenome' => 'alpha_num'
            ]
        );
        $builder = Autor::query();
        if ($request->anyFilled(['nome', 'sobrenome'])) {
            foreach ($request->keys() as $chave) {
                $builder->where($chave, 'LIKE', '%' . $request[$chave] . '%');
            }
            $resultado = $builder->get();
            if (!$resultado->isEmpty()) {
                return response()->json($resultado);
            } else {
                return response(['message' => 'Nenhum registro encontrado'], 404);
            }
        } else {
            return response()->json(['message' => 'Parâmetros faltando'], 422);
        }
    }
}
