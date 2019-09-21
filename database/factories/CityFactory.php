<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'country_id' => factory('App\Models\Country')->create()->id,
        'zipcode' => $faker->postcode,
        'name' => $faker->city
    ];
});
