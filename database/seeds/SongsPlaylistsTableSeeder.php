<?php

use Illuminate\Database\Seeder;

class SongsPlaylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs_playlist = array(
            array('id' => '1', 'song_id' => '13', 'playlist_id' => '4', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '2', 'song_id' => '33', 'playlist_id' => '4', 'created_at' => NULL, 'updated_at' => NULL)
        );

        foreach ($songs_playlist as $item) {
            DB::table('songs_playlist')->insert([$item]);
        }
    }
}
