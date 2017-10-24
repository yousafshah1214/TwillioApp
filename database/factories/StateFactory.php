<?php

use Faker\Generator as Faker;

$factory->define(App\State::class, function (Faker $faker) {
    return [
        //
        'state_name'    =>  $faker->state,
        'state_code'    =>  $faker->stateAbbr,
        'area_code'     =>  $faker->areaCode,
        'country'       =>  $faker->country,
        'user_id'       =>  rand(1,50),
    ];
});
