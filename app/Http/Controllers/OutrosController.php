<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outros;

class OutrosController extends Controller
{
    /**
     * Lista todos os outros materiais.
     *
     * @return Response
     */
    public function index(){
        return Outros::all();
     }
     
     /**
     * Cria nova instância de outros materiais.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([ 
            'material_id' => 'required',
            ]);
        $outro = new Outros;
        $outro = $request->all();
        $outro->save();
        return response()->json($outro, 201);
    }
       
    /**
     * Atualiza uma instância de outros materiais.
     *
     * @param Outros $outro
     * @param Request $request
     * @return Response
     */
    public function update(Outros $outro, Request $request){
        $outro->update($request->all());
        return response()->json($outro, 200);
    }

    /**
     * Deleta uma instância de outros materiais.
     *
     * @param Outros $outro
     * @return Response
     */        
    public function destroy(Outros $outro){
        $outro->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um dos outros materiais.
     *
     * @param Outros $outro
     * @return Response
     */        
    public function show(Outros $outro){
        return $outro;
    }
}
