<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/reservar', 'ReservaController@index')->middleware('auth')->name('reserva');

    Route::post('changelocale', 'ChangeLocale')->name('changeLocale');

    Route::resource('suscriptores', 'SuscriptorController')->only([
        'store'
    ]);
    Route::post("ventas/export", "VentaController@export")
        ->name("ventas.export");

    Route::group([
        'middleware' => ['auth', 'isAllowed'],
        'prefix' => 'mantenimiento',
    ], function () {
        Route::get('/', 'MantenimientoHomeController')
            ->name('mantenimiento.home');
        Route::resources([
            "categories" => "CategoryController",
            "clientes" => "ClienteController",
            "ropas" => "RopaController",
            "forma-pagos" => "FormaPagoController",
            "tipo-servicios" => "TipoServicioController",
            "promocions" => "PromocionController",
            "precios" => "PrecioController",
            "ventas" => "VentaController",
            "sectores" => "SectorController",
            "ordenes" => "OrdenTrabajoController",
        ]);

        Route::get('ot/list', 'OrdenTrabajoController@list')->name('ot.getOT');
    });




    Route::get('condiciones/es', 'CondicionController@viewEs');
    Route::get('condiciones/en', 'CondicionController@viewEn');

    Route::get('pedidos', 'CrearOTController')->middleware('auth')->name('crear-ot');
    Route::post('pedidos', 'GuardarOTController')->name('guardar-ot');

    Route::group(["prefix" => "webpay"], function () {
        Route::get('init/{ordenTrabajo}', 'TransaccionController@init')->name('webpay.init');
        Route::get('token', 'TransaccionController@token')->name('webpay.token');

        Route::get('exito', 'TransaccionController@exito')->name('webpay.exito');
        Route::get('rechazo', 'TransaccionController@rechazo')->name('webpay.rechazo');

        Route::post('voucher/{ordenTrabajo}', 'TransaccionController@voucher')->name('webpay.voucher');
        Route::post('finish/{ordenTrabajo}', 'TransaccionController@finish')->name('webpay.finish');
    });
});
