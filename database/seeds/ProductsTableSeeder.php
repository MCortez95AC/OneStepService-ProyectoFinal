<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use FakerRestaurant\Restaurant;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        $width=320;
        $height=240;

        foreach (range(1,5) as $value) {
            \DB::table('products')->insert(array (
                'area_id' => $faker->numberBetween(1, 2),
                'name' => $faker->unique()->foodName(),
                'price' => $faker->randomFloat(2, 0, 50),
                'description' => $faker->text($mxNbChars = 100),
                'category' => 'Others',
                'image' => $faker->imageUrl($width, $height, 'food', true, 'Faker', true)
            ));
        }
    }
}


