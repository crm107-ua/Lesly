<?php

use Illuminate\Database\Seeder;

class UsersFollowPlaylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_follow_playlist = array(
            array('id' => '1', 'user_id' => '9', 'playlist_id' => '4', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '2', 'user_id' => '6', 'playlist_id' => '4', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '3', 'user_id' => '15', 'playlist_id' => '4', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '4', 'user_id' => '7', 'playlist_id' => '4', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '6', 'user_id' => '22', 'playlist_id' => '5', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '7', 'user_id' => '3', 'playlist_id' => '4', 'created_at' => NULL, 'updated_at' => NULL)
        );

        foreach ($user_follow_playlist as $item) {
            DB::table('user_follow_playlist')->insert([$item]);
        }
    }
}
