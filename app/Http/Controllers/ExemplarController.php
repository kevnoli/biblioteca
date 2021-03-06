<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exemplar;

class ExemplarController extends Controller
{
    /**
     * Lista todos os exemplares.
     *
     * @return Response
     */
    public function index(){
        return Exemplar::all();
     }
     
     /**
     * Cria nova instância de exemplar.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([ 
            'numero' => 'required',
            'material_id' => 'required',
            'usuario_cpf' => 'required'
            ]);
        $exemplar = new Exemplar;
        $exemplar->numero = $request->numero;
        $exemplar->consulta = $request->consulta;
        $exemplar->material_id = $request->material_id;
        $exemplar->usuario_cpf = $request->usuario_cpf;
        $exemplar->save();
        return response()->json($exemplar, 201);
    }
       
    /**
     * Atualiza uma instância de exemplar.
     *
     * @param Exemplar $exemplar
     * @param Request $request
     * @return Response
     */
    public function update(Exemplar $exemplar, Request $request){
        $exemplar->update($request->all());
        return response()->json($exemplar, 200);
    }

    /**
     * Deleta uma instância de exemplar.
     *
     * @param Exemplar $exemplar
     * @return Response
     */        
    public function destroy(Exemplar $exemplar){
        $exemplar->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um exemplar.
     *
     * @param Exemplar $exemplar
     * @return Response
     */        
    public function show(Exemplar $exemplar){
        return $exemplar;
    }
}
