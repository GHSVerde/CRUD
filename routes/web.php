<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('vaga.index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('vagas')->group(function () {

    Route::get('/', 'VagasController@index')->name('vaga.index');
    Route::get('/lixeira', 'VagasController@bin')->name('vaga.bin');
    Route::post('/{id}', 'VagasController@restore')->name('vaga.restore');
    Route::get('/criar', 'VagasController@create')->name('vaga.criar');
    Route::post('/', 'VagasController@store')->name('vaga.store');
    Route::get('/{id}', 'VagasController@show')->name('vaga.show');
    Route::get('/{id}/editar', 'VagasController@edit')->name('vaga.edit');
    Route::delete('/{id}', 'VagasController@destroy')->name('vaga.destroy');
    Route::delete('/lixeira/{id}', 'VagasController@permanentDestroy')->name('vaga.delete');
    Route::put('/{id}', 'VagasController@update')->name('vaga.update');
});
