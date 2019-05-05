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
//use Symfony\Component\Routing\Annotation\Route;

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

// ruta para subir imagenes
Route::get('/uploadImage', 'ImageController@create')->name('image.create');

// ruta par guardar imagen
Route::post('/image/save', 'ImageController@save')->name('image.save');

// ruta para mostrar imagen
Route::get('/image/file/{fileName}', 'ImageController@getImage')->name('image.file');

// ruta para detalle imagen
Route::get('/image/{id}', 'ImageController@detail')->name('image.detail');

// ruta para recibir comentario
Route::post('/comment/save', 'CommentController@save')->name('comment.save');

// ruta para elimiar comentario
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

// ruta para recibir like
Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');

// ruta para eliminar like
Route::get('/disLike/{image_id}', 'LikeController@disLike')->name('like.delete');

Route::get('likes', 'LikeController@index')->name('likes');

Route::get('/perfil/{id}', 'UserController@profile')->name('profile');

// ruta para eliminar imagen
Route::get('/imagen/delete/{id}', 'ImageController@delete')->name('image.delete');

// ruta par aedicion de imagen
Route::get('/imagen/editar/{id}', 'ImageController@edit')->name('image.edit');

