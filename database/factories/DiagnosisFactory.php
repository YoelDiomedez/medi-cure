<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Diagnosis;
use Faker\Generator as Faker;

$factory->define(Diagnosis::class, function (Faker $faker) {
    return [
        'code'    => $faker->numerify('A##-D##'),
        'disease' => $faker->sentence(6)
    ];
});
