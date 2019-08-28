<?php

$factory->define(App\Course::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
