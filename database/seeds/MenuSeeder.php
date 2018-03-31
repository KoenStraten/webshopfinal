<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'id' => 1,
            'label' => 'Home',
            'link' => '/',
            'icon' => 'gast',
            'parent_id' => 0,
            'order' => 1,
            'position' => 'left',
            'role' => null,
        ]);

        DB::table('menu')->insert([
            'id' => 2,
            'label' => 'Categorieën',
            'link' => '/../categoryoverview/',
            'icon' => null,
            'parent_id' => 0,
            'order' => 2,
            'position' => 'left',
            'role' => null,
        ]);

        DB::table('menu')->insert([
            'id' => 3,
            'label' => 'Over ons',
            'link' => '/../about/',
            'icon' => null,
            'parent_id' => 0,
            'order' => 3,
            'position' => 'left',
            'role' => null,
        ]);

        DB::table('menu')->insert([
            'id' => 4,
            'label' => 'user',
            'link' => '#',
            'icon' => null,
            'parent_id' => 0,
            'order' => 4,
            'position' => 'right',
            'role' => 'gebruiker',
        ]);

        DB::table('menu')->insert([
            'id' => 5,
            'label' => 'Inloggen',
            'link' => '/../login/',
            'icon' => null,
            'parent_id' => 0,
            'order' => 5,
            'position' => 'right',
            'role' => 'gast',
        ]);


        DB::table('menu')->insert([
            'id' => 6,
            'label' => 'Registreren',
            'link' => '/../register/',
            'icon' => null,
            'parent_id' => 0,
            'order' => 6,
            'position' => 'right',
            'role' => 'gast',
        ]);


        DB::table('menu')->insert([
            'id' => 7,
            'label' => 'Dashboard',
            'link' => '/../admin/dashboard/',
            'icon' => null,
            'parent_id' => 4,
            'order' => 4,
            'position' => 'right',
            'role' => 'admin',
        ]);

        DB::table('menu')->insert([
            'id' => 8,
            'label' => 'Mijn account',
            'link' => '/../user/',
            'icon' => null,
            'parent_id' => 4,
            'order' => 4,
            'position' => 'right',
            'role' => 'gebruiker',
        ]);

        DB::table('menu')->insert([
            'id' => 9,
            'label' => 'Aankoopgeschiedenis',
            'link' => '#',
            'icon' => null,
            'parent_id' => 4,
            'order' => 4,
            'position' => 'right',
            'role' => 'gebruiker',
        ]);

        DB::table('menu')->insert([
            'id' => 10,
            'label' => 'Winkelwagen',
            'link' => '/../shoppingcart/',
            'icon' => 'shopping-cart',
            'parent_id' => 0,
            'order' => 10,
            'position' => 'right',
            'role' => null,
        ]);

        DB::table('menu')->insert([
            'id' => 11,
            'label' => 'Uitloggen',
            'link' => '/../logout/',
            'icon' => null,
            'parent_id' => 4,
            'order' => 11,
            'position' => 'right',
            'role' => 'gebruiker',
        ]);
    }
}
