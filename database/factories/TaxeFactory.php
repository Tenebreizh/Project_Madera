<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Taxe;
use Faker\Generator as Faker;

$factory->define(Taxe::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(30),
        'rate' => mt_rand(0, 25) / 10,
    ];
});
