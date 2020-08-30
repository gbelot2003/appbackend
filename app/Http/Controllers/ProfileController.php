<?php

namespace App\Http\Controllers;

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

            $this->UpdateGeneralInfo($request);

        }

        if ($request->has('field_facebook') || $request->has('field_twitter') ||
            $request->has('field_instagram') || $request->has('field_linkedin')) {

            $this->SocialMediaUpdate($request);
        }
    }

    /**
     * @param Request $request
     */
    private function UpdateGeneralInfo(Request $request)
    {
        $request->validate(
            [
                'name'              => 'required',
                'email'             => 'required',
                'phonefield'        => 'required',
                'alias'             => 'nullable|string',
                'about'             => 'nullable|string',
            ]
        );

        auth()->user()->update($request->only(['name', 'email', 'phonefield']));

        auth()->user()->profile->update([
            'alias' => $request->get('alias'),
            'about' => $request->get('about')
        ]);
    }

    /**
     * @param Request $request
     */
    private function SocialMediaUpdate(Request $request)
    {
        $request->validate(
            [
                'field_facebook' => 'nullable|string|url',
                'field_twitter' => 'nullable|string|url',
                'field_instagram' => 'nullable|string|url',
                'field_linkedin' => 'nullable|string|url',
            ]
        );

        auth()->user()->profile->update([
            'field_facebook' => $request->get('field_facebook'),
            'field_twitter' => $request->get('field_twitter'),
            'field_instagram' => $request->get('field_instagram'),
            'field_linkedin' => $request->get('field_linkedin'),
        ]);
    }
}
