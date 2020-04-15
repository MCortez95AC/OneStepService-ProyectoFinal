<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\support\Str;
use App\Worker;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = array('Restaurant', 'Room Service');
        $faker = Faker::create();
        
        foreach (range(1,10) as $value) {
            \DB::table('workers')->insert(array (
                'name' => $faker->firstName,
                'dni' => Str::random(9).$faker->numberBetween(1, 29),
                'area' => $areas[array_rand($areas,1)],
                'email' => $faker->unique()->email,
                'is_admin' => false
            ));
        }
        
        //Super Admin
        
        $worker = new Worker();
        $worker->name = 'Mike';
        $worker->dni = '643397089X';
        $worker->area = 'Restaurant';
        $worker->username = "worker";
        $worker->email = 'worker@1stepservice.es';
        $worker->password = bcrypt('12345678');
        $worker->is_admin =true;
        $worker->save();

        $client = new Worker();
        $client->name = 'Oriol';
        $client->dni = '643367089X';
        $client->area = 'cliente';
        $client->username = "client";
        $client->email = 'client@1stepservice.es';
        $client->password = bcrypt('12345678');
        $client->is_admin =true;
        $client->save();
    }
}
