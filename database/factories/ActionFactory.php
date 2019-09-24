<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Action;
use Faker\Generator as Faker;

$factory->define(Action::class, function (Faker $faker) {
    return [
        'label' => $faker->text(10),
        'description' => $faker->text(20)
    ];
});
