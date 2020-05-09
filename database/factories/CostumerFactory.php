<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Costumer;
use Faker\Generator as Faker;

$factory->define(Costumer::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'data_de_nascimento' => $faker->dateTime(),
        'sexo' => $faker->randomElement(['masculino', 'feminino', 'indefinido']),
        'created_at' => $faker->dateTime()
    ];
});
