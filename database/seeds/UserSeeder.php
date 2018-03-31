<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'adress_id' => '1',
            'name' => 'admin',
            'email' => 'admin@admin.nl',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
    }
}
