<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Log;
use Faker\Generator as Faker;

$factory->define(Log::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\Models\User::class)->create(),
        'action_id' => factory(App\Models\Action::class)->create(),
        'name' => $faker->text(10),
        'description' => $faker->text(30),
        'table' => $faker->text(15)
    ];
});
