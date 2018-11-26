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

Auth::routes();



//Rutas que pasaran por el controlador is_admin
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin', 'AdminController@admin')->name('admin');

});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil/{nombre}','PerfilController@index')->name('perfil');

// Route::get('/perfil/{nombre}/{id}','PerfilController@index')->name('perfil');

Route::get('/galeria', 'CortePeloController@index_default')  
    ->name('galeria');

Route::get('cortePelo/', 'CortePeloController@download');



