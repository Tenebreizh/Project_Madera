<?php

use Illuminate\Database\Seeder;

class WindowFrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\WindowFrame::class, 15)->create();
    }
}
