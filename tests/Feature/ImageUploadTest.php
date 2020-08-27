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

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Reseteamos base de datos
        \Artisan::call('migrate', ['-vvv' => true]);
        \Artisan::call('db:seed', ['-vvv' => true]);

        // creamos un usuario para test
        $this->user = factory(User::class)->create();

        // creamos perfil de usuario
        $profiel = factory(Profile::class)->create(['user_id' => $this->user->id]);

        // Asignamos rol de Subscriber
        $this->user->assignRole('Subscriber');
    }

    /** @test */
    public function avatar_upload()
    {
        $this->withoutExceptionHandling();

        // Usaremos el disco local
        Storage::fake('local');

        // Enviarmos el formulario actuando como administrador /images/upload
        $response = $this->actingAs($this->user)->json('POST', '/avatar/upload', [
            'image' => UploadedFile::fake()->image('avatar.png')
        ]);

        // Guardamos el Nombre de imagen
        $name = $this->user->profile->avatar;

        // Afirmamos que el archivo se guardo
        Storage::disk('local')->assertExists("$name");

        // verificamos que la prueba muestra error
        Storage::disk('local')->assertMissing('missing.png');
    }

    /** @test */
    public function response_with_image_path()
    {
        $this->withoutExceptionHandling();

        // Usaremos el disco local
        Storage::fake('local');

        // Enviarmos el formulario actuando como administrador /images/upload
        $response = $this->actingAs($this->user)->json('POST', '/avatar/upload', [
            'image' => UploadedFile::fake()->image('avatar.png')
        ]);

        // Necesitamos sanear los backslashes double-cuoute del response
        $redata = stripslashes(trim($response->content(), '"'));

        // Afirmamos igualdad de salida
        $this->assertEquals($this->user->profile->avatarPath(), $redata);

    }
}
