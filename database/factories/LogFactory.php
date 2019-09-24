<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Log;
use Faker\Generator as Faker;

$factory->define(Log::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 4),
        'action_id' => random_int(1, 10),
        'name' => $faker->text(10),
        'description' => $faker->text(30),
        'table' => $faker->text(15)
    ];
});
