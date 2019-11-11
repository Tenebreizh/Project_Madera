<?php

use Illuminate\Database\Seeder;

class CoveringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Covering::class, 15)->create();
    }
}
