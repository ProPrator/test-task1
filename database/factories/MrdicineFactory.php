<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medicine;
use Faker\Generator as Faker;

$factory->define(Medicine::class, function (Faker $faker) {

    $name = $faker->word();
    $time = $faker->dateTimeBetween('-2 month', '-1 month');

    return [
        'name'       => $name,
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
