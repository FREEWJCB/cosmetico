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

Route::get('/', function () {
    return view('view/index');
});

Auth::routes();





Route::resource('Tipo', 'TipoController');
Route::resource('Marca', 'MarcaController');
Route::resource('Modelo', 'ModeloController');
Route::resource('Cosmetic', 'CosmeticController');
Route::resource('Cosmetico', 'CosmeticoController');

Route::POST('/Tipos', 'TipoController@cargar')->name('Tipo.cargar');
