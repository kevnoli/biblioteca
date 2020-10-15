<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;

class EditoraController extends Controller
{
    /**
     * Lista todas as editoras.
     *
     * @return Response
     */
    public function index(){
        return Editora::all();
     }
     
     /**
     * Cria nova instância de editora.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([
            'nome' => 'required',  
            'administrador_cpf' => 'required'
            ]);
        $editora = new Editora;
        $editora = $request->all();
        $editora->save();
        return response()->json($editora, 201);
    }
       
    /**
     * Atualiza uma instância de editora.
     *
     * @param Editora $editora
     * @param Request $request
     * @return Response
     */
    public function update(Editora $editora, Request $request){
                
    }

    /**
     * Deleta uma instância de editora.
     *
     * @param Editora $editora
     * @return Response
     */        
    public function delete(Editora $editora){
        $editora->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista uma editora.
     *
     * @param Editora $editora
     * @return Response
     */        
    public function show(Editora $editora){
        return response()->json($editora);
    }
}
