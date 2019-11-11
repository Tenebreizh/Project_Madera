<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ComponentType;
use Faker\Generator as Faker;

$factory->define(ComponentType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(30),
    ];
});
