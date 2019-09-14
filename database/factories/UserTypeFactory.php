<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserType;
use Faker\Generator as Faker;

$factory->define(UserType::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'description' => $faker->text(20)
    ];
});
