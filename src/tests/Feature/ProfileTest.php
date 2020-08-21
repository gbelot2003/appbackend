<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $users;

    private $admin;

    private $user2edit;

    protected function setUp(): void
    {
        parent::setUp();

        // Reseteamos base de datos
        \Artisan::call('migrate', ['-vvv' => true]);
        \Artisan::call('db:seed', ['-vvv' => true]);

        // Creamos una lista de usuarios
        $this->users = factory(User::class, 20)->create();

        $this->admin = factory(User::class)->create();
        $this->admin->assignRole('Administrator');

        // creamos un usuario para editar
        $this->user2edit = factory(User::class)->create();
        $this->user2edit->assignRole('Subscriber');
    }

    /** @test */
    public function only_auth_users_have_access_to_profile()
    {

        $res1 = $this->actingAs($this->user2edit)->get('/profile');
        $res1->assertStatus(200);


        // EL admin tiene autorizacion
        $responce = $this->actingAs($this->admin)->get('/profile');
        $responce->assertStatus(200);
    }


}





















