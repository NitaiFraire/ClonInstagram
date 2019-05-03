<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\User;

class UserController extends Controller{

    public function __construct(){
        
        $this->middleware('auth');
    }
    
    public function config(){
        
        return view('user.config');
    }

    public function update(Request $request){

        // conseguir el usuario identificado
        $user = \Auth::user();
        $id = \Auth::user()->id;


        // validacion de formulario
        $validate = $this->validate($request, [

            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],
            'email' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)]
        ]);

        // recoger datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        // asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // subir imagen
        $image_path = $request->file('image_path');

        if($image_path){

            // asiganerle nombre
            $image_path_ful  = time().$image_path->getClientOriginalName();

            // guardarla en carpeta storage
            Storage::disk('users')->put($image_path_ful, File::get($image_path));

            // set el nombre de la img en el objeto
            $user->image = $image_path_ful;
        }

        // ejecutar query para update en la db
        $user->update();

        return redirect()->route('config')->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function getImage($fileName){
        
        $file = Storage::disk('users')->get($fileName);

        return new Response($file, 200);
    }

    public function profile($id){
        
        $user = User::find($id);

        return view('user.profile', [

            'user' => $user
        ]);
    }
}
