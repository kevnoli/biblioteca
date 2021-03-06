<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;

class EmprestimoController extends Controller
{
    /**
     * Lista todos os emprestimos.
     *
     * @return Response
     */
    public function index(){
        return Emprestimo::all();
     }
     
     /**
     * Cria nova instância de emprestimo.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([ 
            'usuario_administrador_cpf' => 'required', 
            'usuario_cpf' => 'required'
            ]);
        $emprestimo = new Emprestimo;
        $emprestimo->usuario_administrador_cpf = $request->usuario_administrador_cpf;
        $emprestimo->usuario_cpf = $request->usuario_cpf;
        $emprestimo->save();
        return response()->json($emprestimo, 201);
    }
       
    /**
     * Atualiza uma instância de emprestimo.
     *
     * @param Emprestimo $emprestimo
     * @param Request $request
     * @return Response
     */
    public function update(Emprestimo $emprestimo, Request $request){
        $emprestimo->update($request->all());
        return response()->json($emprestimo, 200);
    }

    /**
     * Deleta uma instância de emprestimo.
     *
     * @param Emprestimo $emprestimo
     * @return Response
     */        
    public function destroy(Emprestimo $emprestimo){
        $emprestimo->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um emprestimo.
     *
     * @param Emprestimo $emprestimo
     * @return Response
     */        
    public function show(Emprestimo $emprestimo){
        return $emprestimo;
    }
}
