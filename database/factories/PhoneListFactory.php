<?php

use Faker\Generator as Faker;

$factory->define(App\PhoneList::class, function (Faker $faker) {
    return [
        //
        'first_name'    =>  $faker->firstName,
        'last_name'     =>  $faker->lastName,
        'address'       =>  $faker->address,
        'phone_number'  =>  $faker->phoneNumber,
        'state_id'      =>  rand(1,20),
        'bulk_lists_upload_id' => rand(1,500),
    ];
});
