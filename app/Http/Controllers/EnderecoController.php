<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    /**
     * Lista todos os enderecos.
     *
     * @return Response
     */
    public function index(){
        return Endereco::all();
     }
     
     /**
     * Cria nova instância de endereco.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([ 
            'logradouro' => 'required', 
            'bairro' => 'required', 
            'numero' => 'required', 
            'cep' => 'required',
            'cidade' => 'required', 
            'uf' => 'required'
            ]);
        $endereco = new Endereco;
        $endereco->logradouro = $request->logradouro;
        $endereco->bairro = $request->bairro;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->cep = $request->cep;
        $endereco->cidade = $request->cidade;
        $endereco->uf = $request->uf;
        $endereco->save();
        return response()->json($endereco, 201);
    }
       
    /**
     * Atualiza uma instância de endereco.
     *
     * @param Endereco $endereco
     * @param Request $request
     * @return Response
     */
    public function update(Endereco $endereco, Request $request){
        $endereco->update($request->all());
        return response()->json($endereco, 200);
    }

    /**
     * Deleta uma instância de endereco.
     *
     * @param Endereco $endereco
     * @return Response
     */        
    public function destroy(Endereco $endereco){
        $endereco->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um endereco.
     *
     * @param Endereco $endereco
     * @return Response
     */        
    public function show(Endereco $endereco){
        return $endereco;
    }
}
