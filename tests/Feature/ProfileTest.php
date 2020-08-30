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

        // creamos un administrador para test
        $this->admin = factory(User::class)->create();
        // Si el usuario no tiene profile da error
        $profile = factory(\App\Profile::class)
            ->create(['user_id' => $this->admin->id])->toArray();
        $this->admin->assignRole('Administrator');

        // creamos un usuario suscriber para tests
        $this->user2edit = factory(User::class)->create();
        $profile = factory(\App\Profile::class)
            ->create(['user_id' => $this->user2edit->id])->toArray();
        $this->user2edit->assignRole('Subscriber');
    }

    /**
     * Funcion de sobreescritura de valores para
     * probar validaciones
     * @return array
     */
    protected function validFields($override = [])
    {
        return array_merge([
            'name'          => $this->user2edit->name,
            'email'         => $this->user2edit->email,
            'phonefield'    => $this->user2edit->phonefield,
            'alias'         => $this->faker->name,
        ], $override);
    }


    /** @test */
    public function only_auth_users_have_access_to_profile()
    {

        // Sin autenticación no puedes ver perfil
        $this->get('/profile')
        ->assertStatus(302);

        // Un usuario comun tiene acceso a perfil
        $res1 = $this->actingAs($this->user2edit)->get('/profile');
        $res1->assertStatus(200);

        // EL admin tiene autorizacion
        $responce = $this->actingAs($this->admin)->get('/profile');
        $responce->assertStatus(200);

    }

    /** @test */
    public function only_auth_users_have_access_to_edit_profile()
    {
        //$this->withoutExceptionHandling();

        // Sin autenticación no puedes ver perfil
        $this->get('profile/edit')
            ->assertRedirect('login');

        // Un usuario comun tiene acceso a perfil
        $res1 = $this->actingAs($this->user2edit)->get('profile/edit');
        $res1->assertStatus(200);

        // EL admin tiene autorizacion
        $responce = $this->actingAs($this->admin)->get('/profile/edit');
        $responce->assertStatus(200);

    }

    /**
     * Seccion de formulario de datos generales
     * validaciones
     * Pendientes Pais y Ciudades
     */

    /** @test */
    public function datos_generales_need_a_name()
    {
        $response = $this->actingAs($this->user2edit)->put('/profile',
                $this->validFields(['name' => '']));

        $response->assertSessionHasErrors('name');

    }

    /** @test */
    public function datos_generales_need_a_email()
    {
        $response = $this->actingAs($this->user2edit)->put('/profile',
            $this->validFields(['email' => '']));

        $response->assertSessionHasErrors('email');

    }

    /** @test */
    public function datos_generales_need_a_phonefield()
    {
        $response = $this->actingAs($this->user2edit)->put('/profile',
            $this->validFields(['phonefield' => '']));

        $response->assertSessionHasErrors('phonefield');

    }

    /** @test */
    public function alias_must_be_a_string()
    {
        $response = $this->actingAs($this->user2edit)->put('/profile',
            $this->validFields(['alias' => 1234]));

        $response->assertSessionHasErrors('alias');
    }



}





















