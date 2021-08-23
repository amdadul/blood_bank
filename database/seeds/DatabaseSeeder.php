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
        $this->call(LookupsTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(PoliceStationTableSeeder::class);
        $this->call(PostOfficeTableSeeder::class);
        $this->call(UnionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
