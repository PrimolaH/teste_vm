<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => 'web'], function (){

    Route::get('/', function () {
        return view('auth.login');
    });

    Auth::routes();

    Route::get('/mercadoria/novo', 'MercadoriaController@form');
    Route::get('/mercadoria/lista', 'MercadoriaController@lista');
    Route::get('/mercadoria/{mercadoria}/editar', 'MercadoriaController@editar');
    Route::post('/mercadoria/salvar', 'MercadoriaController@salvar');
    Route::patch('/mercadoria/{mercadoria}', 'MercadoriaController@atualizar');
    Route::get('/mercadoria/{mercadoria}/registrar', 'MercadoriaController@editar');
    Route::delete('/mercadoria/{mercadoria}', 'MercadoriaController@deletar');

    Route::get('/home', 'MercadoriaController@index');

});

