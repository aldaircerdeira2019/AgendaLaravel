<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\ContatoModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ContatoModel::class, function (Faker $faker) {
    return [
        'nome'          =>   $faker->name,
        'telefone'      =>   $faker->phoneNumber,
        'email'         =>   $faker->unique()->safeEmail,
        'data_n'        =>   $faker->date('Y-m-d'),
        'descrição'     =>   'descrição do contato automatico',
    ];
});
