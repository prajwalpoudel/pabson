<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(EmailTemplateTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(DiscussionTableSeeder::class);
//        $this->call(SchoolTableSeeder::class);

//        $this->call(UserSeeder::class);


    }
}
