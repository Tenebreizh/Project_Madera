<?php

use Illuminate\Database\Seeder;

class ExternalFinitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ExternalFinition::class, 15)->create();
    }
}
