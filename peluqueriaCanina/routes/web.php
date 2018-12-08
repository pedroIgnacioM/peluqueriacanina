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
    return redirect()->route('home');
});

Auth::routes();


//Rutas que pasaran por el controlador is_admin
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin', 'AdminController@admin')->name('admin');

});

//Rutas del Contacto
Route::get('/contacto', 'ContactoController@index')->name('contacto');

//Rutas Perfil
Route::get('/formulario_mascota/agregar', 'MascotaController@formularioAgregar')->name('agregarMascota');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/perfil/{nombre}','PerfilController@index')->name('perfil');
Route::get('/modal/actividades','PerfilController@actividadesModal')->name('actividadesModal');

Route::post('/agregarMascota','MascotaController@agregarMascota')->name('insertarMascota');
Route::post('/subirImagenPerfil','PerfilController@subirImagen')->name('subirImagenPerfil');
Route::post('/editarperfil','PerfilController@editarPerfil')->name('editarPerfil');


//-------------------------------Rutas galeria-----------------------------------
Route::resource('galeria', 'CortePeloController');

Route::get('/galeria', 'CortePeloController@index_default')->name('galeria');
Route::get('cortePelo/', 'CortePeloController@download');

// Rutas modales
Route::get('/modal/eliminarCorte/{id}','CortePeloController@eliminarCorteModal')->name('eliminarCorteModal');
Route::get('/modal/editarCorte/{id}','CortePeloController@editarCorteModal')->name('editarCorteModal');

//Rutas post
Route::post('/galeria/filtro', 'CortePeloController@galeriaFiltro')->name('galeriaFiltro');
Route::post('/galeria/agregar','CortePeloController@agregarCorte')->name('agregarCorte');
Route::post('/galeria/editarCorte/{id}','CortePeloController@editarCorte')->name('editarCorte');
Route::post('/galeria/eliminarCorte/{id}','CortePeloController@eliminarCorte')->name('eliminarCorte');







Route::get('/registraMascota', 'Auth\RegisterController@registraMascota')->name('registraMascota');




Route::resource('catalogo', 'ProductosController');
Route::get('/catalogo', 'ProductosController@index')->name('catalogo');
Route::post('/catalogo/Filtro', 'ProductosController@catalogoFiltro')->name('catalogoFiltro');
