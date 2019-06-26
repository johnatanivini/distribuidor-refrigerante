<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Marca;
use Faker\Generator as Faker;

$factory->define(Marca::class, function (Faker $faker) {
    return [
        'descricao'=>$faker->name,
    ];
});
