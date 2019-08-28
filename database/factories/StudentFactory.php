<?php

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->safeEmail,
        "contact" => $faker->name,
        "ssc_gpa" => $faker->name,
        "hsc_diploma_gpa" => $faker->name,
        "address" => $faker->name,
    ];
});
