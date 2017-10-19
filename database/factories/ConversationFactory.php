<?php

use Faker\Generator as Faker;

$factory->define(App\Conversation::class, function (Faker $faker) {
    return [
        //
        'user_id'         =>  rand(1,50),
        'phone_list_id'   =>  rand(1,20)  
    ];
});
