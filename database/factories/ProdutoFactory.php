<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Produto;
use App\User;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'tipo_id'=>function(){
        return factory(App\Tipo::class)->create()->id;
        },
        'sabor_id'=>function(){
        return factory(App\Sabor::class)->create()->id;
        },
        'marca_id'=>function(){
        return factory(App\Marca::class)->create()->id;
        },
        'quantidade'=>$faker->buildingNumber,
        'valor'=>$faker->numberBetween(0.0,99.9),
        'litragem_id'=>function(){
        return factory(App\Litragem::class)->create()->id;
        },
    ];
});
