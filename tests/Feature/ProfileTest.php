<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
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
            'about'         => $this->faker->text
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
        //$this->withoutExceptionHandling();

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

    /** @test */
    public function the_email_is_updated()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user2edit)->put('/profile',
            $this->validFields(['email' => 'new@email.com']));

        $this->assertEquals($this->user2edit->email, 'new@email.com');
    }

    /** @test */
    public function the_name_is_updated()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user2edit)->put('/profile',
            $this->validFields(['name' => 'newName']));

        $this->assertEquals($this->user2edit->name, 'newName');
    }

    /** @test */
    public function the_phonefield_is_updated()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user2edit)->put('/profile',
            $this->validFields(['phonefield' => '504 33225566']));

        $this->assertEquals($this->user2edit->phonefield, '504 33225566');
    }

    /** @test */
    public function the_alias_is_updated()
    {
        //$this->withoutExceptionHandling();

        //dd($this->user2edit->profile);
        $response = $this->actingAs($this->user2edit)->put('/profile',
            $this->validFields(['alias' => 'new alias']));

        $this->assertEquals($this->user2edit->profile->alias, 'new alias');
    }

    /** @test */
    public function the_about_is_updated()
    {
        //$this->withoutExceptionHandling();

        //dd($this->user2edit->profile);
        $response = $this->actingAs($this->user2edit)->put('/profile',
            $this->validFields(['about' => 'text about']));

        $this->assertEquals($this->user2edit->profile->about, 'text about');
    }

    /** @test */
    public function the_field_facebook_is_url()
    {
        // el valor es cadena de texto y no url
        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'field_facebook' => 'wawasa'
        ]);

        $response->assertSessionHasErrors('field_facebook');

        // el valor es decimal y no url
        $response1 = $this->actingAs($this->user2edit)->put('/profile', [
            'field_facebook' => 1212121
        ]);

        $response1->assertSessionHasErrors('field_facebook');
    }

    /** @test */
    public function the_field_facebook_is_updated()
    {
        $this->withoutExceptionHandling();

        //dd($this->user2edit->profile);
        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'field_facebook' => 'https://www.facebook.com/profile.php?id=100042918961280'
        ]);

        $this->assertEquals($this->user2edit->profile->field_facebook, 'https://www.facebook.com/profile.php?id=100042918961280');
    }

    /** @test */
    public function the_field_twitter_is_url()
    {
        // el valor es cadena de texto y no url
        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'field_twitter' => 'wawasa'
        ]);

        $response->assertSessionHasErrors('field_twitter');

        // el valor es decimal y no url
        $response1 = $this->actingAs($this->user2edit)->put('/profile', [
            'field_twitter' => 1212121
        ]);

        $response1->assertSessionHasErrors('field_twitter');
    }

    /** @test */
    public function the_field_twitter_is_updated()
    {
        //$this->withoutExceptionHandling();

        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'field_twitter' => 'https://www.facebook.com/profile.php?id=100042918961280'
        ]);

        $this->assertEquals($this->user2edit->profile->field_twitter, 'https://www.facebook.com/profile.php?id=100042918961280');
    }

    /** @test */
    public function the_field_instagram_is_url()
    {
        // el valor es cadena de texto y no url
        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'field_instagram' => 'wawasa'
        ]);

        $response->assertSessionHasErrors('field_instagram');

        // el valor es decimal y no url
        $response1 = $this->actingAs($this->user2edit)->put('/profile', [
            'field_instagram' => 1212121
        ]);

        $response1->assertSessionHasErrors('field_instagram');
    }

    /** @test */
    public function the_field_instagram_is_updated()
    {
        //$this->withoutExceptionHandling();

        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'field_instagram' => 'https://www.facebook.com/profile.php?id=100042918961280'
        ]);

        $this->assertEquals($this->user2edit->profile->field_instagram, 'https://www.facebook.com/profile.php?id=100042918961280');
    }

    /** @test */
    public function the_field_linkedin_is_url()
    {
        // el valor es cadena de texto y no url
        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'field_linkedin' => 'wawasa'
        ]);

        $response->assertSessionHasErrors('field_linkedin');

        // el valor es decimal y no url
        $response1 = $this->actingAs($this->user2edit)->put('/profile', [
            'field_linkedin' => 1212121
        ]);

        $response1->assertSessionHasErrors('field_linkedin');
    }

    /** @test */
    public function the_field_linkedin_is_updated()
    {
        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'field_linkedin' => 'https://www.facebook.com/profile.php?id=100042918961280'
        ]);

        $this->assertEquals($this->user2edit->profile->field_linkedin, 'https://www.facebook.com/profile.php?id=100042918961280');
    }

    /** @test */
    public function password_is_updated()
    {

        $response = $this->actingAs($this->user2edit)->put('/profile', [
            'password'              => 'passwordSolid01',
            'password_confirmation' => 'passwordSolid01',
        ]);

        $hash = Hash::check('passwordSolid01', $this->user2edit->password);

        $this->assertEquals(true, $hash);
    }
}





















