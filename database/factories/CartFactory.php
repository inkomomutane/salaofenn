<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,2),
        'quantity'=>$faker->numberBetween(0,13),
        'price'=> $faker->numberBetween(1,299),
        'status_id'=>$faker->numberBetween(1,6),
        'user_id'=>$faker->numberBetween(1,2),
        'descount'=>$faker->numberBetween(1,300),
        'payment_id'=>$faker->numberBetween(1,5)
    ];
});