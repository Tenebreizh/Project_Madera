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
        $this->call(UserTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ComponentSeeder::class);
        $this->call(TaxeSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ActionSeeder::class);
        $this->call(LogSeeder::class);
        // $this->call(StateSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ExternalFinitionSeeder::class);
    }
}
