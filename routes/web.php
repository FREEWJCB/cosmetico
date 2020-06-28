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

// Auth::routes();



Route::get('/prueba', function () {
    return view('view/prueba');
});

Route::resource('Tipo', 'TipoController')->except('show','edit');
Route::POST('/Tipos', 'TipoController@cargar')->name('Tipo.cargar');
Route::POST('/Tipo/rellenar', 'TipoController@mostrar')->name('Tipo.mostrar');
Route::GET('/Tipo/{js?}', 'TipoController@index');

Route::resource('Marca', 'MarcaController')->except('show','edit');
Route::POST('/Marcas', 'MarcaController@cargar')->name('Marca.cargar');
Route::POST('/Marca/rellenar', 'MarcaController@mostrar')->name('Marca.mostrar');
Route::GET('/Marca/{js?}', 'MarcaController@index');

Route::resource('Modelo', 'ModeloController')->except('show','edit');
Route::POST('/Modelos', 'ModeloController@cargar')->name('Modelo.cargar');
Route::POST('/Modelo/rellenar', 'ModeloController@mostrar')->name('Modelo.mostrar');
Route::GET('/Modelo/{js?}', 'ModeloController@index');

Route::resource('Cosmetic', 'CosmeticController')->except('show','edit');
Route::POST('/Cosmetics', 'CosmeticController@cargar')->name('Cosmetic.cargar');
Route::POST('/Cosmetic/rellenar', 'CosmeticController@mostrar')->name('Cosmetic.mostrar');
Route::GET('/Cosmetic/{js?}', 'CosmeticController@index');

Route::resource('Cosmetico', 'CosmeticoController')->except('show','edit');
Route::POST('/Cosmeticos', 'CosmeticoController@cargar')->name('Cosmetico.cargar');
Route::POST('/Cosmetico/rellenar', 'CosmeticoController@mostrar')->name('Cosmetico.mostrar');
Route::GET('/Cosmetico/{js?}', 'CosmeticoController@index');

//proyecto

Route::resource('Ocupacion_Laboral', 'Ocupacion_LaboralController')->except('show','edit');
Route::POST('/Ocupacion_Laborales', 'Ocupacion_LaboralController@cargar')->name('Ocupacion_Laboral.cargar');
Route::POST('/Ocupacion_Laboral/rellenar', 'Ocupacion_LaboralController@mostrar')->name('Ocupacion_Laboral.mostrar');
Route::GET('/Ocupacion_Laboral/{js?}', 'Ocupacion_LaboralController@index');

Route::resource('Tipo_Usuario', 'Tipo_UsuarioController')->except('show','edit');
Route::POST('/Tipos_Usuario', 'Tipo_UsuarioController@cargar')->name('Tipo_Usuario.cargar');
Route::POST('/Tipo_Usuario/rellenar', 'Tipo_UsuarioController@mostrar')->name('Tipo_Usuario.mostrar');
Route::GET('/Tipo_Usuario/{js?}', 'Tipo_UsuarioController@index');

Route::resource('Tipo_Alergia', 'Tipo_AlergiaController')->except('show','edit');
Route::POST('/Tipos_Alergia', 'Tipo_AlergiaController@cargar')->name('Tipo_Alergia.cargar');
Route::POST('/Tipo_Alergia/rellenar', 'Tipo_AlergiaController@mostrar')->name('Tipo_Alergia.mostrar');
Route::GET('/Tipo_Alergia/{js?}', 'Tipo_AlergiaController@index');

Route::resource('Tipo_Discapacidad', 'Tipo_DiscapacidadController')->except('show','edit');
Route::POST('/Tipos_Discapacidad', 'Tipo_DiscapacidadController@cargar')->name('Tipo_Discapacidad.cargar');
Route::POST('/Tipo_Discapacidad/rellenar', 'Tipo_DiscapacidadController@mostrar')->name('Tipo_Discapacidad.mostrar');
Route::GET('/Tipo_Discapacidad/{js?}', 'Tipo_DiscapacidadController@index');

Route::resource('Alergia', 'AlergiaController')->except('show','edit');
Route::POST('/Alergias', 'AlergiaController@cargar')->name('Alergia.cargar');
Route::POST('/Alergia/rellenar', 'AlergiaController@mostrar')->name('Alergia.mostrar');
Route::GET('/Alergia/{js?}', 'AlergiaController@index');

Route::resource('Discapadidad', 'DiscapadidadController')->except('show','edit');
Route::POST('/Discapadidades', 'DiscapadidadController@cargar')->name('Discapadidad.cargar');
Route::POST('/Discapadidad/rellenar', 'DiscapadidadController@mostrar')->name('Discapadidad.mostrar');
Route::GET('/Discapadidad/{js?}', 'DiscapadidadController@index');

Route::resource('Cargo', 'CargoController')->except('show','edit');
Route::POST('/Cargos', 'CargoController@cargar')->name('Cargo.cargar');
Route::POST('/Cargo/rellenar', 'CargoController@mostrar')->name('Cargo.mostrar');
Route::GET('/Cargo/{js?}', 'CargoController@index');

Route::resource('Seccion', 'SeccionController')->except('show','edit');
Route::POST('/Secciones', 'SeccionController@cargar')->name('Seccion.cargar');
Route::POST('/Seccion/rellenar', 'SeccionController@mostrar')->name('Seccion.mostrar');
Route::GET('/Seccion/{js?}', 'SeccionController@index');

Route::resource('Salon', 'SalonController')->except('show','edit');
Route::POST('/Salones', 'SalonController@cargar')->name('Salon.cargar');
Route::POST('/Salon/rellenar', 'SalonController@mostrar')->name('Salon.mostrar');
Route::GET('/Salon/{js?}', 'SalonController@index');

Route::resource('Grado', 'GradoController')->except('show','edit');
Route::POST('/Grados', 'GradoController@cargar')->name('Grado.cargar');
Route::POST('/Grado/rellenar', 'GradoController@mostrar')->name('Grado.mostrar');
Route::GET('/Grado/{js?}', 'GradoController@index');

Route::resource('State', 'StateController')->except('show','edit');
Route::POST('/States', 'StateController@cargar')->name('State.cargar');
Route::POST('/State/rellenar', 'StateController@mostrar')->name('State.mostrar');
Route::GET('/State/{js?}', 'StateController@index');

Route::resource('Municipality', 'MunicipalityController')->except('show','edit');
Route::POST('/Municipalitys', 'MunicipalityController@cargar')->name('Municipality.cargar');
Route::POST('/Municipality/rellenar', 'MunicipalityController@mostrar')->name('Municipality.mostrar');
Route::GET('/Municipality/{js?}', 'MunicipalityController@index');

Route::resource('combobox', 'combo')->only('store');