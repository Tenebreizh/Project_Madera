<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Component;
use Faker\Generator as Faker;

$factory->define(Component::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(30),
        'component_type_id' => factory(App\Models\ComponentType::class)->create()->id
    ];
});
