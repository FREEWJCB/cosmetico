<?php

use Illuminate\Support\Facades\Route;

//cosmetico

use App\Http\Controllers\TipoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CosmeticController;
use App\Http\Controllers\CosmeticoController;

//proyecto

use App\Http\Controllers\Ocupacion_LaboralController;
use App\Http\Controllers\Tipo_UsuarioController;
use App\Http\Controllers\Tipo_AlergiaController;
use App\Http\Controllers\Tipo_DiscapacidadController;
use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\DiscapacidadController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\Periodo_EscolarController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\EstudianteController;

//reportes

use App\Http\Controllers\imprimirTiposAlergiasController;

// c-sabe

use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\CursoController;

// c-sabe
use App\Http\Controllers\combo;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('Tipo', TipoController::class)->except('show','edit','create','update');
Route::PUT('/Tipo', [TipoController::class,'update'])->name('Tipo.update');
Route::POST('/Tipos', [TipoController::class,'cargar'])->name('Tipo.cargar');
Route::POST('/Tipo/rellenar', [TipoController::class,'mostrar'])->name('Tipo.mostrar');
Route::GET('/Tipo/{js?}', [TipoController::class,'index']);

Route::resource('Marca', MarcaController::class)->except('show','edit','create','update');
Route::PUT('/Marca', [MarcaController::class,'update'])->name('Marca.update');
Route::POST('/Marcas', [MarcaController::class,'cargar'])->name('Marca.cargar');
Route::POST('/Marca/rellenar', [MarcaController::class,'mostrar'])->name('Marca.mostrar');
Route::GET('/Marca/{js?}', [MarcaController::class,'index']);

Route::resource('Modelo', ModeloController::class)->except('show','edit','create','update');
Route::PUT('/Modelo', [ModeloController::class,'update'])->name('Modelo.update');
Route::POST('/Modelos', [ModeloController::class,'cargar'])->name('Modelo.cargar');
Route::POST('/Modelo/rellenar', [ModeloController::class,'mostrar'])->name('Modelo.mostrar');
Route::GET('/Modelo/{js?}', [ModeloController::class,'index']);

Route::resource('Cosmetic', CosmeticController::class)->except('show','edit','create','update');
Route::PUT('/Cosmetic', [CosmeticController::class,'update'])->name('Cosmetic.update');
Route::POST('/Cosmetics', [CosmeticController::class,'cargar'])->name('Cosmetic.cargar');
Route::POST('/Cosmetic/rellenar', [CosmeticController::class,'mostrar'])->name('Cosmetic.mostrar');
Route::GET('/Cosmetic/{js?}', [CosmeticController::class,'index']);

Route::resource('Cosmetico', CosmeticoController::class)->except('show','edit','create','update');
Route::PUT('/Cosmetico', [CosmeticoController::class,'update'])->name('Cosmetico.update');
Route::POST('/Cosmeticos', [CosmeticoController::class,'cargar'])->name('Cosmetico.cargar');
Route::POST('/Cosmetico/rellenar', [CosmeticoController::class,'mostrar'])->name('Cosmetico.mostrar');
Route::GET('/Cosmetico/{js?}', [CosmeticoController::class,'index']);

//proyecto

Route::resource('Ocupacion_Laboral', Ocupacion_LaboralController::class)->except('show','edit','create','update');
Route::PUT('/Ocupacion_Laborale', [Ocupacion_LaboralController::class,'update'])->name('Ocupacion_Laboral.update');
Route::POST('/Ocupacion_Laborales', [Ocupacion_LaboralController::class,'cargar'])->name('Ocupacion_Laboral.cargar');
Route::POST('/Ocupacion_Laboral/rellenar', [Ocupacion_LaboralController::class,'mostrar'])->name('Ocupacion_Laboral.mostrar');
Route::GET('/Ocupacion_Laboral/{js?}', [Ocupacion_LaboralController::class,'index']);

