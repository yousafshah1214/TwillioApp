<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(TemplatesTableSeeder::class);
        $this->call(BulkListsUploadTableSeeder::class);
        $this->call(PhoneListTableSeeder::class);
        $this->call(ConversationsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
    }
}
