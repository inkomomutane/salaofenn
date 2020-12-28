<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServiceTag;
use Faker\Generator as Faker;

$factory->define(ServiceTag::class, function (Faker $faker) {
    return [
        'service_id'=>$faker->numberBetween(1,20),
        'tag_id'=>$faker->numberBetween(1,20)
    ];
});