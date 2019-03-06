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

    // sacar todass las img
    $images = Image::all();

    foreach ($images as $image ) {
        
        echo $image->image_path . '<br>';
        echo $image->user->name .' '. $image->user->surname . '<br>';

        if(count($image->comments) >= 1){

            echo '<h3>comentarios:</h3>';
            foreach ($image->comments as $coment) {
                # code...
                echo $coment->user->name .' '. $coment->user->surname. ':';
                echo $coment->content . '<br>'; 
            }
        }

        echo 'Likes: ' . count($image->likes);

        echo '<hr>';
    }
    die();

    return view('welcome');
});
