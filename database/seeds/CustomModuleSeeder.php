<?php

use Illuminate\Database\Seeder;

class CustomModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\CustomModule::class, 150)->create();
    }
}
