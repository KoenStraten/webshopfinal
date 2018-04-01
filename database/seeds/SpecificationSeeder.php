<?php

use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //grootte
        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 1,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 2,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 3,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 4,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 5,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 7,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 8,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 9,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Grootte',
            'answer' => 'L',
            'product_id' => 10,
        ]);

        // gewicht
        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.5 kg',
            'product_id' => 1,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.6 kg',
            'product_id' => 2,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.3 kg',
            'product_id' => 3,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.1 kg',
            'product_id' => 4,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.01 kg',
            'product_id' => 5,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '5 kg',
            'product_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.1 kg',
            'product_id' => 7,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.9 kg',
            'product_id' => 8,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.5 kg',
            'product_id' => 9,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Gewicht',
            'answer' => '0.3 kg',
            'product_id' => 10,
        ]);

        // soort
        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Kaas',
            'product_id' => 1,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Kaas',
            'product_id' => 2,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Kaas',
            'product_id' => 3,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Kunststof',
            'product_id' => 4,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Leer',
            'product_id' => 5,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Hard plastic',
            'product_id' => 6,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Kaas',
            'product_id' => 7,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Kaas',
            'product_id' => 8,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Kaas',
            'product_id' => 9,
        ]);

        DB::table('specifications')->insert([
            'type' => 'Soort',
            'answer' => 'Kaas',
            'product_id' => 10,
        ]);
    }
}
