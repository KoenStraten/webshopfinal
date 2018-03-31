<?php

use Illuminate\Database\Seeder;

class CheesetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cheese_types')->insert([
            'type' => 'jong',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'jong belegen',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'belegen',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'extra belegen',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'fenegriek',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'komijn',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'jong belegen komijn',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'belegen komijn',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'daslook',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'kummel-komijn',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'mosterd',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'pesto',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'herbes de provence',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'honingklaver',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'italiaanse melange',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'brandnetelmelange',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'specerijenmelange',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'pepermelange',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'knoflook en ui',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'sambal',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'schellachmix',
        ]);

        DB::table('cheese_types')->insert([
            'type' => 'oud',
        ]);
    }
}
