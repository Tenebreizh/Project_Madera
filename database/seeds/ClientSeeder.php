<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Client', 5)->create();

        factory('App\Models\Client')->create([
            'firstname' => 'Client',
            'lastname' => 'Test',
        ]);
    }
}
