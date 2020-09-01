<?php

namespace Tests\Unit;

use App\Profile;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function belongs_to_a_user()
    {
        // creamos registro de perfil
        $profile = factory(Profile::class)->create();

        // Probamos que la relacion existe
        $this->assertEquals(1, $profile->user()->count());
    }

    /** @test */
    public function has_a_avatars_path()
    {
        // Nombre de archivo en db
        $name = "avatar.png";

        // Creamos el usuarios
        $user = factory(User::class)->create();

        // Relacionamos perfil al usuario
        $profile = factory(Profile::class)->create(
            ['avatar' => $name, 'user_id' => $user->id]
        );

        // La cadena que buscamos
        $path = "/storage/app/$name";

        // Aseguramos que la cadena es igual a la salida del modelo
        $this->assertEquals($user->profile->avatarPath(), $path);
    }
}
