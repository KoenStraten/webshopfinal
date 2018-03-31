<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CheesetypeSeeder::class);
        $this->call(UserroleSeeder::class);
        $this->call(AdressSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);

    }
}
