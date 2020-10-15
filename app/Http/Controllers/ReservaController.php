<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    /**
     * Lista todas as reservas.
     *
     * @return Response
     */
    public function index(){
        return Reserva::all();
     }
     
     /**
     * Cria nova instância de reserva.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([
            'nome' => 'required',  
            'administrador_cpf' => 'required'
            ]);
        $reserva = new Reserva;
        $reserva = $request->all();
        $reserva->save();
        return response()->json($reserva, 201);
    }
       
    /**
     * Atualiza uma instância de reserva.
     *
     * @param Reserva $reserva
     * @param Request $request
     * @return Response
     */
    public function update(Reserva $reserva, Request $request){
        $reserva->update($request->all());
        return response()->json($reserva, 200);   
    }

    /**
     * Deleta uma instância de reserva.
     *
     * @param Reserva $reserva
     * @return Response
     */        
    public function destroy(Reserva $reserva){
        $reserva->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista uma reserva.
     *
     * @param Reserva $reserva
     * @return Response
     */        
    public function show(Reserva $reserva){
        return $reserva;
    }
}
