<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ProfileUser;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRegister()
    {
        $payload = [
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'date_of_birth' => '1990-01-01',
            'first_name' => 'John',
            'last_name' => 'Joe',
            'sur_name' => 'Smith'
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'user' => [
                    'id', 'email', 'date_of_birth', 'first_name', 'last_name', 'sur_name'
                ],
                'token'
            ]);
        $this->assertDatabaseHas('profile_users', [
            'email' => 'test@example.com'
        ]);
    }

    public function testLogin()
    {
        $user = ProfileUser::factory()->create([
            'email'  => 'test@example.com',
            'password'  => Hash::make('password123')
        ]);

        $payload = [
            'email' => 'test@example.com',
            'password' => 'password123'
        ];

        $response = $this->postJson('/api/auth/login', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'token'
            ]);
    }
}
