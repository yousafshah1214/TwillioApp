<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        //
        'message_body'    =>  $faker->realText($maxNbChars = 200, $indexSize = 2),
        'type'            =>  $faker->boolean($chanceOfGettingTrue = 70),
        'conversation_id' =>  rand(1,20)
    ];
});
