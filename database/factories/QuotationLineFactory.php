<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\QuotationLine;
use Faker\Generator as Faker;

$factory->define(QuotationLine::class, function (Faker $faker) {
    return [
        'custom_module_id' => factory(App\Models\CustomModule::class)->create()->id,
        'quotation_id' => factory(App\Models\Quotation::class)->create()->id,
        'taxe_id' => factory(App\Models\Taxe::class)->create()->id,
        'name' => $faker->text(10),
        'description' => $faker->text(20),
        'price' => $faker->randomFloat(2, 0, 10000),
        'quantity' => $faker->randomFloat(2, 0, 10)
    ];
});
