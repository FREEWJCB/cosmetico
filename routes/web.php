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


// Route::resource('Maestro', 'MaestroController')->except('show','edit','create','destroy','index');
// Route::POST('/Maestro', 'MaestroController@cargar')->name('Maestro.cargar');
// Route::POST('/Maestro', 'MaestroController@store')->name('Maestro.store');
// Route::POST('/Maestro/rellenar', 'MaestroController@mostrar')->name('Maestro.mostrar');
// Route::DELETE('/Maestro/{id}/{maestro}', 'MaestroController@destroy')->name('Maestro.destroy');
// Route::GET('/Maestro/{maestro}/{js?}', 'MaestroController@index')->name('Maestro.index');

Route::resource('Tipo', 'TipoController')->except('show','edit','create','update');
Route::PUT('/Tipo', 'TipoController@update')->name('Tipo.update');
Route::POST('/Tipos', 'TipoController@cargar')->name('Tipo.cargar');
Route::POST('/Tipo/rellenar', 'TipoController@mostrar')->name('Tipo.mostrar');
Route::GET('/Tipo/{js?}', 'TipoController@index');

Route::resource('Marca', 'MarcaController')->except('show','edit','create','update');
Route::PUT('/Marca', 'MarcaController@update')->name('Marca.update');
Route::POST('/Marcas', 'MarcaController@cargar')->name('Marca.cargar');
Route::POST('/Marca/rellenar', 'MarcaController@mostrar')->name('Marca.mostrar');
Route::GET('/Marca/{js?}', 'MarcaController@index');

Route::resource('Modelo', 'ModeloController')->except('show','edit','create','update');
Route::PUT('/Modelo', 'ModeloController@update')->name('Modelo.update');
Route::POST('/Modelos', 'ModeloController@cargar')->name('Modelo.cargar');
Route::POST('/Modelo/rellenar', 'ModeloController@mostrar')->name('Modelo.mostrar');
Route::GET('/Modelo/{js?}', 'ModeloController@index');

Route::resource('Cosmetic', 'CosmeticController')->except('show','edit','create','update');
Route::PUT('/Cosmetic', 'CosmeticController@update')->name('Cosmetic.update');
Route::POST('/Cosmetics', 'CosmeticController@cargar')->name('Cosmetic.cargar');
Route::POST('/Cosmetic/rellenar', 'CosmeticController@mostrar')->name('Cosmetic.mostrar');
Route::GET('/Cosmetic/{js?}', 'CosmeticController@index');

Route::resource('Cosmetico', 'CosmeticoController')->except('show','edit','create','update');
Route::PUT('/Cosmetico', 'CosmeticoController@update')->name('Cosmetico.update');
Route::POST('/Cosmeticos', 'CosmeticoController@cargar')->name('Cosmetico.cargar');
Route::POST('/Cosmetico/rellenar', 'CosmeticoController@mostrar')->name('Cosmetico.mostrar');
Route::GET('/Cosmetico/{js?}', 'CosmeticoController@index');

//proyecto

Route::resource('Ocupacion_Laboral', 'Ocupacion_LaboralController')->except('show','edit','create','update');
Route::PUT('/Ocupacion_Laborale', 'Ocupacion_LaboralController@update')->name('Ocupacion_Laboral.update');
Route::POST('/Ocupacion_Laborales', 'Ocupacion_LaboralController@cargar')->name('Ocupacion_Laboral.cargar');
Route::POST('/Ocupacion_Laboral/rellenar', 'Ocupacion_LaboralController@mostrar')->name('Ocupacion_Laboral.mostrar');
Route::GET('/Ocupacion_Laboral/{js?}', 'Ocupacion_LaboralController@index');

Route::resource('Tipo_Usuario', 'Tipo_UsuarioController')->except('show','edit','create','update');
Route::PUT('/Tipo_Usuario', 'Tipo_UsuarioController@update')->name('Tipo_Usuario.update');
Route::POST('/Tipos_Usuario', 'Tipo_UsuarioController@cargar')->name('Tipo_Usuario.cargar');
Route::POST('/Tipo_Usuario/rellenar', 'Tipo_UsuarioController@mostrar')->name('Tipo_Usuario.mostrar');
Route::GET('/Tipo_Usuario/{js?}', 'Tipo_UsuarioController@index');

