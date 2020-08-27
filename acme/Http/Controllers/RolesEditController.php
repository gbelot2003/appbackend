<?php

namespace Acme\Http\Controllers;

use App\User;
use Yajra\DataTables\Facades\DataTables;

class RolesEditController {

    /**
     * @param $role
     * @return mixed
     */
    public function RolesEditDataTable($role)
    {
        $users = User::whereHas('roles', function ($q) use ($role) {
            $q->whereIn('name', [$role->name]);
        })->get();

        return dataTables::of($users)
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->format('d/m/Y');
            })
            ->editColumn('name', function ($user) {
                return "<a href='#' class='btn btn-primary'>" . $user->name . "</a>";
            })
            ->rawColumns(['name'])
            ->make(true);
    }
}