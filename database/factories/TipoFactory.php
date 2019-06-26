<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tipo;
use Faker\Generator as Faker;

$factory->define(Tipo::class, function (Faker $faker) {
    return [
        'descricao'=>$faker->name,
    ];
});