Route::resource('Tipo_Alergia', 'Tipo_AlergiaController')->except('show','edit','create','update');
Route::PUT('/Tipo_Alergia', 'Tipo_AlergiaController@update')->name('Tipo_Alergia.update');
Route::POST('/Tipos_Alergia', 'Tipo_AlergiaController@cargar')->name('Tipo_Alergia.cargar');
Route::POST('/Tipo_Alergia/rellenar', 'Tipo_AlergiaController@mostrar')->name('Tipo_Alergia.mostrar');
Route::GET('/Tipo_Alergia/{js?}', 'Tipo_AlergiaController@index');

Route::resource('Tipo_Discapacidad', 'Tipo_DiscapacidadController')->except('show','edit','create','update');
Route::PUT('/Tipo_Discapacidad', 'Tipo_DiscapacidadController@update')->name('Tipo_Discapacidad.update');
Route::POST('/Tipos_Discapacidad', 'Tipo_DiscapacidadController@cargar')->name('Tipo_Discapacidad.cargar');
Route::POST('/Tipo_Discapacidad/rellenar', 'Tipo_DiscapacidadController@mostrar')->name('Tipo_Discapacidad.mostrar');
Route::GET('/Tipo_Discapacidad/{js?}', 'Tipo_DiscapacidadController@index');

Route::resource('Alergia', 'AlergiaController')->except('show','edit','create','update');
Route::PUT('/Alergia', 'AlergiaController@update')->name('Alergia.update');
Route::POST('/Alergias', 'AlergiaController@cargar')->name('Alergia.cargar');
Route::POST('/Alergia/rellenar', 'AlergiaController@mostrar')->name('Alergia.mostrar');
Route::GET('/Alergia/{js?}', 'AlergiaController@index');

Route::resource('Discapacidad', 'DiscapacidadController')->except('show','edit','create','update');
Route::PUT('/Discapacidad', 'DiscapacidadController@update')->name('Discapacidad.update');
Route::POST('/Discapacidades', 'DiscapacidadController@cargar')->name('Discapacidad.cargar');
Route::POST('/Discapacidad/rellenar', 'DiscapacidadController@mostrar')->name('Discapacidad.mostrar');
Route::GET('/Discapacidad/{js?}', 'DiscapacidadController@index');

Route::resource('Cargo', 'CargoController')->except('show','edit','create','update');
Route::PUT('/Cargo', 'CargoController@update')->name('Cargo.update');
Route::POST('/Cargos', 'CargoController@cargar')->name('Cargo.cargar');
Route::POST('/Cargo/rellenar', 'CargoController@mostrar')->name('Cargo.mostrar');
Route::GET('/Cargo/{js?}', 'CargoController@index');

Route::resource('Seccion', 'SeccionController')->except('show','edit','create','update');
Route::PUT('/Seccion', 'SeccionController@update')->name('Seccion.update');
Route::POST('/Secciones', 'SeccionController@cargar')->name('Seccion.cargar');
Route::POST('/Seccion/rellenar', 'SeccionController@mostrar')->name('Seccion.mostrar');
Route::GET('/Seccion/{js?}', 'SeccionController@index');

Route::resource('Salon', 'SalonController')->except('show','edit','create','update');
Route::PUT('/Salon', 'SalonController@update')->name('Salon.update');
Route::POST('/Salones', 'SalonController@cargar')->name('Salon.cargar');
Route::POST('/Salon/rellenar', 'SalonController@mostrar')->name('Salon.mostrar');
Route::GET('/Salon/{js?}', 'SalonController@index');

Route::resource('Grado', 'GradoController')->except('show','edit','create','update');
Route::PUT('/Grado', 'GradoController@update')->name('Grado.update');
Route::POST('/Grados', 'GradoController@cargar')->name('Grado.cargar');
Route::POST('/Grado/rellenar', 'GradoController@mostrar')->name('Grado.mostrar');
Route::GET('/Grado/{js?}', 'GradoController@index');

Route::resource('State', 'StateController')->except('show','edit','create','update');
Route::PUT('/State', 'StateController@update')->name('State.update');
Route::POST('/States', 'StateController@cargar')->name('State.cargar');
Route::POST('/State/rellenar', 'StateController@mostrar')->name('State.mostrar');
Route::GET('/State/{js?}', 'StateController@index');

