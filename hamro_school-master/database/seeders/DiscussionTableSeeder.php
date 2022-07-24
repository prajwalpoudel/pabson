<?php

namespace Database\Seeders;

use App\Entities\Discussion;
use Illuminate\Database\Seeder;

class DiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private const  TOTAL_DATA = 6;


    public function run()
    {
        factory(Discussion::class)->count(self::TOTAL_DATA)->create();
    }
}
