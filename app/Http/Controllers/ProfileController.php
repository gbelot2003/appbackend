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
        $cities = City::where('country_id', $user->profile->country_id)->pluck('name', 'id');
        return View('profile.edit', compact('user', 'title', 'countries', 'cities'));
    }


    public function update(Request $request)
    {
        if ($request->has('name') || $request->has('email')         ||
            $request->has('phonefield') || $request->has('alias')   ||
            $request->has('about')) {

            $update = new ProfileControllerHelper();
            $update->UpdateGeneralInfo($request);

        }

        if ($request->has('field_facebook') || $request->has('field_twitter') ||
            $request->has('field_instagram') || $request->has('field_linkedin')) {

            $update = new ProfileControllerHelper();
            $update->SocialMediaUpdate($request);
        }

        if ($request->has('password')) {
            $this->UpdatePassword($request);
        }
    }

    /**
     * @param Request $request
     */
    private function UpdatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $passwordd = bcrypt($request->get('password'));
        auth()->user()->update([
            'password' => $passwordd
        ]);
    }
}
