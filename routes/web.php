<?php

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
    return view('welcome');
});


Route::resource('calibres', 'CalibreController');
Route::resource('categorias', 'CategoriaController');
Route::resource('comunas', 'ComunaController');
Route::resource('conceptos', 'ConceptoController');
Route::resource('defectos', 'DefectoController');
Route::resource('embalajes', 'EmbalajeController');
Route::resource('estados_muestras', 'EstadoMuestraController');
Route::resource('etiquetas', 'EtiquetaController');
Route::resource('lotes', 'LoteController');
Route::resource('muestras', 'MuestraController');
Route::resource('muestras_defectos', 'MuestraDefectoController');
Route::resource('notas', 'NotaController');
Route::resource('producotres', 'ProductorController');
Route::resource('provincias', 'ProvinciaController');
Route::resource('regiones', 'RegionController');
Route::resource('tolerancias', 'ToleranciaController');
Route::resource('users', 'UsersController');
Route::resource('variedades', 'VariedadController');
Route::resource('zonas_defectos', 'ZonaDefectoController');






