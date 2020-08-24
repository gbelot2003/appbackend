<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommunsController extends Controller
{

    /**
     * CommunsController constructor.
     */
    function __construct()
    {
    }


    public function image_uploader(Request $request)
    {

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:150000',
        ]);

        $name = $request->image->getClientOriginalName();

        $path = Storage::putFileAs('public',  $request->image, $name);

        return response($name, 200);
    }
}