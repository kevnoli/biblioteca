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
    public function index(){
        return Material::all();
     }
     
     /**
     * Cria nova instância de material.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([ 
            'titulo' => 'required',
            'local' => 'required',
            'ano_publicacao' => 'required',
            'local_publicacao' => 'required',
            'tipo' => 'required',
            'administrador_cpf' => 'required',
            ]);
        $material = new Material;
        $material = $request->all();
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
    public function update(Material $material, Request $request){
                
    }

    /**
     * Deleta uma instância de material.
     *
     * @param Material $material
     * @return Response
     */        
    public function delete(Material $material){
        $material->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um material.
     *
     * @param Material $material
     * @return Response
     */        
    public function show(Material $material){
        return response()->json($material);
    }
}
