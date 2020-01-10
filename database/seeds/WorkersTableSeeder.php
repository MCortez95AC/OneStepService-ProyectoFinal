<?php

use Illuminate\Database\Seeder;
use App\Role;
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
        $worker = new Worker();
        $worker->name = 'Mike';
        $worker->username = "worker";
        $worker->email = 'worker@1stepservice.es';
        $worker->password = bcrypt('12345678');
        $worker->is_admin =true;
        $worker->save();
    }
}
