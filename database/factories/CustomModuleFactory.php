<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CustomModule;
use Faker\Generator as Faker;

$factory->define(CustomModule::class, function (Faker $faker) {
    return [
        'module_id' => factory(App\Models\Module::class)->create()->id,
        'label' => $faker->text(20),
        'description' => $faker->text(20),
        'specification' => $faker->text(50),
        'price' => $faker->randomFloat(2, 0, 10000),
        'commercial_marge' => $faker->randomFloat(2, 0, 1)
    ];
});
