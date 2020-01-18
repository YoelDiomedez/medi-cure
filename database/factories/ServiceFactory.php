<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'concept' => $faker->bs,
        'amount'  => $faker->randomFloat(2, 1, 8000)
    ];
});
