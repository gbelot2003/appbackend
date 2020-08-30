<?php

namespace App\Http\Controllers;

use Acme\Helpers\ProfileControllerHelper;
use App\City;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use acme\Http\Controllers\GeneralInfoController;

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
        $user = auth()->user();
        $title = 'Profile';
        return View('profile.index', compact('user', 'title'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->user();
        $title = 'Profile';
        // se debe modificar
        $countries = Country::pluck('name', 'id');
        $cities = City::where('country_id', $user->profile->country_id)->pluck('name', 'id');
        return View('profile.edit', compact('user', 'title', 'countries', 'cities'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $update = new ProfileControllerHelper();
        $update->updating($request);
    }



}
