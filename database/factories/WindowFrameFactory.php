<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\WindowFrame;
use Faker\Generator as Faker;

$factory->define(WindowFrame::class, function (Faker $faker) {
    return [
        'label' => $faker->text(10),
        'description' => $faker->text(20),
        'reference' => strtoupper ($faker->text(20)),
    ];
});
