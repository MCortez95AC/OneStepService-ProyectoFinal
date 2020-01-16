<?php

use Illuminate\Database\Seeder;
use App\user;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Miguel';
        $user->username = "super";
        $user->email = 'ejemplo@1stepservice.es';
        $user->password = bcrypt('12345678');
        $user->save();

    }
}
