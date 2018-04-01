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

        DB::table('users')->insert([
            'adress_id' => '1',
            'name' => 'Koen',
            'email' => 'koen@straten.nl',
            'password' => bcrypt('ab12345'),
            'role' => 'gebruiker'
        ]);

        DB::table('users')->insert([
            'adress_id' => '1',
            'name' => 'Tom',
            'email' => 'Tom@verkuijlen.nl',
            'password' => bcrypt('ab12345'),
            'role' => 'gebruiker'
        ]);
    }
}
