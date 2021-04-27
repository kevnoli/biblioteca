<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revista;

class RevistaController extends Controller
{
    /**
     * Lista todas as revistas.
     *
     * @return Response
     */
    public function index(){
        return Revista::all();
     }
     
     /**
     * Cria nova instância de revista.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([
            'material_id' => 'required',  
            'numero' => 'required'
            ]);
        $revista = new Revista;
        $revista->material_id = $request->material_id;
        $revista->numero = $request->numero;
        $revista->save();
        return response()->json($revista, 201);
    }
       
    /**
     * Atualiza uma instância de revista.
     *
     * @param Revista $revista
     * @param Request $request
     * @return Response
     */
    public function update(Revista $revista, Request $request){
        $revista->update($request->all());
        return response()->json($revista, 200);
    }

    /**
     * Deleta uma instância de revista.
     *
     * @param Revista $revista
     * @return Response
     */        
    public function destroy(Revista $revista){
        $revista->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista uma revista.
     *
     * @param Revista $revista
     * @return Response
     */        
    public function show(Revista $revista){
        return $revista;
    }
}
