<?php

namespace App\Http\Controllers;

use Acme\Http\Controllers\RolesEditController;
use App\Permissions;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
    public function __construct()
    {
        // Definimos permisos de ingreso
        $this->middleware(['role:Administrator']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //TODO: Listado con busqueda de usuarios o un
        // datatable
        $roles = Roles::all();
        $title = 'Roles & Permissions';
        return View('roles.index', compact('roles', 'title'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Roles::findOrFail($id);

        if (request()->ajax()) {
            $table = new RolesEditController();
            return $table->RolesEditDataTable($role);
        }

        $title = $role->name;
        $perms = Permissions::pluck('name', 'id');
        return View('roles.edit', compact('role', 'title', 'perms'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $role = Roles::findOrFail($id);
        $permissions = $request->get('permissions');
        $role->syncPermissions($permissions);
        flash('The Rol has been updated!!');
        return response()->redirectTo('/roles');
    }


}