Route::resource('Tipo_Usuario', Tipo_UsuarioController::class)->except('show','edit','create','update');
Route::PUT('/Tipo_Usuario', [Tipo_UsuarioController::class,'update'])->name('Tipo_Usuario.update');
Route::POST('/Tipos_Usuario', [Tipo_UsuarioController::class,'cargar'])->name('Tipo_Usuario.cargar');
Route::POST('/Tipo_Usuario/rellenar', [Tipo_UsuarioController::class,'mostrar'])->name('Tipo_Usuario.mostrar');
Route::GET('/Tipo_Usuario/{js?}', [Tipo_UsuarioController::class,'index']);

Route::resource('Tipo_Alergia', Tipo_AlergiaController::class)->except('show','edit','create','update');
Route::PUT('/Tipo_Alergia', [Tipo_AlergiaController::class,'update'])->name('Tipo_Alergia.update');
Route::POST('/Tipos_Alergia', [Tipo_AlergiaController::class,'cargar'])->name('Tipo_Alergia.cargar');
Route::POST('/Tipo_Alergia/rellenar', [Tipo_AlergiaController::class,'mostrar'])->name('Tipo_Alergia.mostrar');
Route::GET('/Tipo_Alergia/{js?}', [Tipo_AlergiaController::class,'index']);

Route::resource('Tipo_Discapacidad', Tipo_DiscapacidadController::class)->except('show','edit','create','update');
Route::PUT('/Tipo_Discapacidad', [Tipo_DiscapacidadController::class,'update'])->name('Tipo_Discapacidad.update');
Route::POST('/Tipos_Discapacidad', [Tipo_DiscapacidadController::class,'cargar'])->name('Tipo_Discapacidad.cargar');
Route::POST('/Tipo_Discapacidad/rellenar', [Tipo_DiscapacidadController::class,'mostrar'])->name('Tipo_Discapacidad.mostrar');
Route::GET('/Tipo_Discapacidad/{js?}', [Tipo_DiscapacidadController::class,'index']);

Route::resource('Alergia', AlergiaController::class)->except('show','edit','create','update');
Route::PUT('/Alergia', [AlergiaController::class,'update'])->name('Alergia.update');
Route::POST('/Alergias', [AlergiaController::class,'cargar'])->name('Alergia.cargar');
Route::POST('/Alergia/rellenar', [AlergiaController::class,'mostrar'])->name('Alergia.mostrar');
Route::GET('/Alergia/{js?}', [AlergiaController::class,'index']);

Route::resource('Discapacidad', DiscapacidadController::class)->except('show','edit','create','update');
Route::PUT('/Discapacidad', [DiscapacidadController::class,'update'])->name('Discapacidad.update');
Route::POST('/Discapacidades', [DiscapacidadController::class,'cargar'])->name('Discapacidad.cargar');
Route::POST('/Discapacidad/rellenar', [DiscapacidadController::class,'mostrar'])->name('Discapacidad.mostrar');
Route::GET('/Discapacidad/{js?}', [DiscapacidadController::class,'index']);

Route::resource('Cargo', CargoController::class)->except('show','edit','create','update');
Route::PUT('/Cargo', [CargoController::class,'update'])->name('Cargo.update');
Route::POST('/Cargos', [CargoController::class,'cargar'])->name('Cargo.cargar');
Route::POST('/Cargo/rellenar', [CargoController::class,'mostrar'])->name('Cargo.mostrar');
Route::GET('/Cargo/{js?}', [CargoController::class,'index']);

Route::resource('Seccion', SeccionController::class)->except('show','edit','create','update');
Route::PUT('/Seccion', [SeccionController::class,'update'])->name('Seccion.update');
Route::POST('/Secciones', [SeccionController::class,'cargar'])->name('Seccion.cargar');
Route::POST('/Seccion/rellenar', [SeccionController::class,'mostrar'])->name('Seccion.mostrar');
Route::GET('/Seccion/{js?}', [SeccionController::class,'index']);

Route::resource('Salon', SalonController::class)->except('show','edit','create','update');
Route::PUT('/Salon', [SalonController::class,'update'])->name('Salon.update');
Route::POST('/Salones', [SalonController::class,'cargar'])->name('Salon.cargar');
Route::POST('/Salon/rellenar', [SalonController::class,'mostrar'])->name('Salon.mostrar');
Route::GET('/Salon/{js?}', [SalonController::class,'index']);

