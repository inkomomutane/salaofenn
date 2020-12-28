<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'sub_category_id'=>$faker->numberBetween(0,20),
        'description'=>$faker->text(200),
        'image'=>$faker->imageUrl(),
        'video'=>$faker->imageUrl(),
        'price'=>$faker->numberBetween(300,400),
        'promotion'=>$faker->numberBetween(1,60),
        'published_at'=>$faker->dateTime()
    ];
});