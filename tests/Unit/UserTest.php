<?php

namespace Tests\Unit;

use App\User;
use App\Profile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    use RefreshDatabase;


    /** @test */
    public function has_a_profile()
    {

        $this->withoutExceptionHandling();

        $profile = factory(Profile::class)->create();
        $user = $profile->user;

        $this->assertEquals(1, $user->profile()->count());
    }
}