Route::resource('Grado', GradoController::class)->except('show','edit','create','update');
Route::PUT('/Grado', [GradoController::class,'update'])->name('Grado.update');
Route::POST('/Grados', [GradoController::class,'cargar'])->name('Grado.cargar');
Route::POST('/Grado/rellenar', [GradoController::class,'mostrar'])->name('Grado.mostrar');
Route::GET('/Grado/{js?}', [GradoController::class,'index']);

Route::resource('State', StateController::class)->except('show','edit','create','update');
Route::PUT('/State', [StateController::class,'update'])->name('State.update');
Route::POST('/States', [StateController::class,'cargar'])->name('State.cargar');
Route::POST('/State/rellenar', [StateController::class,'mostrar'])->name('State.mostrar');
Route::GET('/State/{js?}', [StateController::class,'index']);

Route::resource('Municipality', MunicipalityController::class)->except('show','edit','create','update');
Route::PUT('/Municipality', [MunicipalityController::class,'update'])->name('Municipality.update');
Route::POST('/Municipalitys', [MunicipalityController::class,'cargar'])->name('Municipality.cargar');
Route::POST('/Municipality/rellenar', [MunicipalityController::class,'mostrar'])->name('Municipality.mostrar');
Route::GET('/Municipality/{js?}', [MunicipalityController::class,'index']);

Route::resource('Periodo_Escolar', Periodo_EscolarController::class)->except('show','edit','create','update');
Route::PUT('/Periodo_Escolar', [Periodo_EscolarController::class,'update'])->name('Periodo_Escolar.update');
Route::POST('/Periodos_Escolares', [Periodo_EscolarController::class,'cargar'])->name('Periodo_Escolar.cargar');
Route::POST('/Periodo_Escolar/rellenar', [Periodo_EscolarController::class,'mostrar'])->name('Periodo_Escolar.mostrar');
Route::POST('/Periodo_Escolar/empleado', [Periodo_EscolarController::class,'empleado'])->name('Periodo_Escolar.empleado');
Route::GET('/Periodo_Escolar/{js?}', [Periodo_EscolarController::class,'index']);


Route::resource('Empleado', EmpleadoController::class)->except('show','edit','create','update');
Route::PUT('/Empleado', [EmpleadoController::class,'update'])->name('Empleado.update');
Route::POST('/Empleados', [EmpleadoController::class,'cargar'])->name('Empleado.cargar');
Route::POST('/Empleado/rellenar', [EmpleadoController::class,'mostrar'])->name('Empleado.mostrar');
Route::GET('/Empleado/{js?}', [EmpleadoController::class,'index']);

Route::resource('Usuario', UsuarioController::class)->except('show','edit','create','update');
Route::PUT('/Usuario', [UsuarioController::class,'update'])->name('Usuario.update');
Route::POST('/Usuarios', [UsuarioController::class,'cargar'])->name('Usuario.cargar');
Route::POST('/Usuario/rellenar', [UsuarioController::class,'mostrar'])->name('Usuario.mostrar');
Route::POST('/Usuario/empleado', [UsuarioController::class,'empleado'])->name('Usuario.empleado');
Route::GET('/Usuario/{js?}', [UsuarioController::class,'index']);

Route::resource('Representante', RepresentanteController::class)->except('show','edit','create','update');
Route::PUT('/Representante', [RepresentanteController::class,'update'])->name('Representante.update');
Route::POST('/Representantes', [RepresentanteController::class,'cargar'])->name('Representante.cargar');
Route::POST('/Representante/rellenar', [RepresentanteController::class,'mostrar'])->name('Representante.mostrar');
Route::GET('/Representante/{js?}', [RepresentanteController::class,'index']);

