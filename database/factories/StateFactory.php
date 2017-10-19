<?php

use Faker\Generator as Faker;

$factory->define(App\State::class, function (Faker $faker) {
    return [
        //
        'state_name'    =>  $faker->state,
        'area_code'     =>  $faker->areaCode,
        'user_id'       =>  rand(1,50),
    ];
});
