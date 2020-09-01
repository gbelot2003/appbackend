<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{

    /**
     * Listado de ciudades por país
     */
    public function list($country_id)
    {
        $cities = City::where('country_id', $country_id)->pluck('name', 'id');

        return \response()->json($cities, 200);
    }
}
