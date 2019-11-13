<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'street' => $faker->streetName,
        'street_number' => $faker->buildingNumber,
        'zipcode' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->text(10),
        'phone' => $faker->e164PhoneNumber,
        'fax' => $faker->e164PhoneNumber,
        'email' => $faker->email
    ];
});
