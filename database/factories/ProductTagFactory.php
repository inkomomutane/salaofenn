<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductTag;
use Faker\Generator as Faker;

$factory->define(ProductTag::class, function (Faker $faker) {
    return [
         'product_id'=>$faker->numberBetween(1,20),
        'tag_id'=>$faker->numberBetween(1,20)
    ];
});