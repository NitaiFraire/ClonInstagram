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

use App\Image;

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Rutas formulario de configuracion
Route::get('/configuracion', 'UserController@config')->name('config');

// Ruta actualizacion de informacion
Route::post('/user/update', 'UserController@update')->name('user.update');

// ruta para mosrar imagen
Route::get('/user/avatar/{fileName}', 'UserController@getImage')->name('user.avatar');
