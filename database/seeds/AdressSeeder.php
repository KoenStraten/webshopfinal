<?php

use Illuminate\Database\Seeder;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adresses')->insert([
            'city' => 'AdminCity',
            'zipcode' => '6969AD',
            'streetname' => 'Admin Avenue',
            'housenumber' => '69'
        ]);
    }
}
