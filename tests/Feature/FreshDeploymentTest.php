<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class FreshDeploymentTest extends TestCase
{
    use DatabaseMigrations;

    public function test_migrations_can_be_rolled_back_and_run_again(): void
    {
        $this->assertTrue(Schema::hasColumns('posts', ['title', 'body']));
        $this->assertTrue(Schema::hasColumns('users', ['email_verified_at', 'remember_token']));

        $this->artisan('migrate:reset', ['--force' => true])->assertExitCode(0);

        foreach (['addresses', 'users', 'records', 'posts', 'comments', 'reminders', 'drags'] as $table) {
            $this->assertFalse(Schema::hasTable($table), $table);
        }

        $this->artisan('migrate', ['--force' => true])->assertExitCode(0);
        $this->assertTrue(Schema::hasColumns('posts', ['title', 'body']));
    }

    public function test_first_user_can_register_log_out_and_log_in(): void
    {
        $this->withoutVite();
        $this->get('/register')->assertOk();
        $this->get('/login')->assertOk();

        $this->post('/register', [
            'name' => 'First User',
            'email' => 'first@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'address1' => 'Test Building',
            'country' => 'Japan',
            'postal_code' => '1000001',
            'state' => 'Tokyo',
            'city' => 'Chiyoda',
            'street' => '1-1',
        ])->assertSessionHasNoErrors()->assertRedirect('/dashboard');

        $this->assertAuthenticated();
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseCount('addresses', 1);
        $this->get('/dashboard')->assertOk();
        $this->get('/')->assertOk();
        $this->post('/logout')->assertRedirect('/');
        $this->assertGuest();

        $this->post('/login', [
            'email' => 'first@example.com',
            'password' => 'password',
            'remember' => true,
        ])->assertSessionHasNoErrors()->assertRedirect('/dashboard');

        $this->assertAuthenticated();
    }
}
