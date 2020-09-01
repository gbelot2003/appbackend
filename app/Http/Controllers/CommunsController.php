<?php

namespace App\Http\Controllers;

use Acme\Helpers\StoreFilesHelper;
use Illuminate\Http\Request;

class CommunsController extends Controller
{

    /**
     * CommunsController constructor.
     * TODO: Especificar permisos
     */
    function __construct()
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     *
     * TODO: Agregar metodo de cambio de avatar en editor de usuarios
     */
    public function upload_avatar(Request $request)
    {
        // Validamos la imagen
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:150000',
        ]);

        // Guardamos Imagen
        $upload = new StoreFilesHelper($request);

        // retorna el nombre de imagen;
        $name = $upload->storeAvatarIn('profiles');

        // Guardamos en profile User
        auth()->user()->profile->update([
            'avatar' => $name
        ]);

        $response = (string) auth()->user()->profile->avatarPath();
        // respondemos
        return response()->json($response, 200);
    }

}