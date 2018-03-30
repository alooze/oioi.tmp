<?php

use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('forms')->delete();
        
        \DB::table('forms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Обратный звонок',
                'email_ids' => '1',
                'from' => 'info@autopark.ua',
            ),
        ));
        
        
    }
}