<?php

use Illuminate\Database\Seeder;
use App\Historic;

class HistoricTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime();
        $historic = new Historic();
        $historic->entry_date = $date;
        $historic->room_id = 1;
        $historic->save();
    }
}
