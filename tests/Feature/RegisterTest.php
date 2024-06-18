<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
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

        $response = $this->post('/register', $user);

        $response->assertRedirect('/');
    }
}
