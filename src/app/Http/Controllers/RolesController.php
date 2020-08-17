<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        // Definimos permisos de ingreso
        $this->middleware('auth');
        $this->middleware(['role:Administrator|Supervisor']);
    }


    public function index()
    {
        $roles = Roles::all();
        return View('roles.index', compact('roles'));
    }
}
