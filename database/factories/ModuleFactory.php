<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        'range_id' => factory(App\Models\Range::class)->create()->id,
        'name' => $faker->name(),
        'description' => $faker->text(20),
        'principal_cut' => $faker->text(30),
        'cctp' => $faker->text(64),
        'marge' => $faker->randomFloat(2, 0, 1),
        'labor_time' => $faker->time(),
        'price' => $faker->randomFloat(2, 0, 10000),
        'marge_enterprise' => $faker->randomFloat(2, 0, 1)
    ];
});
