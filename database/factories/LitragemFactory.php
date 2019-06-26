<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Litragem;
use Faker\Generator as Faker;

$factory->define(Litragem::class, function (Faker $faker) {
    return [
        'descricao'=>$faker->name,
    ];
});
