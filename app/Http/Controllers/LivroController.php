<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Lista todos os livros.
     *
     * @return Response
     */
    public function index(){
        return Livro::all();
     }
     
     /**
     * Cria nova instância de livro.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([ 
            'material_id' => 'required',
            'isbn' => [ 'required', 'unique:livros' ], 
            'edicao' => 'required',
            'classificacao' => 'required', 
            'editora_id' => 'required',
            'qtd_paginas' => 'required'
            ]);
        $livro = new Livro;
        $livro->material_id = $request->material_id;
        $livro->isbn = $request->isbn;
        $livro->edicao = $request->edicao;
        $livro->qtd_paginas = $request->qtd_paginas;
        $livro->classificacao = $request->classificacao;
        $livro->editora_id = $request->editora_id;
        $livro->save();
        return response()->json($livro, 201);
    }
       
    /**
     * Atualiza uma instância de livro.
     *
     * @param Livro $livro
     * @param Request $request
     * @return Response
     */
    public function update(Livro $livro, Request $request){
        $livro->update($request->all());
        return response()->json($livro, 200);  
    }

    /**
     * Deleta uma instância de livro.
     *
     * @param Livro $livro
     * @return Response
     */        
    public function destroy(Livro $livro){
        $livro->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um livro.
     *
     * @param Livro $livro
     * @return Response
     */        
    public function show(Livro $livro){
        return $livro;
    }
}
