<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Covering;
use Faker\Generator as Faker;

$factory->define(Covering::class, function (Faker $faker) {
    return [
        'label' => $faker->text(10),
        'description' => $faker->text(20),
        'reference' => strtoupper ($faker->text(20)),
    ];
});
