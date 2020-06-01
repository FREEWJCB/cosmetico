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



Route::get('/prueba', function () {
    return view('view/prueba');
});

Route::resource('Tipo', 'TipoController')->except('show','edit');
Route::resource('Marca', 'MarcaController')->except('show','edit');
Route::resource('Modelo', 'ModeloController')->except('show','edit');
Route::resource('Cosmetic', 'CosmeticController')->except('show','edit');
Route::resource('Cosmetico', 'CosmeticoController')->except('show','edit');
Route::POST('/Tipos', 'TipoController@cargar')->name('Tipo.cargar');
Route::POST('/Marcas', 'MarcaController@cargar')->name('Tipo.cargar');
Route::POST('/Modelos', 'ModeloController@cargar')->name('Tipo.cargar');
Route::POST('/Cosmetics', 'CosmeticController@cargar')->name('Tipo.cargar');
Route::POST('/Cosmeticos', 'CosmeticoController@cargar')->name('Tipo.cargar');
// Route::POST('/tipo_rellenar', 'TipoController@rellenar')->name('Tipo.rellenar');
