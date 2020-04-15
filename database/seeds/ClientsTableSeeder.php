<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $client = new Client();
        $client->name ="Oriol";
        $client->username = "client";
        $client->email = "oriolClient@1stepservice.cat";
        $client->password ="12345678";
        $client->historic_id = 1;

        
        $client->save();

        $faker = Faker::create();

        /* foreach (range(1,10) as $value) {
            \DB::table('clients')->insert(array (
                'name' => $faker->firstName,
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => \Hash::make('12345678')
            ));
        } */
    }
}
