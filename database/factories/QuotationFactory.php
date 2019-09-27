<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quotation;
use Faker\Generator as Faker;

$factory->define(Quotation::class, function (Faker $faker) {
    return [
        'project_id' => factory(App\Models\Project::class)->create()->id,
        'quotation_number' => random_int(1, 10),
        'active' => random_int(0, 1),
    ];
});
