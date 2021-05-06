<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;
use App\Rules\Cpf;

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
            'usuario_cpf' => [ 'required', new Cpf ]
            ]);
        $editora = new Editora;
        $editora->nome = $request->nome;
        $editora->usuario_cpf = $request->usuario_cpf;
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
        $editora->update($request->all());
        return response()->json($editora, 200);  
    }

    /**
     * Deleta uma instância de editora.
     *
     * @param Editora $editora
     * @return Response
     */        
    public function destroy(Editora $editora){
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
        return $editora;
    }

    /**
     * Pesquisa editoras.
     *
     * @param Request $request
     * @return Response
     */
    public function pesquisar(Request $request)
    {
        $builder = Editora::query();
        if ($request->filled(['nome'])) {
            foreach ($request->keys() as $chave) {
                $builder->where($chave, 'LIKE', $request[$chave]);
            }
            $resultado = $builder->get();
            if (!$resultado->isEmpty()) {
                return response()->json($resultado);
            } else {
                return response(['mensagem' => 'Nenhum registro encontrado'], 404);
            }
        } else {
            return response()->json(['mensagem' => 'Parâmetros faltando'], 422);
        }
    }
}
