<?php

use Illuminate\Database\Seeder;

class PlaylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playlists = array(
            array('id' => '4', 'user_id' => '22', 'name' => 'Marlon', 'slug' => 'marlon', 'image' => 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/adrian-roma-marlon-4-1560848662.jpg?crop=1.00xw:0.667xh;0,0.0702xh&resize=480:*', 'description' => 'Hola como estas mi bella rosa
          Cada día luces más hermosa
          Sabes una cosa mi preciosa
          Es una bendición que seas mi esposa
          Son tantas cosas las que yo quiero decir
          Por ejemplo lo que siento yo al verte sonreír.', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '5', 'user_id' => '3', 'name' => 'Raining in Osaka', 'slug' => 'raining-in-osaka', 'image' => 'https://cdn.cheapoguides.com/wp-content/uploads/sites/3/2019/01/Alley-Osaka-Rain.jpg', 'description' => 'RAINING IN OSAKA (Lofi HipHop). 0.00 | 19:11. Previous track Play or pause track Next track. Enjoy the full SoundCloud experience with our free app.', 'created_at' => NULL, 'updated_at' => NULL)
        );

        foreach ($playlists as $playlist) {
            DB::table('playlist')->insert([$playlist]);
        }
    }
}
