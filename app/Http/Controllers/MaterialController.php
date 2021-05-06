<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Lista todos os materiais.
     *
     * @return Response
     */
    public function index()
    {
        return Material::all();
    }

    /**
     * Cria nova instância de material.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'local' => 'required',
            'ano_publicacao' => 'required',
            'local_publicacao' => 'required',
            'tipo' => 'required',
            'usuario_cpf' => 'required',
        ]);
        $material = new Material;
        $material->titulo = $request->titulo;
        $material->local = $request->local;
        $material->ano_publicacao = $request->ano_publicacao;
        $material->local_publicacao = $request->local_publicacao;
        $material->tipo = $request->tipo;
        $material->usuario_cpf = $request->usuario_cpf;
        $material->save();
        return response()->json($material, 201);
    }

    /**
     * Atualiza uma instância de material.
     *
     * @param Material $material
     * @param Request $request
     * @return Response
     */
    public function update(Material $material, Request $request)
    {
        $material->update($request->all());
        return response()->json($material, 200);
    }

    /**
     * Deleta uma instância de material.
     *
     * @param Material $material
     * @return Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um material.
     *
     * @param Material $material
     * @return Response
     */
    public function show(Material $material)
    {
        switch ($material->tipo) {
            case 1:
                return $material->load(['livro','autor']);
                break;
            case 2:
                return $material->load(['revista', 'autor']);
                break;
            case 3:
                return $material->load(['outros', 'autor']);
                break;
        }
    }
}
