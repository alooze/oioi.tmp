<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$646OkHfiAOPNCqGMq7vxZufy3ntQCHm0.aOAgDIQ6nNko9fzEz4/y',
                'remember_token' => 'RY6Ts4jr2q2Bixg7HNHYKptwxbqwWasX07J0WgFMDWvAiTeDoqHwv59EI4SD',
                'role' => 'admin',
                'created_at' => NULL,
                'updated_at' => '2016-12-05 14:41:22',
            ),
        ));


    }
}
