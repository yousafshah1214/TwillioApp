<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        //
        'body' => $faker->realText(),
        'message_id'    => rand(1,300),
        'conversation_id'   => rand (1,20)
    ];
});
