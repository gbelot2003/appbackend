<?php

namespace App\Http\Controllers;

use App\Contry;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:ver_perfil_propio'])->only(['index']);
        $this->middleware(['permission:editar_perfil_propio'])->only(['edit']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $title = 'Profile';
        return View('profile.index', compact('user', 'title'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        $title = 'Profile';
        // se debe modificar
        $countries = Country::pluck('name', 'id');
        return View('profile.edit', compact('user', 'title', 'countries'));
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate(
            [
                'name'          => 'required',
                'email'         => 'required',
                'phonefield'    => 'required',
                'alias'         => 'nullable|string'
            ]
        );

        $user->update($request->all());



    }
}
