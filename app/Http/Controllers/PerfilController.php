<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;

class PerfilController extends Controller
{
    /**
     * Lista todos os perfis.
     *
     * @return Response
     */
    public function index(){
        return Perfil::all();
     }
     
     /**
     * Cria nova instância de perfil.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([ 
            'max_livro' => 'required',
            'tempo_emprestimo' => 'required',
            'tempo_renovacao' => 'required',
            'descricao' => 'required',
            'max_reserva' => 'required'
            ]);
        $perfil = new Perfil;
        $perfil->max_livro = $request->max_livro;
        $perfil->tempo_emprestimo = $request->tempo_emprestimo;
        $perfil->tempo_renovacao = $request->tempo_renovacao;
        $perfil->descricao = $request->descricao;
        $perfil->max_reserva = $request->max_reserva;
        $perfil->save();
        return response()->json($perfil, 201);
    }
       
    /**
     * Atualiza uma instância de perfil.
     *
     * @param Perfil $perfil
     * @param Request $request
     * @return Response
     */
    public function update(Perfil $perfil, Request $request){
        $perfil->update($request->all());
        return response()->json($perfil, 200);
    }

    /**
     * Deleta uma instância de perfil.
     *
     * @param Perfil $perfil
     * @return Response
     */        
    public function destroy(Perfil $perfil){
        $perfil->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um perfil.
     *
     * @param Perfil $perfil
     * @return Response
     */        
    public function show(Perfil $perfil){
        return $perfil;
    }
}
