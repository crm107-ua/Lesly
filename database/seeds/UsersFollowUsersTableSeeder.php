<?php

use Illuminate\Database\Seeder;

class UsersFollowUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_follow = array(
            array('id' => '4', 'user' => '22', 'friend' => '8', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '6', 'user' => '3', 'friend' => '22', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '7', 'user' => '22', 'friend' => '3', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '8', 'user' => '22', 'friend' => '7', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '9', 'user' => '22', 'friend' => '11', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '10', 'user' => '22', 'friend' => '28', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '11', 'user' => '3', 'friend' => '7', 'created_at' => NULL, 'updated_at' => NULL)
        );

        foreach ($users_follow as $user) {
            DB::table('users_follow')->insert([$user]);
        }
    }
}
