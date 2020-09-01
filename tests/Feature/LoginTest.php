<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function welcome_page_is_redirect_to_show_login()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function show_page_login()
    {
        $response = $this->get('/login');

        $response->assertSeeText('Welcome Back!');
    }
}
