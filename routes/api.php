<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [ AuthController::class, 'login' ]);
    Route::post('logout', [ AuthController::class, 'logout' ]);
    Route::post('refresh', [ AuthController::class, 'refresh' ]);
    Route::post('me', [ AuthController::class, 'me' ]);
});



Route::group([ 'middleware' => 'jwt.auth', 'prefix' => 'autores' ], function(){
    Route::get('', [ AutorController::class, 'index' ]);
    Route::get('{autor}', [ AutorController::class, 'show' ]);
    Route::post('', [ AutorController::class, 'store' ]);
    Route::put('{autor}', [ AutorController::class, 'update' ]);
    Route::delete('{autor}', [ AutorController::class, 'destroy' ]);    
});

Route::group([ 'prefix' => 'editoras' ], function(){
    Route::get('', [ EditoraController::class, 'index' ]);
    Route::get('{editora}', [ EditoraController::class, 'show' ]);
    Route::post('', [ EditoraController::class, 'store' ]);
    Route::put('{editora}', [ EditoraController::class, 'update' ]);
    Route::delete('{editora}', [ EditoraController::class, 'destroy' ]);    
});

Route::group([ 'prefix' => 'emprestimos' ], function(){
    Route::get('', [ EmprestimoController::class, 'index' ]);
    Route::get('{emprestimo}', [ EmprestimoController::class, 'show' ]);
    Route::post('', [ EmprestimoController::class, 'store' ]);
    Route::put('{emprestimo}', [ EmprestimoController::class, 'update' ]);
    Route::delete('{emprestimo}', [ EmprestimoController::class, 'destroy' ]);    
});

Route::group([ 'prefix' => 'enderecos' ], function(){
    Route::get('', [ EnderecoController::class, 'index' ]);
    Route::get('{endereco}', [ EnderecoController::class, 'show' ]);
    Route::post('', [ EnderecoController::class, 'store' ]);
    Route::put('{endereco}', [ EnderecoController::class, 'update' ]);
    Route::delete('{endereco}', [ EnderecoController::class, 'destroy' ]);    
});

Route::group([ 'prefix' => 'exemplares' ], function(){
    Route::get('', [ ExemplarController::class, 'index' ]);
    Route::get('{exemplar}', [ ExemplarController::class, 'show' ]);
    Route::post('', [ ExemplarController::class, 'store' ]);
    Route::put('{exemplar}', [ ExemplarController::class, 'update' ]);
    Route::delete('{exemplar}', [ ExemplarController::class, 'destroy' ]);    
});

Route::group([ 'prefix' => 'livros' ], function(){
    Route::get('', [ LivroController::class, 'index' ]);
    Route::get('{livro}', [ LivroController::class, 'show' ]);
    Route::post('', [ LivroController::class, 'store' ]);
    Route::put('{livro}', [ LivroController::class, 'update' ]);
    Route::delete('{livro}', [ LivroController::class, 'destroy' ]);    
});

Route::group([ 'prefix' => 'materiais' ], function(){
    Route::get('', [ MaterialController::class, 'index' ]);
    Route::get('{material}', [ MaterialController::class, 'show' ]);
    Route::post('', [ MaterialController::class, 'store' ]);
    Route::put('{material}', [ MaterialController::class, 'update' ]);
    Route::delete('{material}', [ MaterialController::class, 'destroy' ]);    
});

Route::group([ 'prefix' => 'outros' ], function(){
    Route::get('', [ MaterialController::class, 'index' ]);
    Route::get('{outros}', [ MaterialController::class, 'show' ]);
    Route::post('', [ MaterialController::class, 'store' ]);
    Route::put('{outros}', [ MaterialController::class, 'update' ]);
    Route::delete('{outros}', [ MaterialController::class, 'destroy' ]);    
});

Route::group([ 'middleware' => 'jwt.auth', 'prefix' => 'perfis' ], function(){
    Route::get('', [ PerfilController::class, 'index' ]);
    Route::get('{perfil}', [ PerfilController::class, 'show' ]);
    Route::post('', [ PerfilController::class, 'store' ]);
    Route::put('{perfil}', [ PerfilController::class, 'update' ]);
    Route::delete('{perfil}', [ PerfilController::class, 'destroy' ]);    
});

Route::group([ 'middleware' => 'jwt.auth', 'prefix' => 'reservas' ], function(){
    Route::get('', [ ReservaController::class, 'index' ]);
    Route::get('{reserva}', [ ReservaController::class, 'show' ]);
    Route::post('', [ ReservaController::class, 'store' ]);
    Route::put('{reserva}', [ ReservaController::class, 'update' ]);
    Route::delete('{reserva}', [ ReservaController::class, 'destroy' ]);    
});

Route::group([ 'middleware' => 'jwt.auth', 'prefix' => 'revista' ], function(){
    Route::get('', [ RevistaController::class, 'index' ]);
    Route::get('{revista}', [ RevistaController::class, 'show' ]);
    Route::post('', [ RevistaController::class, 'store' ]);
    Route::put('{revista}', [ RevistaController::class, 'update' ]);
    Route::delete('{revista}', [ RevistaController::class, 'destroy' ]);    
});

Route::group([ 'middleware' => 'jwt.auth', 'prefix' => 'usuarios' ], function(){
    Route::get('', [ UsuarioController::class, 'index' ]);
    Route::get('{usuario}', [ UsuarioController::class, 'show' ]);
    Route::post('', [ UsuarioController::class, 'store' ]);
    Route::put('{usuario}', [ UsuarioController::class, 'update' ]);
    Route::delete('{usuario}', [ UsuarioController::class, 'destroy' ]);    
});

