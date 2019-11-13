<?php

use Illuminate\Database\Seeder;

class QuotationLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\QuotationLine::class, 200)->create();
    }
}
