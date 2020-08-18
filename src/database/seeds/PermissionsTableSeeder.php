<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Permissions as Permission;
use App\Roles as Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_permissions')->delete();
        DB::table('permissions')->delete();

        $permissions = [
            // Permisos de administrador
            'ver usuarios', 'crear usuarios', 'editar usuarios', 'suspender usuarios',
            'ver roles', 'crear roles', 'editar roles', 'suspender roles',
            'ver settings', 'ver propio perfil', 'editar pefil propio', 'editar pefil otros',
            'ver perfil otros' ,'ver audits'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::findByName('Administrator');
        $role->givePermissionTo($permissions);
    }
}
