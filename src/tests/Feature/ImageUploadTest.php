<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImageUploadTest extends TestCase
{
    use RefreshDatabase, WithFaker;

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
        $this->admin->assignRole('Administrator');

        // creamos un usuario suscriber para tests
        $this->user2edit = factory(User::class)->create();
        $this->user2edit->assignRole('Subscriber');
    }

    /** @test */
    public function image_upload()
    {
        $this->withoutExceptionHandling();

        Storage::fake('local');

        $response = $this->actingAs($this->admin)->json('POST', '/images/upload', [
            'image' => UploadedFile::fake()->image('avatar.png')
        ]);

        // Assert the file was stored...
        Storage::disk('local')->assertExists('public/avatar.png');

        // Assert a file does not exist...
        Storage::disk('local')->assertMissing('missing.png');
    }
}
