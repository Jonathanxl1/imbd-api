<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\directors;
use Faker\Generator as Faker;


$factory->define(directors::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name
    ];
});
