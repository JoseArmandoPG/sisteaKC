<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvidCatr within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('sistema/page-login');
});

/** LOGIN **/
Route::get('/login','loginController@login')->name('login');
Route::POST('/valida','loginController@valida')->name('valida');
Route::get('/cerrarsesion','loginController@cerrarsesion')->name('cerrarsesion');
Route::get('/inicio','loginController@inicio')->name('inicio');

/** CATEGORIAS **/
Route::get('/altaCategoria','categoriaController@altaCategoria');
Route::POST('/guardaCategoria','categoriaController@guardaCategoria')->name('guardaCategoria');
Route::get('/reporteCategorias','categoriaController@reporteCategoria');
Route::get('/eliminaCategoria/{idCat}','categoriaController@eliminaCategoria')->name('eliminaCategoria');
Route::get('/eFisicaCategoria/{idCat}','categoriaController@eFisicaCategoria')->name('eFisicaCategoria');
Route::get('/restauraCategoria/{idCat}','categoriaController@restauraCategoria')->name('restauraCategoria');
Route::get('/modificaCategoria/{idCat}','categoriaController@modificaCategoria')->name('modificaCategoria');
Route::POST('/editaCategoria','categoriaController@editaCategoria')->name('editaCategoria');

