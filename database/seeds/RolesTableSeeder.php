<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Roles as Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('roles')->delete();

        $roles = [
            'Administrator',
            'Supervisor',
            'Editor',
            'Sponsor',
            'Subscriber'
        ];

        foreach ($roles as $roles) {
            Role::create(['name' => $roles]);
        }

    }
}
