<?php

use Illuminate\Database\Seeder;

class InsulatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Insulator::class, 15)->create();
    }
}
