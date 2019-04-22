<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ClassRoom;

use Faker\Generator as Faker;

$factory->define(ClassRoom::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 50), 
        'free' => $faker->randomElement([false,true])
    ];
});
