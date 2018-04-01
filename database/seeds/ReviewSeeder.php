<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'title' => 'Heerlijk!',
            'rating' => 5,
            'text' => 'Was erg lekker, ik koop er meteen 10',
            'user_id' => 2,
            'product_id' => 1,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Erg lekker',
            'rating' => 4,
            'text' => 'Een kaas met lekkere bite',
            'user_id' => 3,
            'product_id' => 2,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Matig',
            'rating' => 1,
            'text' => 'Niet heel erg lekker',
            'user_id' => 2,
            'product_id' => 3,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Niet zo heerlijk!',
            'rating' => 2,
            'text' => 'Was niet lekker, ik koop er meteen -10',
            'user_id' => 3,
            'product_id' => 4,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Kaas',
            'rating' => 5,
            'text' => 'Was erg lekker, ik koop er meteen 10',
            'user_id' => 2,
            'product_id' => 5,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Duur',
            'rating' => 3,
            'text' => 'Een kaas met lekkere bite',
            'user_id' => 3,
            'product_id' => 6,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Vies',
            'rating' => 4,
            'text' => 'Was erg lekker, ik koop er meteen 10',
            'user_id' => 2,
            'product_id' => 7,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Schittermagisch',
            'rating' => 2,
            'text' => 'Was niet lekker, ik koop er meteen -10',
            'user_id' => 3,
            'product_id' => 8,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Apartste chocoladeletter ooit',
            'rating' => 4,
            'text' => 'Het smaakte naar kaas',
            'user_id' => 2,
            'product_id' => 9,

        ]);

        DB::table('reviews')->insert([
            'title' => 'Nee',
            'rating' => 2,
            'text' => 'Nooit meer',
            'user_id' => 3,
            'product_id' => 10,

        ]);
    }
}
