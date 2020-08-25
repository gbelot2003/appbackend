<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommunsController extends Controller
{

    /**
     * CommunsController constructor.
     * TODO: Especificar permisos
     */
    function __construct()
    {
    }


    public function image_uploader(Request $request)
    {
        // Validamos la imagen
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:150000',
        ]);

        // Obtenemos el nombre del archivo
        $name = $request->image->getClientOriginalName();

        // Guardamos la imagen en carpeta profile
        $storage = $request->file('image')->storeAs(
            'profiles', $name
        );

        // storage/app/public/profiles/$name;
        $path  ="/storage/app/public/profiles/$name";

        auth()->user()->profile->avatar = ($name);


        // Devolvemos ??
        return response($name, 200);
    }
}