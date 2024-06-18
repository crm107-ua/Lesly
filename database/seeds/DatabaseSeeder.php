<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountrySeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(UsersFollowUsersTableSeeder::class);
        $this->call(PlaylistsTableSeeder::class);
        $this->call(SongsTableSeeder::class);
        $this->call(SongsPlaylistsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(UsersFollowPlaylistsTableSeeder::class);
    }
}
