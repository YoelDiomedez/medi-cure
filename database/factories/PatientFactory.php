<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'surnames'       => $faker->lastName,
        'names'          => $faker->randomElement([$faker->firstNameMale, $faker->firstNameFemale]),
        'birthdate'      => $faker->date,
        'gender'         => $faker->randomElement(['M', 'F']),
        'marital_status' => $faker->randomElement(['S', 'C', 'V', 'D']),
        'document_type'  => $faker->randomElement(['DNI', 'RUC', 'P. NAC.', 'CARNET EXT.', 'PASAPORTE', 'OTRO']),
        'document_numb'  => $faker->unique()->ean8,
        'allergies'      => $faker->randomElement([null, $faker->sentence]),
        'vaccines'       => $faker->randomElement([null, 1, 0]),
        'cellphone_num'  => $faker->randomElement([null, $faker->tollFreePhoneNumber]),
        'address'        => $faker->randomElement([null, $faker->streetAddress]),
        'email'          => $faker->randomElement([null, $faker->unique()->safeEmail]),
        'profession'     => $faker->randomElement([null, $faker->jobTitle]),
        'relative'       => $faker->randomElement([null, $faker->name])
    ];
});
