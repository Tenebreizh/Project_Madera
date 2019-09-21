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
        $this->call(ComponentSeeder::class);
        $this->call(TaxeSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ClientSeeder::class);
    }
}
