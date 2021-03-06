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


Route::post('/disponibilidad', 'ReservaController@checkAvailable')->name('revisarDisponibilidad');
Route::post('/reservar', 'ReservaController@create')->name('hacerReserva');

Route::get("/clientes/lista", "ClienteController@list")->name("clientes.list");
Route::post("/clientes/json-store", "ClienteController@jsonStore")->name("clientes.json-store");

