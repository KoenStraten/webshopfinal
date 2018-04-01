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
            'image' => 'https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX11047747.jpg',
            'description' => 'Bekijk de lekkerste kaasletters in diverse smaken, gemaakt van de beste melk uit de Alpen.'
        ]);

        DB::table('categories')->insert([
            'category' => 'Kaasfiguren',
            'image' => 'https://i2-prod.examiner.co.uk/incoming/article11993684.ece/ALTERNATES/s615/Portion-of-Swiss-cheese.jpg',
            'description' => 'Bekijk de lekkerste kaasfiguren in veel heerlijke smaken, gemaakt van de beste melk uit Woensel-Oost.'
        ]);
    }
}
