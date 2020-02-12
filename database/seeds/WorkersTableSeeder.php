<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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
        $faker = Faker::create();
        
        foreach (range(1,20) as $value) {
            \DB::table('workers')->insert(array (
                'name' => $faker->firstName,
                'username' => $faker->unique()->userName,
                'email' => $faker->unique()->email,
                'password' => \Hash::make('12345678'),
                'is_admin' => false
            ));
        }
        
        //Super Admin
        
        $worker = new Worker();
        $worker->name = 'Mike';
        $worker->username = "worker";
        $worker->email = 'worker@1stepservice.es';
        $worker->password = bcrypt('12345678');
        $worker->is_admin =true;
        $worker->save();
    }
}
