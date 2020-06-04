<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\State')->create([
            'label' => 'Open'
        ]);

        factory('App\Models\State')->create([
            'label' => 'Waiting'
        ]);

        factory('App\Models\State')->create([
            'label' => 'Close'
        ]);
    }
}
