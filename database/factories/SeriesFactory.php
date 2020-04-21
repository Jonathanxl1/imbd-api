<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\series;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(series::class, function (Faker $faker) {
	$rating = ['1','2','3','4','5'];
    $categories= ['Action','Adventure','Comedy','Drama','Terror','Romance','Other'];	

    return [
         	'title'=>$faker->realText($maxNbChars = 30, $indexSize = 2),
            'release'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            'category'=>Arr::random($categories),
            'rating'=>Arr::random($rating)
    ];
});
