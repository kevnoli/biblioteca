<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Lista todos os autores.
     *
     * @return Response
     */
    public function index(){
        return Autor::all();
     }
     
     /**
     * Cria nova instância de autor.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([
            'nome' => 'required', 
            'sobrenome' => 'required', 
            'administrador_cpf' => 'required'
            ]);
        $autor = new Autor;
        $autor = $request->all();
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
    public function update(Autor $autor, Request $request){
                
    }

    /**
     * Deleta uma instância de autor.
     *
     * @param Autor $autor
     * @return Response
     */        
    public function delete(Autor $autor){
        $autor->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um autor.
     *
     * @param Autor $autor
     * @return Response
     */        
    public function show(Autor $autor){
        return response()->json($autor);
    }
}
