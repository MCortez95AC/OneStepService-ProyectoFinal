<?php

use Illuminate\Database\Seeder;

class categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        ['name' => "Menu",'description' => "Food dishes"],
        ['name' => "Drinks",'description' => "Drinks withouth alcohol"],
        ['name' => "Wines",'description' => "Local and exported wines"],
        ['name' => "Snacks",'description' => "Food with sugar"],
        ['name' => "Desserts",'description' => "cakes"]
        ];
        \DB::table('categories')->insert($categories);
    }
}
