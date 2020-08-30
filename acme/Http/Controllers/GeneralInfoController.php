<?php
/**
 * Created by PhpStorm.
 * User: gerardo
 * Date: 08-30-20
 * Time: 08:42 AM
 */

namespace acme\Http\Controllers;


use Illuminate\Http\Client\Request;

class GeneralInfoController
{

    public function update(Request $request)
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

        $user = auth()->user()->update($request->only(['name', 'email', 'phonefield']));
        $user->profile->update($request->only(['alias', 'about']));

        return $user;
    }
}