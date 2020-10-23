<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{

    public function show($id)
    {
        $zone = Zone::findOrFail($id);
        return response()->json($zone, 200);
    }
}
