<?php

/**
 * Created by PhpStorm.
 * User: gerardo
 * Date: 08-30-20
 * Time: 11:22 AM
 */

namespace Acme\Helpers;


use Illuminate\Http\Request;

class ProfileControllerHelper
{

    /**
     * @param Request $request
     */
    public function updating(Request $request)
    {
        if (
            $request->has('name') || $request->has('email') ||
            $request->has('phonefield') || $request->has('alias') ||
            $request->has('about') || $request->has('country_id') ||
            $request->has('city_id')
        ) {

            $this->UpdateGeneralInfo($request);
        }

        if (
            $request->has('field_facebook') || $request->has('field_twitter') ||
            $request->has('field_instagram') || $request->has('field_linkedin')
        ) {

            $this->SocialMediaUpdate($request);
        }

        if ($request->has('password')) {
            $this->UpdatePassword($request);
        }

        if (
            $request->has('share_profile') || $request->has('share_name') ||
            $request->has('share_email') || $request->has('share_phone') ||
            $request->has('share_about')
        ) {
            auth()->user()->profile->update([
                'share_profile'     => $request->get('share_profile'),
                'share_name'        => $request->get('share_name'),
                'share_email'       => $request->get('share_email'),
                'share_phone'       => $request->get('share_phone'),
                'share_about'       => $request->get('share_about'),
            ]);

            return response()->json('ok', 200);
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function UpdateGeneralInfo(Request $request)
    {
        $this->ValidateGeneralInfo($request);

        auth()->user()->update($request->only(['name', 'email', 'phonefield']));

        auth()->user()->profile->update([
            'alias'         => $request->get('alias'),
            'about'         => $request->get('about'),
            'country_id'    => $request->get('country_id'),
            'city_id'       => $request->get('city_id'),
        ]);

        return response()->json('ok', 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function SocialMediaUpdate(Request $request)
    {
        $this->ValidateSocialInfo($request);

        auth()->user()->profile->update([
            'field_facebook' => $request->get('field_facebook'),
            'field_twitter' => $request->get('field_twitter'),
            'field_instagram' => $request->get('field_instagram'),
            'field_linkedin' => $request->get('field_linkedin'),
        ]);

        return response()->json('ok', 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function updatePassword(Request $request)
    {
        $this->ValidatePassword($request);

        $passwordd = bcrypt($request->get('password'));
        auth()->user()->update([
            'password' => $passwordd
        ]);

        return response()->json('ok', 200);
    }

    /**
     * @param Request $request
     */
    private function ValidateGeneralInfo(Request $request)
    {
        $request->validate(
            [
                'name'          => 'required',
                'email'         => 'required',
                'phonefield'    => 'required',
                'alias'         => 'nullable|string',
                'about'         => 'nullable|string',
                'country_id'    => 'required',
                'city_id'       => 'required'
            ]
        );
    }

    /**
     * @param Request $request
     */
    private function ValidateSocialInfo(Request $request)
    {
        $request->validate(
            [
                'field_facebook' => 'nullable|string|url',
                'field_twitter' => 'nullable|string|url',
                'field_instagram' => 'nullable|string|url',
                'field_linkedin' => 'nullable|string|url',
            ]
        );
    }

    /**
     * @param Request $request
     * @return array
     */
    private function ValidatePassword(Request $request)
    {
        return $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
