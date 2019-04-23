<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'title' =>  $faker->text($maxNbChars = 50), 
        'active' => $faker->randomElement([false,true]), 
        'subject_id' => Subject::all()->random()->id 
    ];
});
