<?php

namespace Tests\Feature;

use App\Roles;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuditTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        // no nos olvidemos del setup
        parent::setUp();

        // Reseteamos base de datos
        \Artisan::call('migrate', ['-vvv' => true]);
        \Artisan::call('db:seed', ['-vvv' => true]);
    }

    public function a_guess_users_cant_reach_audit_page()
    {
        // simulamos un guess en audit
        $this->get('/audits')
            ->assertStatus(403);
    }

    /** @test */
    public function a_user_with_not_permissions_cant_reach_audit_index()
    {
        $user = factory(User::class)->create();

        // simulamos un get a audit
        $this->actingAs($user)->get('/audits')
            ->assertStatus(403);
    }

    /** @test */
    public function an_administrator_user_can_access_audit()
    {
        $user = factory(User::class)->create();
        $user->assignRole('Administrator');

        // simulamos un get a audit
        $this->actingAs($user)->get('/audits')
            ->assertStatus(200);
    }

    /** @test */
    public function a_supervisor_user_can_access_audit()
    {
        $user = factory(User::class)->create();
        $user->assignRole('Supervisor');

        // simulamos un get a audit
        $this->actingAs($user)->get('/audits')
            ->assertStatus(200);
    }
}
