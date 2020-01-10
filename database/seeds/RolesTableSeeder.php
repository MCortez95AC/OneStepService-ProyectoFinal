<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\Role;
use App\User;
use App\Worker;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name="superAdmin";
        $role->description='sudo';
        $role->save();

        $role = new Role();
        $role->name="adminRestaunrant";
        $role->description='admins restaurant';
        $role->save();

        $role = new Role();
        $role->name="adminRoomService";
        $role->description='admins Room Service';
        $role->save();

        $role = new Role();
        $role->name="user";
        $role->description='client';
        $role->save();
    }
}
