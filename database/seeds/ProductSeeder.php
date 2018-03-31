<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Kaashart',
            'price' => 14.99,
            'description' => 'Voor de liefhebbers op valentijnsdag.',
            'image' => 'https://catalogs.seacommerce.nl/versop/SD_large/large_valentijnskaas.png',
            'category' => 'Kaasfiguren',
        ]);

        DB::table('products')->insert([
            'name' => 'Kaasklomp',
            'price' => 14.99,
            'description' => 'Voor de echte oud hollanders onder ons.',
            'image' => 'https://catalogs.seacommerce.nl/versop/SD_large/large_klompkaas.png',
            'category' => 'Kaasfiguren',
        ]);

        DB::table('products')->insert([
            'name' => 'Kaas kerstboom',
            'price' => 14.99,
            'description' => 'Voor toch dat stukje kaas, tijdens de kerstdagen..',
            'image' => 'https://catalogs.seacommerce.nl/versop/SD_large/large_kerstkaas.png',
            'category' => 'Kaasfiguren',
        ]);

        DB::table('products')->insert([
            'name' => 'Kaashaas',
            'price' => 14.99,
            'description' => 'De kaas die je moet gaan zoeken net voor Pasen, want misschien is hij wel wat lekkers aan het verstoppen.',
            'image' => 'https://catalogs.seacommerce.nl/versop/SD_large/large_kaashaas_0.png',
            'category' => 'Kaasfiguren',
        ]);

        DB::table('products')->insert([
            'name' => 'Kaasletter A',
            'price' => 14.99,
            'description' => "De lekkerste 'A' ter wereld!",
            'image' => 'https://catalogs.seacommerce.nl/versop/SD_large/large_kaashaas_0.png',
            'category' => 'Kaasletters',
        ]);

        DB::table('products')->insert([
            'name' => 'Kaasletter B',
            'price' => 14.99,
            'description' => "De lekkerste 'B' ter wereld!",
            'image' => 'https://catalogs.seacommerce.nl/versop/SD_large/large_kaashaas_0.png',
            'category' => 'Kaasletters',
        ]);

        DB::table('products')->insert([
            'name' => 'Kaasletter C',
            'price' => 14.99,
            'description' => "De lekkerste 'C' ter wereld!",
            'image' => 'https://catalogs.seacommerce.nl/versop/SD_large/large_kaashaas_0.png',
            'category' => 'Kaasletters',
        ]);
    }
}
