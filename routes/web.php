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

Route::group(['middleware' => ['web']], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/reservar', 'ReservaController@index')->middleware('auth')->name('reserva');

    Route::post('changelocale', 'ChangeLocale')->name('changeLocale');

    Route::resource('suscriptores', 'SuscriptorController')->only([
       'store'
    ]);

    Route::resources([
        "categories" => "CategoryController",
        "ropas" => "RopaController",
    ]);

    Route::get('condiciones/es', 'CondicionController@viewEs');
    Route::get('condiciones/en', 'CondicionController@viewEn');

    Route::get('pedidos', 'CrearOTController')->name('crear-ot');
    Route::post('pedidos', 'GuardarOTController')->name('guardar-ot');

    Route::group(["prefix" => "webpay"], function() {
        Route::post('init/{ordenTrabajo}', 'WebpayController@init')->name('webpay.init');
        Route::get('token', 'WebpayController@token')->name('webpay.token');

        Route::get('exito', 'WebpayController@exito')->name('webpay.exito');
        Route::get('rechazo', 'WebpayController@rechazo')->name('webpay.rechazo');

        Route::post('voucher', 'WebpayController@voucher')->name('webpay.voucher');
        Route::post('finish', 'WebpayController@finish')->name('webpay.finish');

    });

});
