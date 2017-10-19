<?php

use Illuminate\Database\Seeder;

class PhoneListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\PhoneList::class, 20)->create();
    }
}