Route::resource('Municipality', 'MunicipalityController')->except('show','edit','create','update');
Route::PUT('/Municipality', 'MunicipalityController@update')->name('Municipality.update');
Route::POST('/Municipalitys', 'MunicipalityController@cargar')->name('Municipality.cargar');
Route::POST('/Municipality/rellenar', 'MunicipalityController@mostrar')->name('Municipality.mostrar');
Route::GET('/Municipality/{js?}', 'MunicipalityController@index');

Route::resource('Periodo_Escolar', 'Periodo_EscolarController')->except('show','edit','create','update');
Route::PUT('/Periodo_Escolar', 'Periodo_EscolarController@update')->name('Periodo_Escolar.update');
Route::POST('/Periodos_Escolares', 'Periodo_EscolarController@cargar')->name('Periodo_Escolar.cargar');
Route::POST('/Periodo_Escolar/rellenar', 'Periodo_EscolarController@mostrar')->name('Periodo_Escolar.mostrar');
Route::POST('/Periodo_Escolar/empleado', 'Periodo_EscolarController@empleado')->name('Periodo_Escolar.empleado');
Route::GET('/Periodo_Escolar/{js?}', 'Periodo_EscolarController@index');

Route::resource('Empleado', 'EmpleadoController')->except('show','edit','create','update');
Route::PUT('/Empleado', 'EmpleadoController@update')->name('Empleado.update');
Route::POST('/Empleados', 'EmpleadoController@cargar')->name('Empleado.cargar');
Route::POST('/Empleado/rellenar', 'EmpleadoController@mostrar')->name('Empleado.mostrar');
Route::GET('/Empleado/{js?}', 'EmpleadoController@index');

Route::resource('Usuario', 'UsuarioController')->except('show','edit','create','update');
Route::PUT('/Usuario', 'UsuarioController@update')->name('Usuario.update');
Route::POST('/Usuarios', 'UsuarioController@cargar')->name('Usuario.cargar');
Route::POST('/Usuario/rellenar', 'UsuarioController@mostrar')->name('Usuario.mostrar');
Route::POST('/Usuario/empleado', 'UsuarioController@empleado')->name('Usuario.empleado');
Route::GET('/Usuario/{js?}', 'UsuarioController@index');

Route::resource('Representante', 'RepresentanteController')->except('show','edit','create','update');
Route::PUT('/Representante', 'RepresentanteController@update')->name('Representante.update');
Route::POST('/Representantes', 'RepresentanteController@cargar')->name('Representante.cargar');
Route::POST('/Representante/rellenar', 'RepresentanteController@mostrar')->name('Representante.mostrar');
Route::GET('/Representante/{js?}', 'RepresentanteController@index');

Route::resource('Estudiante', 'EstudianteController')->except('show','edit','create','update');
Route::PUT('/Estudiante', 'EstudianteController@update')->name('Estudiante.update');
Route::POST('/Estudiantes', 'EstudianteController@cargar')->name('Estudiante.cargar');
Route::POST('/Estudiante/rellenar', 'EstudianteController@mostrar')->name('Estudiante.mostrar');
Route::POST('/Estudiante/clear_a', 'EstudianteController@clear_a')->name('Estudiante.clear_a');
Route::POST('/Estudiante/clear_d', 'EstudianteController@clear_d')->name('Estudiante.clear_d');
Route::POST('/Estudiante/representante', 'EstudianteController@representante')->name('Estudiante.representante');
Route::GET('/Estudiante/{js?}', 'EstudianteController@index');

Route::resource('Pregunta', 'PreguntaController')->except('show','edit','create','update');
Route::PUT('/Pregunta', 'PreguntaController@update')->name('Pregunta.update');
Route::POST('/Preguntas', 'PreguntaController@cargar')->name('Pregunta.cargar');
Route::POST('/Pregunta/rellenar', 'PreguntaController@mostrar')->name('Pregunta.mostrar');
Route::POST('/Pregunta/clear', 'PreguntaController@clear')->name('Pregunta.clear');
Route::POST('/Pregunta/quitar', 'PreguntaController@quitar')->name('Pregunta.quitar');
Route::POST('/Pregunta/respuestas', 'PreguntaController@respuestas')->name('Pregunta.respuestas');
Route::POST('/Pregunta/calcular', 'PreguntaController@calcular')->name('Pregunta.calcular');
Route::GET('/Pregunta/{js?}', 'PreguntaController@index');
Route::GET('/Preguntas/prueba', 'PreguntaController@prueba')->name('Pregunta.prueba');

Route::resource('combobox', 'combo')->only('store');