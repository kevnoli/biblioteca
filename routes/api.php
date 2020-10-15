<?php

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
Route::group([ 'prefix' => 'autores' ], function(){
    Route::get('', 'AutorController@index');
    Route::get('{autor}', 'AutorController@show');
    Route::post('', 'AutorController@store');
    Route::put('{autor}', 'AutorController@update');
    Route::delete('{autor}', 'AutorController@destroy');    
});

Route::group([ 'prefix' => 'editoras' ], function(){
    Route::get('', 'EditoraController@index');
    Route::get('{editora}', 'EditoraController@show');
    Route::post('', 'EditoraController@store');
    Route::put('{editora}', 'EditoraController@update');
    Route::delete('{editora}', 'EditoraController@destroy');    
});

Route::group([ 'prefix' => 'empretimos' ], function(){
    Route::get('', 'EmprestimoController@index');
    Route::get('{emprestimo}', 'EmprestimoController@show');
    Route::post('', 'EmprestimoController@store');
    Route::put('{emprestimo}', 'EmprestimoController@update');
    Route::delete('{emprestimo}', 'EmprestimoController@destroy');    
});

Route::group([ 'prefix' => 'enderecos' ], function(){
    Route::get('', 'EnderecoController@index');
    Route::get('{endereco}', 'EnderecoController@show');
    Route::post('', 'EnderecoController@store');
    Route::put('{endereco}', 'EnderecoController@update');
    Route::delete('{endereco}', 'EnderecoController@destroy');    
});

Route::group([ 'prefix' => 'exemplares' ], function(){
    Route::get('', 'ExemplarController@index');
    Route::get('{exemplar}', 'ExemplarController@show');
    Route::post('', 'ExemplarController@store');
    Route::put('{exemplar}', 'ExemplarController@update');
    Route::delete('{exemplar}', 'ExemplarController@destroy');    
});

Route::group([ 'prefix' => 'livros' ], function(){
    Route::get('', 'LivroController@index');
    Route::get('{livro}', 'LivroController@show');
    Route::post('', 'LivroController@store');
    Route::put('{livro}', 'LivroController@update');
    Route::delete('{livro}', 'LivroController@destroy');    
});

Route::group([ 'prefix' => 'materiais' ], function(){
    Route::get('', 'MaterialController@index');
    Route::get('{material}', 'MaterialController@show');
    Route::post('', 'MaterialController@store');
    Route::put('{material}', 'MaterialController@update');
    Route::delete('{material}', 'MaterialController@destroy');    
});

Route::group([ 'prefix' => 'outros' ], function(){
    Route::get('', 'OutrosController@index');
    Route::get('{outros}', 'OutrosController@show');
    Route::post('', 'OutrosController@store');
    Route::put('{outros}', 'OutrosController@update');
    Route::delete('{outros}', 'OutrosController@destroy');    
});

Route::group([ 'prefix' => 'perfis' ], function(){
    Route::get('', 'PerfilController@index');
    Route::get('{perfil}', 'PerfilController@show');
    Route::post('', 'PerfilController@store');
    Route::put('{perfil}', 'PerfilController@update');
    Route::delete('{perfil}', 'PerfilController@destroy');    
});

Route::group([ 'prefix' => 'reservas' ], function(){
    Route::get('', 'ReservaController@index');
    Route::get('{reserva}', 'ReservaController@show');
    Route::post('', 'ReservaController@store');
    Route::put('{reserva}', 'ReservaController@update');
    Route::delete('{reserva}', 'ReservaController@destroy');    
});

Route::group([ 'prefix' => 'revista' ], function(){
    Route::get('', 'RevistaController@index');
    Route::get('{revista}', 'RevistaController@show');
    Route::post('', 'RevistaController@store');
    Route::put('{revista}', 'RevistaController@update');
    Route::delete('{revista}', 'RevistaController@destroy');    
});

Route::group([ 'prefix' => 'usuarios' ], function(){
    Route::get('', 'UsuarioController@index');
    Route::get('{usuario}', 'UsuarioController@show');
    Route::post('', 'UsuarioController@store');
    Route::put('{usuario}', 'UsuarioController@update');
    Route::delete('{usuario}', 'UsuarioController@destroy');    
});

