<?php

namespace Tests\Unit;

use App\Profile;
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


}
