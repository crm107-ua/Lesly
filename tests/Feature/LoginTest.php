<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = [
            'name' => "prueba",
            'username' => "prueba",
            'email' => "prueba@gmail.es",
            'password' => Hash::make("prueba@gmail.es"),
            'slug' => strtolower("prueba"),
            'artist' => 0,
            'pais_id' => 210,
        ];

        $this->post('/register', $user);

        $response = $this->post(
            '/login',
            [
                'email' => 'prueba@gmail.es',
                'password' => 'prueba@gmail.es'
            ]
        );

        $response->assertRedirect('/');
    }
}
