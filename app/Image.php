<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model{
    

    // tabla que modificara este modelo
    protected $table = 'images';

    // relacion one to many
    public function comments(){
        
        // relacion con la tabla de comentarios
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    // relacion one to many
    public function likes(){

        // relacion con la tabla likes
        return $this->hasMany('App\Like');
    }

    // relacion varios a varios
    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }
}
