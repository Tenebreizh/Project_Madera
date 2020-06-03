<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Log;
use Faker\Generator as Faker;

$factory->define(Log::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create(),
        'action_id' => mt_rand(1, 4),
        'name' => $faker->text(10),
        'description' => $faker->text(30),
        'table' => $faker->text(15)
    ];
});
