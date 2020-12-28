<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description'=>$faker->word,
        'image' => $faker->imageUrl(),
        'video'=>$faker->imageUrl(),
        'price'=>$faker->numberBetween(50,345),
        'sellable'=>$faker->boolean,
        'published_at'=>$faker->dateTime(),
        'promotion'=>$faker->numberBetween(0,50),
        'quantity'=>$faker->numberBetween(0,300),
        'actual_stock'=>$faker->numberBetween(0,200),
        'reserved_stock'=>$faker->numberBetween(0,230),
        'free_stock'=>$faker->numberBetween(0,230),
        'max_stock'=>$faker->numberBetween(0,230),
        'min_stock'=>$faker->numberBetween(0,230),
        'imposto'=>$faker->numberBetween(0,230),
        'sub_category_id'=>$faker->numberBetween(0,20),
        'fornecedor_id'=>$faker->numberBetween(0,20),
    ];
});