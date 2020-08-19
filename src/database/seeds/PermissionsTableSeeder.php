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
            'ver_usuarios', 'crear_usuarios', 'editar_usuarios', 'suspender_usuarios',
            'ver_roles', 'crear_roles', 'editar_roles', 'suspender_roles',
            'ver_settings', 'ver_perfil_propio', 'editar_perfil_propio', 'editar_perfil_otros',
            'ver_perfil_otros' ,'ver_audits'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::findByName('Administrator');
        $role->givePermissionTo($permissions);
    }
}