Route::resource('Estudiante', EstudianteController::class)->except('show','edit','create','update');
Route::PUT('/Estudiante', [EstudianteController::class,'update'])->name('Estudiante.update');
Route::POST('/Estudiantes', [EstudianteController::class,'cargar'])->name('Estudiante.cargar');
Route::POST('/Estudiante/rellenar', [EstudianteController::class,'mostrar'])->name('Estudiante.mostrar');
Route::POST('/Estudiante/clear_a', [EstudianteController::class,'clear_a'])->name('Estudiante.clear_a');
Route::POST('/Estudiante/clear_d', [EstudianteController::class,'clear_d'])->name('Estudiante.clear_d');
Route::POST('/Estudiante/alergias', [EstudianteController::class,'alergias'])->name('Estudiante.alergias');
Route::POST('/Estudiante/discapacidades', [EstudianteController::class,'discapacidades'])->name('Estudiante.discapacidades');
Route::POST('/Estudiante/representante', [EstudianteController::class,'representante'])->name('Estudiante.representante');
Route::POST('/Estudiante/quitar_a', [EstudianteController::class,'quitar_a'])->name('Estudiante.quitar_a');
Route::POST('/Estudiante/quitar_d', [EstudianteController::class,'quitar_d'])->name('Estudiante.quitar_d');
Route::POST('/Estudiante/combobox', [EstudianteController::class,'combobox'])->name('Estudiante.combobox');
Route::GET('/Estudiante/{js?}', [EstudianteController::class,'index']);

// Reportes

Route::get('/imprimirTipoAlergia', [imprimirTiposAlergiasController::class, 'imprimirTodos'])->name('imprimirTipoAlergia');

//c-sabe

Route::resource('Pregunta', PreguntaController::class)->except('show','edit','create','update');
Route::PUT('/Pregunta', [PreguntaController::class,'update'])->name('Pregunta.update');
Route::POST('/Preguntas', [PreguntaController::class,'cargar'])->name('Pregunta.cargar');
Route::POST('/Pregunta/rellenar', [PreguntaController::class,'mostrar'])->name('Pregunta.mostrar');
Route::POST('/Pregunta/clear', [PreguntaController::class,'clear'])->name('Pregunta.clear');
Route::POST('/Pregunta/quitar', [PreguntaController::class,'quitar'])->name('Pregunta.quitar');
Route::POST('/Pregunta/respuestas', [PreguntaController::class,'respuestas'])->name('Pregunta.respuestas');
Route::POST('/Pregunta/exam', [PreguntaController::class,'exam'])->name('Pregunta.exam');
Route::POST('/Pregunta/calcular', [PreguntaController::class,'calcular'])->name('Pregunta.calcular');
Route::GET('/Pregunta/{js?}', [PreguntaController::class,'index']);
Route::GET('/Preguntas/prueba', [PreguntaController::class,'prueba'])->name('Pregunta.prueba');

Route::resource('Curso', CursoController::class)->except('show','edit','create','update');
Route::PUT('/Curso', [CursoController::class,'update'])->name('Curso.update');
Route::POST('/Cursos', [CursoController::class,'cargar'])->name('Curso.cargar');
Route::POST('/Curso/agreg_pre', [CursoController::class,'agreg_pre'])->name('Curso.agreg_pre');
Route::POST('/Curso/agreg_resp', [CursoController::class,'agreg_resp'])->name('Curso.agreg_resp');
Route::POST('/Curso/quitar_p', [CursoController::class,'quitar_p'])->name('Curso.quitar_p');
Route::POST('/Curso/quitar_r', [CursoController::class,'quitar_r'])->name('Curso.quitar_r');
Route::POST('/Curso/clear_p', [CursoController::class,'clear_p'])->name('Curso.clear_p');
Route::POST('/Curso/clear_r', [CursoController::class,'clear_r'])->name('Curso.clear_r');
Route::POST('/Curso/puntos', [CursoController::class,'puntos'])->name('Curso.puntos');
Route::POST('/Curso/rellenar', [CursoController::class,'mostrar'])->name('Curso.mostrar');
Route::GET('/Curso/{js?}', [CursoController::class,'index']);

// otros
Route::resource('combobox', combo::class)->only('store');


