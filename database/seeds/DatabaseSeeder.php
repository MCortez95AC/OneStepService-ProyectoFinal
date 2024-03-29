<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(WorkersTableSeeder::class);
        /* $this->call(ProductsTableSeeder::class); */
        $this->call(AreasTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(HistoricTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(categoriesTableSeeder::class);
    }
}
