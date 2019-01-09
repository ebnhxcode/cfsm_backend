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
    return view('layouts.web');
});

Route::resource('productores', 'ProductorController');
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
Route::resource('provincias', 'ProvinciaController');
Route::resource('regiones', 'RegionController');
Route::resource('tolerancias', 'ToleranciaController');
Route::resource('users', 'UsersController');
Route::resource('variedades', 'VariedadController');
Route::resource('zonas_defectos', 'ZonaDefectoController');
Route::get('reportes','ReporteController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*rutas especieales  mantenedores */
Route::get('productoresDatetables','ProductorController@productoresDatetables');
Route::get('productoresDelete/{id}','ProductorController@productoresDelete');
Route::get('variedadesDatetables','VariedadController@variedadesDatetables');
Route::get('variedadesDelete/{id}','VariedadController@variedadesDelete');
Route::get('calibresDatetables','CalibreController@calibresDatetables');
Route::get('calibresDelete/{id}','CalibreController@calibresDelete');
Route::get('etiquetasDatetables','EtiquetaController@etiquetasDatetables');
Route::get('etiquetasDelete/{id}','EtiquetaController@etiquetasDelete');


/* Especiales */


/*rutas de api que usan middleware*/
Route::get('getProductores', 'ApiController@getProductores');
Route::get('getRegiones', 'ApiController@getRegiones');
Route::get('getEspecies', 'ApiController@getEspecies');
Route::get('getVariedades', 'ApiController@getVariedades');
Route::get('getEtiquetas', 'ApiController@getEtiquetas');
Route::get('getCalibres', 'ApiController@getCalibres');
Route::get('getCategorias', 'ApiController@getCategorias');
Route::get('getEmbalajes', 'ApiController@getEmbalajes');
Route::get('getEstadosMuestra', 'ApiController@getEstadosMuestra');
Route::get('getNotas', 'ApiController@getNotas');
Route::get('loginUsuario', 'ApiController@loginUsuario');

