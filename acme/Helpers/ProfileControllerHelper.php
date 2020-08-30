<?php
/**
 * Created by PhpStorm.
 * User: gerardo
 * Date: 08-30-20
 * Time: 11:22 AM
 */

namespace acme\Helpers;


use Illuminate\Http\Request;

class ProfileControllerHelper
{
    /**
     * @param Request $request
     */
    public function UpdateGeneralInfo(Request $request)
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
    public function SocialMediaUpdate(Request $request)
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