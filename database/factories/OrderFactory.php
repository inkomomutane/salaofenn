<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'client_name'=>$faker->name,
        'product_or_service_name'=>$faker->name,
        'quantity'=>$faker->numberBetween(1,10),
        'total_price'=>$faker->numberBetween(80,438),
        'start_at'=>$faker->dateTime(),
        'end_at'=>$faker->dateTime(),
        'maded_by'=>$faker->name,
        'status_id'=>$faker->numberBetween(1,40),
        'user_id'=>$faker->numberBetween(1,30),
        'payment_id'=>$faker->numberBetween(1,40)  
    ];
});