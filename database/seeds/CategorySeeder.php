<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'Kaasletters',
            'image' => '/images/kaaslettercategorie.jpg',
            'description' => 'Bekijk de lekkerste kaasletters in diverse smaken, gemaakt van de beste melk uit de Alpen.'
        ]);

        DB::table('categories')->insert([
            'category' => 'Kaasfiguren',
            'image' => '/images/kaasfiguurcategorie.jpg',
            'description' => 'Bekijk de lekkerste kaasfiguren in veel heerlijke smaken, gemaakt van de beste melk uit Woensel-Oost.'
        ]);
    }
}
