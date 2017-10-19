<?php

use Faker\Generator as Faker;

$factory->define(App\BulkListsUpload::class, function (Faker $faker) {
    return [
        //
        'bulk_list_name'  => $faker->city,
        'number_of_records' =>  rand(),
        'user_id' =>  rand(1,50),
    ];
});
