<?php

use Illuminate\Database\Seeder;

class BulkListsUploadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\BulkListsUpload::class,500)->create();
    }
}
