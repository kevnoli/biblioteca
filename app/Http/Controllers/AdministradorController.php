<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use App\Rules\Cpf;
    
class AdministradorController extends Controller
{

    /**
     * Lista todos os administradores.
     *
     * @return Response
     */
    public function index(){
        return Administrador::all();
     }
     
     /**
     * Cria nova instância de administrador.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate([
            'cpf' => [ 'required', new Cpf ], 
            'nome' => 'required', 
            'senha' => [ 'required', 'confirmed' ],
            'email'=> 'required'
            ]);
        $administrador = new Administrador;
        $administrador->cpf = $request->cpf;
        $administrador->nome = $request->nome;
        $administrador->senha = Hash::make($request->senha);
        $administrador->email = $request->email;
        $administrador->save();
        return response()->json($administrador, 201);
    }
       
    /**
     * Atualiza uma instância de administrador.
     *
     * @param Administrador $administrador
     * @param Request $request
     * @return Response
     */
    public function update(Administrador $administrador, Request $request){
                
    }

    /**
     * Deleta uma instância de administrador.
     *
     * @param Administrador $administrador
     * @return Response
     */        
    public function destroy(Administrador $administrador){
        $administrador->delete();
        return response()->json(null, 204);
    }

    /**
     * Lista um administrador.
     *
     * @param Administrador $administrador
     * @return Response
     */        
    public function show(Administrador $administrador){
        return $administrador;
    }
}
        