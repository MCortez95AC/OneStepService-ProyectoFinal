<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,78) as $value) {
            \DB::table('rooms')->insert(array (
                'room_number' => $value,
                'available' => $faker->numberBetween(0, 1)
            ));
        }
    }
}
