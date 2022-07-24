<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'user_id' => '2',
            'name' => 'Shree Sigana Higher Secondary School',
            'email' => Str::random(10) . '@gmail.com',
            'phone' => '1236547992',
            'description' => 'This is school description',
            'province_id' => '1',
            'district_id' => '1',
            'city_id' => '1',
            'address' => '1',
        ]);
    }
}
