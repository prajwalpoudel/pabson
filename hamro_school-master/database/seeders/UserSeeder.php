<?php

namespace Database\Seeders;

use App\Entities\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private const  TOTAL_DATA = 50;


    public function run()
    {
        /* make sure seeder not to run in production*/
        if (app()->environment() === 'production') {
            exit('You should not run seed in production environment'.PHP_EOL);
        }
        factory(User::class, self::TOTAL_DATA)->create();
    }
}
