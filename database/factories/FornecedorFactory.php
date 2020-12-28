<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fornecedor;
use Faker\Generator as Faker;

$factory->define(Fornecedor::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'contact'=>$faker->phoneNumber,
        'email'=>$faker->email
    ];
});