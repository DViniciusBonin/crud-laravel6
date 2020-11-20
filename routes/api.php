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

Route::middleware('auth:api')->get('/user', function (Request $request, Response $response) {
    return $request->user();
});

Route::post('/clientes', 'ClientsController@store');

Route::get('/clientes', 'ClientsController@index');

Route::get('/clientes/{id}', 'ClientsController@show');

Route::put('/clientes/{id}', 'ClientsController@update');

Route::delete('/clientes/{id}', 'ClientsController@destroy');

//Routes of addresses:

Route::post('/clientes/{id}/enderecos', 'AddressController@store');

Route::get('/clientes/{id}/enderecos', 'AddressController@index');


Route::get('/clientes/{id}/enderecos/{idAddress}', 'AddressController@show');

Route::put('/clientes/{id}/enderecos/{idAddress}', 'AddressController@update');

Route::delete('/clientes/{id}/enderecos/{idAddress}', 'AddressController@destroy');