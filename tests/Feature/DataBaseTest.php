<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Artisan;

class DataBaseTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Iniciamos la migración
        Artisan::call('migrate');

        // Iniciamos la población
        Artisan::call('db:seed');
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
}
