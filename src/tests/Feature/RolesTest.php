<?php

namespace Tests\Feature;

use App\Roles;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolesTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Reseteamos base de datos
        \Artisan::call('migrate', ['-vvv' => true]);
        \Artisan::call('db:seed', ['-vvv' => true]);

        // Creamos un usuario administrador;
        $this->admin = factory(User::class)->create();
        $this->admin->assignRole('Administrator');

    }

    /** @test */
    public function only_admin_users_can_access_roles_page()
    {

        // Un usuario guess no puede ver roles
        $guess = $this->get('/roles')
            ->assertStatus(302);

        // Un usuario normal
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/roles')
            ->assertStatus(403);

        //Solo administradores pueden ver roles
        $this->actingAs($this->admin)->get('/roles')
            ->assertStatus(200);
    }

    /** @test */
    public function it_show_a_list_of_roles()
    {
        $role = Roles::find(1);

        $this->actingAs($this->admin)->get('/roles')
            ->assertStatus(200)
            ->assertSeeText($role->name);
    }
}
