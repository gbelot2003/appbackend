<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
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
            'user_status'   => $this->user2edit->user_status
        ], $override);
    }


    // Nuevo registro de usuarios con numero telefonico

    // Nuevo sistema de login con numero telefonoco

    /** @test */
    public function a_user_is_created_with_phonefield_included()
    {
        $this->withoutExceptionHandling();

        // Info de formulario
        $user = [
            '_token' => csrf_token(),
            'name' => 'User Name',
            'email' => 'user@emai.com',
            'password' => 'NoTienePassword01',
            'password_confirmation' => 'NoTienePassword01',
            'phonefield' => '4480-4255',
            'country_code' => '+504'
        ];

        $response = $this->post('/register', $user)
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', ['email' => 'user@emai.com']);
    }

    /** @test */
    public function user_index_is_ok_and_display_a_list_of_users()
    {
        // Creamos un usuario para login
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/users');
        $response->assertStatus(403);

        //Solo administradores pueden ver usuarios
        $user->assignRole('Administrator');

        // hacemos request a la pagina users
        $response = $this->actingAs($user)->get('/users');

        // La pagina esta en 200 y titulo es visible
        $response->assertStatus(200)->assertSeeText('Users');

        // Ingresamos a /users y el datatable muestra la informacion que buscamos
        $this->actingAs($user)
            ->getJson(route('users.index'), ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            // See the users' results as expected
            ->assertSeeText(htmlspecialchars($user->name, ENT_QUOTES))
            ->assertSeeText($user->phonefield);
    }

    /** @test */
    public function only_administrators_can_see_edit_users()
    {
        $this->withoutExceptionHandling();

        // Creamos al admin
        $user = factory(User::class)->create();

        // Creamos al usuaro a ver
        $user2see = factory(User::class)->create();

        // Damos permisos de administrador
        $user->assignRole('Administrator');

        // Abrimos con permisos
        $response = $this->actingAs($user)
            ->get('/users/' . $user2see->id . '/edit')
            ->assertStatus(200)
            ->assertSee($user2see->name);
    }

    /** @test */
    public function need_a_name_to_update()
    {
        $u2edit = factory(User::class)->create();

        $responce = $this->actingAs($this->admin)
            ->put('/users/' . $u2edit->id, $this->validFields(['name' => null]));

        $responce->assertSessionHasErrors('name');
    }

    /** @test */
    public function need_a_email_to_update()
    {
        $u2edit = factory(User::class)->create();

        $responce = $this->actingAs($this->admin)
            ->put('/users/' . $u2edit->id, $this->validFields(['email' => null]));

        $responce->assertSessionHasErrors('email');
    }

    /** @test */
    public function need_a_phone_to_update()
    {
        $u2edit = factory(User::class)->create();

        $responce = $this->actingAs($this->admin)
            ->put('/users/' . $u2edit->id, $this->validFields(['phonefield' => null]));

        $responce->assertSessionHasErrors('phonefield');
    }

    /** @test */
    public function an_admin_can_change_state_of_user()
    {
        // El usuario esta desactivado
        $u2edit = factory(User::class)->create(['user_status' => 'false']);

        $responce = $this->actingAs($this->admin)
            ->put('/users/' . $u2edit->id, $this->validFields(['user_status' => true]));

        // luego del update, el usuario esta activado
        $this->assertEquals($u2edit->user_status, true);
    }
}
