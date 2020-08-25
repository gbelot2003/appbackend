<?php

namespace Tests\Feature;

use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImageUploadTest extends TestCase
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

        // creamos perfil de usuario Administrador
        $profiel = factory(Profile::class)->create(['user_id' => $this->admin->id]);

        // Asignamos rol de administrador
        $this->admin->assignRole('Administrator');

        // creamos un usuario suscriber para tests
        $this->user2edit = factory(User::class)->create();
        $this->user2edit->assignRole('Subscriber');
    }

    /** @test */
    public function avatar_upload()
    {
        $this->withoutExceptionHandling();

        // Usaremos el disco local
        Storage::fake('local');

        // Enviarmos el formulario actuando como administrador /images/upload
        $response = $this->actingAs($this->admin)->json('POST', '/avatar/upload', [
            'image' => UploadedFile::fake()->image('avatar.png')
        ]);

        // Necesitamos sanear los backslashes double-cuoute del response
        $redata = stripslashes(trim($response->content(), '"'));

        // Afirmamos igualdad de salida
        $this->assertEquals($this->admin->profile->avatarPath(), $redata);

        // Guardamos el Nombre de imagen
        $name = $this->admin->profile->avatar;

        // Afirmamos que el archivo se guardo
        Storage::disk('local')->assertExists("$name");

        // verificamos que la prueba muestra error
        Storage::disk('local')->assertMissing('missing.png');

    }
}
