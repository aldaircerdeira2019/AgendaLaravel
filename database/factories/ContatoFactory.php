<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\ContatoModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ContatoModel::class, function (Faker $faker) {
    return [
        'nome'          =>   $faker->name,
        'user_id'       =>    '1',
        'telefone'      =>   $faker->cellphoneNumber,
        'email'         =>   $faker->unique()->safeEmail,
        'data_nas'      =>   $faker->date('d-m-Y'),
        'descrição'     =>   'descrição do contato automatico',
    ];
});
