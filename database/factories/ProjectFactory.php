<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'client_id' => factory(App\Models\Client::class)->create()->id,
        'user_id' => factory(App\User::class)->create()->id,
        'state_id' => factory(App\Models\State::class)->create()->id,
        'name' => $faker->word,
        'description' => $faker->text(10),
        'reference' => $faker->text(15),
    ];
});
