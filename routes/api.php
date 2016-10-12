<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function() {
    Route::get('pipas', 'PipaController@carregarTodas');
    Route::get('pipa/{id}', 'PipaController@carregar');
    Route::post('pipa', 'PipaController@cadastrar');
    Route::put('pipa/{id}', 'PipaController@atualizar');
    Route::delete('pipa/{id}', 'PipaController@excluir');
});