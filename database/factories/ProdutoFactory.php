<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Produto;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text,
        'Valor' => $faker->randomNumber(2),
        'Quantidade' => $faker->randomNumber(2),
       
    ];
});
