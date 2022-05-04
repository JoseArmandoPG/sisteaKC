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

/** Ubicaciones **/
Route::get('/altaUbicacion','ubicacionController@altaUbicacion');
Route::POST('/guardaUbicacion','ubicacionController@guardaUbicacion')->name('guardaUbicacion');
Route::get('/reporteUbicaciones','ubicacionController@reporteUbicacion');
Route::get('/eliminaUbicacion/{idUb}','ubicacionController@eliminaUbicacion')->name('eliminaUbicacion');
Route::get('/eFisicaUbicacion/{idUb}','ubicacionController@eFisicaUbicacion')->name('eFisicaUbicacion');
Route::get('/restauraUbicacion/{idUb}','ubicacionController@restauraUbicacion')->name('restauraUbicacion');
Route::get('/modificaUbicacion/{idUb}','ubicacionController@modificaUbicacion')->name('modificaUbicacion');
Route::POST('/editaUbicacion','ubicacionController@editaUbicacion')->name('editaUbicacion');

/** Plataformas **/
Route::get('/altaPlataforma','plataformaController@altaPlataforma');
Route::POST('/guardaPlataforma','plataformaController@guardaPlataforma')->name('guardaPlataforma');
Route::get('/reportePlataformas','plataformaController@reportePlataforma');
Route::get('/eliminaPlataforma/{idPla}','plataformaController@eliminaPlataforma')->name('eliminaPlataforma');
Route::get('/eFisicaPlataforma/{idPla}','plataformaController@eFisicaPlataforma')->name('eFisicaPlataforma');
Route::get('/restauraPlataforma/{idPla}','plataformaController@restauraPlataforma')->name('restauraPlataforma');
Route::get('/modificaPlataforma/{idPla}','plataformaController@modificaPlataforma')->name('modificaPlataforma');
Route::POST('/editaPlataforma','plataformaController@editaPlataforma')->name('editaPlataforma');

/** Usuarios **/
Route::get('/altaUsuario','usuarioController@altaUsuario');
Route::POST('/guardaUsuario','usuarioController@guardaUsuario')->name('guardaUsuario');
Route::get('/reporteUsuarios','usuarioController@reporteUsuario');
Route::get('/eliminaUsuario/{idUsu}','usuarioController@eliminaUsuario')->name('eliminaUsuario');
Route::get('/eFisicaUsuario/{idUsu}','usuarioController@eFisicaUsuario')->name('eFisicaUsuario');
Route::get('/restauraUsuario/{idUsu}','usuarioController@restauraUsuario')->name('restauraUsuario');
Route::get('/modificaUsuario/{idUsu}','usuarioController@modificaUsuario')->name('modificaUsuario');
Route::POST('/editaUsuario','usuarioController@editaUsuario')->name('editaUsuario');

/** Marcas **/
Route::get('/altaMarca','marcaController@altaMarca');
Route::POST('/guardaMarca','marcaController@guardaMarca')->name('guardaMarca');
Route::get('/reporteMarcas','marcaController@reporteMarca');
Route::get('/eliminaMarca/{idMarca}','marcaController@eliminaMarca')->name('eliminaMarca');
Route::get('/eFisicaMarca/{idMarca}','marcaController@eFisicaMarca')->name('eFisicaMarca');
Route::get('/restauraMarca/{idMarca}','marcaController@restauraMarca')->name('restauraMarca');
Route::get('/modificaMarca/{idMarca}','marcaController@modificaMarca')->name('modificaMarca');
Route::POST('/editaMarca','marcaController@editaMarca')->name('editaMarca');

/** Productos **/
Route::get('/prueba','productoController@prueba');
Route::get('/altaProducto','productoController@altaProducto');
Route::POST('/guardaProducto','productoController@guardaProducto')->name('guardaProducto');
Route::get('/reporteProductos','productoController@reporteProducto');
Route::get('/eliminaProducto/{idPro}','productoController@eliminaProducto')->name('eliminaProducto');
Route::get('/eFisicaProducto/{idPro}','productoController@eFisicaProducto')->name('eFisicaProducto');
Route::get('/restauraProducto/{idPro}','productoController@restauraProducto')->name('restauraProducto');
Route::get('/modificaProducto/{idPro}','productoController@modificaProducto')->name('modificaProducto');
Route::get('/seeProducto/{idPro}','productoController@seeProducto')->name('seeProducto');
Route::POST('/editaProducto','productoController@editaProducto')->name('editaProducto');

Route::get('/datos','productoController@datos')->name('datos');

/** Ventas **/
Route::get('/venta','ventaController@venta');
Route::get('/detalleProd','productoController@detalleProd')->name('detalleProd');
Route::get('/productoDetalle','productoController@productoDetalle')->name('productoDetalle');
Route::get('/detalleFechas','ventaController@detalleFechas')->name('detalleFechas');
Route::POST('/guardaVenta','ventaController@guardaVenta')->name('guardaVenta');
Route::get('/reporteVentas','ventaController@reporteVenta');