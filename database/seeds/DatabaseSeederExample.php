<?php

use Illuminate\Database\Seeder;

class DatabaseSeederExample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(FormsTableSeeder::class);
    }
}
