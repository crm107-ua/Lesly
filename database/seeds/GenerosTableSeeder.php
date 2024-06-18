<?php

use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = array(
            array('id' => '1', 'name' => 'EDM', 'slug' => 'edm', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '2', 'name' => 'Rock', 'slug' => 'rock', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '3', 'name' => 'Jazz', 'slug' => 'jazz', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '4', 'name' => 'Dubstep', 'slug' => 'dubstep', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '5', 'name' => 'Techno', 'slug' => 'techno', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '6', 'name' => 'Indie Rock', 'slug' => 'indie-rock', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '7', 'name' => 'Pop', 'slug' => 'pop', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '8', 'name' => 'Hip-Hop', 'slug' => 'hip-hop', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '9', 'name' => 'Country', 'slug' => 'country', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '10', 'name' => 'Rhythm and Blues', 'slug' => 'rhythm-and-blues', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '11', 'name' => 'Clásica', 'slug' => 'clasica', 'created_at' => NULL, 'updated_at' => NULL)
        );

        foreach ($generos as $genero) {
            DB::table('generos')->insert([$genero]);
        }
    }
}
