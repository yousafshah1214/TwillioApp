<?php

use Faker\Generator as Faker;

$factory->define(App\Template::class, function (Faker $faker) {
    return [
        //
        'template_name'   =>  $faker->username,
        'template_body'   =>  $faker->realText($maxchar = 200, $indexSize = 2),
        'user_id'         =>  rand(1,50),
    ];
});
