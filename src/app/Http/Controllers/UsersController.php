<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Acme\Http\Controllers\UserDataTableController;

class UsersController extends Controller
{

    public function __construct()
    {
        // Definimos permisos de ingreso
        $this->middleware('auth');
        $this->middleware(['role:Administrator|Supervisor']);
    }

    public function index(Request $request)
    {

        // Desplegamos lista de Datatable
        if($request->ajax()){
            $table = new UserDataTableController();
            return $table->UsersDataTable();
        }

        //Definimos titulo de la sección;
        $title = 'Usuarios';

        return View('users.index', compact('title'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $title = $user->name;
        $roles = Roles::all();
        return view('users.edit', compact('user', 'title', 'roles'));
    }


    public function update($id, Request $request)
    {

        $user = User::findOrFail($id);

        $request = $this->PasswordRecongnition($request);

        // Necesitamos el valor de User Status
        if (!$request->has('user_status')){
            $request['user_status'] = 0;
        } else {
            $request['user_status'] = 1;
        }

        $user->update($request->validate(
            [
                'name'          => 'required|string|max:255',
                'email'         => 'required|email|unique:users,email,'.$user->id,
                'phonefield'    => 'required',
                'user_status'   => 'required'
            ]
        ));

        $user->syncRoles($request->get('role_id'));

        return redirect()->to('/users');
    }

    /**
     * @param Request $request
     * @return Request
     */
    private function PasswordRecongnition(Request $request)
    {
        if ($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password_confirmation']);
        else:
            unset($request['password']);
            unset($request['password_confirmation']);
        endif;
        return $request;
    }

}
