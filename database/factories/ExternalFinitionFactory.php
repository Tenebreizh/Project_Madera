<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ExternalFinition;
use Faker\Generator as Faker;

$factory->define(ExternalFinition::class, function (Faker $faker) {
    return [
        'label' => $faker->text(10),
        'description' => $faker->text(20),
        'reference' => strtoupper ($faker->text(20)),
    ];
});
