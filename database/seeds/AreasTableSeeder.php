<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*         DB::table('areas')->insert(
        [
            'area_name' => 'Restaurant'
        ],
        [
            'area_name' => 'Room Service'
        ]); */

        $restaurant = new Area();
        $restaurant->area_name = 'restaurant';
        $restaurant->save();
        $roomService = new Area();
        $roomService->area_name = 'room service';
        $roomService->save();

    }
}
