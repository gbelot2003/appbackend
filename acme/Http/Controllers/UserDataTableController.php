<?php

namespace Acme\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as dataTables;

class UserDataTableController {

    /**
     * @return mixed
     */
    public function UsersDataTable()
    {
        $build = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'users.phonefield',
                'users.updated_at', 'users.user_status', 'roles.name as rname')
            ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'model_has_roles.role_id', 'roles.id');

        return dataTables::of($build)
            ->addColumn('actions', function ($name) {
                return '
            <a class="" href="users/' . $name->id . '"><i class="fas fa-eye"></i> Watch</a> | 
            <a class="" href="users/' . $name->id . '/edit"><i class="fas fa-edit"></i> Edit</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}