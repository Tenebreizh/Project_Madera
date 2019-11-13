<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Range;
use Faker\Generator as Faker;

$factory->define(Range::class, function (Faker $faker) {
    return [
        'covering_id' => factory(App\Models\Covering::class)->create(),
        'insulator_id' => factory(App\Models\Insulator::class)->create(),
        'external_finition_id' => factory(App\Models\ExternalFinition::class)->create(),
        'window_frame_id' => factory(App\Models\WindowFrame::class)->create(),
        'label' => $faker->text(10),
        'description' => $faker->text(20),
        'reference' => strtoupper ($faker->text(20)),
        'rule' => $faker->text()
    ];
});
