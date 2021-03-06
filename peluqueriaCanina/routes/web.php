<?php

use App\Http\Controllers\ReservaCitaController;
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
    return redirect()->route('home');
});

Auth::routes();


//Rutas que pasaran por el controlador is_admin
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin', 'AdminController@admin')->name('admin');
});

//Rutas del Contacto
Route::get('/contacto', 'ContactoController@index')->name('contacto');

Route::post('/editarContacto/{id}','ContactoController@editar')->name('editarContacto');
Route::get('/modal/editarContacto/{id}','ContactoController@editarContactoModal')->name('editarContactoModal');



//Rutas del Nosotros
Route::get('/nosotros', 'NosotrosController@index')->name('nosotros');
Route::post('/subirImagenNosotros','PerfilController@subirImagen')->name('subirImagenNosotros');
Route::post('/editarNosotros/{id}','NosotrosController@editar')->name('editarNosotros');
Route::get('/modal/editarNosotros/{id}','NosotrosController@editarNosotrosModal')->name('editarNosotrosModal');


//Rutas Perfil
Route::get('/formulario_mascota/agregar', 'MascotaController@formularioAgregar')->name('agregarMascota');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/perfil/{id}','PerfilController@index')->name('perfil');
Route::get('/modal/actividades','PerfilController@actividadesModal')->name('actividadesModal');
Route::get('/modal/citas','PerfilController@citasModal')->name('citasModal');


Route::post('/agregarMascota','MascotaController@agregarMascota')->name('insertarMascota');
Route::post('/subirImagenPerfil','PerfilController@subirImagen')->name('subirImagenPerfil');
Route::post('/editarperfil','PerfilController@editarPerfil')->name('editarPerfil');


//-------------------------------Rutas galeria-----------------------------------
Route::get('/galeria', 'CortePeloController@index')->name('galeria');
Route::get('cortePelo/', 'CortePeloController@download');

// Rutas modales
Route::get('/modal/eliminarCorte/{id}','CortePeloController@eliminarCorteModal')->name('eliminarCorteModal');
Route::get('/modal/editarCorte/{id}','CortePeloController@editarCorteModal')->name('editarCorteModal');
Route::get('/modal/agregarCorte','CortePeloController@agregarCorteModal')->name('agregarCorteModal');

// Rutas post
Route::post('/galeria/filtro', 'CortePeloController@galeriaFiltro')->name('galeriaFiltro');
Route::post('/galeria/agregar','CortePeloController@agregarCorte')->name('agregarCorte');

Route::post('/galeria/editarCorte/{id}','CortePeloController@editarCorte')->name('editarCorte');
Route::post('/galeria/eliminarCorte/{id}','CortePeloController@eliminarCorte')->name('eliminarCorte');
 
// Comentarios
Route::get('/modal/verComentario/{id}','CortePeloController@verComentarioModal')->name('verComentarioModal');
Route::post('/galeria/comentario/{id}','CortePeloController@agregarComentario')->name('agregarComentario');
 
// OrdenImagenes
Route::get('/galeria/ordenAscendente','CortePeloController@ordenAscendente')->name('ordenAscendente');
Route::get('/galeria/ordenDescendente','CortePeloController@ordenDescendente')->name('ordenDescendente');
//------------------------------Rutas CorteFavorito------------------------------------------
Route::resource('cortesFavoritos', 'CorteFavoritoController');

Route::get('/corteFavorito', 'CorteFavoritoController@index')->name('cortesFavoritos');

//Ruta modal
Route::get('/modal/eliminarCorteFavorito/{id}','CorteFavoritoController@eliminarCorteModal')->name('eliminarCorteFavoritoModal');
Route::get('/modal/agregarFavorito/{id}','CortePeloController@agregarCorteFavoritoModal')->name('agregarCorteFavoritoModal');

//Ruta post
Route::post('/corteFavorito/eliminarCorteFavorito/{id}','CorteFavoritoController@eliminarCorte')->name('eliminarCorteFavorito');
Route::post('/galeria/agregarFavorito/{id}','CortePeloController@agregarCorteFavorito')->name('agregarCorteFavorito');

Route::post('/corteFavorito/Filtro', 'CorteFavoritoController@corteFavoritoFiltro')->name('cortesFavoritosFiltro');

//------------------------------Rutas Registrar Mascota -------------------------------------
Route::get('/registraMascota', 'Auth\RegisterController@registraMascota')->name('registraMascota');


//------------------------------Rutas Catalogo ----------------------------------------------
Route::resource('catalogo', 'ProductosController');
Route::get('/catalogo', 'ProductosController@index')->name('catalogo');
Route::get('/catalogo/producto/{id}','ProductosController@detalles')->name('detallesProducto');

//Rutas post
Route::post('/catalogo/Filtro', 'ProductosController@catalogoFiltro')->name('catalogoFiltro');
Route::post('/catalogo/agregar/producto','ProductosController@agregar')->name('agregarProducto');

Route::post('/galeria/editarProducto/{id}','ProductosController@editar')->name('editarProducto');
Route::post('/galeria/eliminarProducto/{id}','ProductosController@eliminar')->name('eliminarProducto');

// Rutas modales
Route::get('/modal/eliminarProducto/{id}','ProductosController@eliminarProductoModal')->name('eliminarProductoModal');
Route::get('/modal/editarProducto/{id}','ProductosController@editarProductoModal')->name('editarProductoModal');


//------------------------------Rutas Eventos ---------------------------------------
Route::get('/eventos', 'EventosController@index')->name('eventos');
Route::get('/eventos/detalle/{id}','EventosController@detalles')->name('evento_detalle');

Route::post('eventos/agregar',"EventosController@agregar")->name('agregarEvento');
Route::post('eventos/editar/{id}',"EventosController@editar")->name('editarEvento');
Route::post('eventos/eliminar/{id}',"EventosController@eliminar")->name('eliminarEvento');

//Rutas modales
Route::get('/modal/agregarEvento','EventosController@agregarModal')->name("agregarEventoModal");
Route::get('/modal/editarEvento/{id}','EventosController@editarModal')->name("editarEventoModal");
Route::get('/modal/eliminarEvento/{id}','EventosController@eliminarModal')->name("eliminarEventoModal");

//-------------------------------Rutas reservaCita-----------------------------------

Route::get('/reservaCita', 'ReservaCitaController@index')->name('reservaCita');
Route::post('/reservaCita', 'ReservaCitaController@crear')->name('crearCita');

Route::get('/reservaCita/{semana}' , 'ReservaCitaController@indexCustom')->name('customFecha');


