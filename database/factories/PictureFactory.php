<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Picture::class, function (Faker $faker) {
    return [
        'title' =>  $faker->name,
        'user' => $faker->name,
        'description' => $faker->text($maxNbChars = 10),
    ];
});
