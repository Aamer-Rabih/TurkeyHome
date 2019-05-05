<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 50), 
        'downloable' => $faker->randomElement([false,true]),
        'class_id' => ClassRoom::all()->random()->id
    ];
});
