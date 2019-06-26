<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Sabor;
use Faker\Generator as Faker;

$factory->define(Sabor::class, function (Faker $faker) {
    return [
        'descricao'=>$faker->name,
    ];
});
