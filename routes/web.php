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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*rutas a mantenedores */
Route::get('productoresDatetables','ProductorController@productoresDatetables');
Route::get('productoresDelete/{id}','ProductorController@productoresDelete');
Route::resource('productores', 'ProductorController');


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

