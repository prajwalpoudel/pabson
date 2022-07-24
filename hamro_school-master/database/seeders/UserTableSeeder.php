<?php

namespace Database\Seeders;

use App\Constants\RoleConstant;
use App\Http\Services\UserService;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserTableSeeder constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "first_name" => "Admin",
                "last_name" => "LastName",
                "email" => "admin@admin.com",
                'phone' => '9862078434',
                'address' => 'Biratnagar',
                "password" => bcrypt('password'),
                "role_id" => RoleConstant::ADMIN_ID,
            ],
//            [
//                "first_name" => "Sujan",
//                "last_name" => "Khadka",
//                "email" => "aa@aa.com",
//                'phone' => '1234567890',
//                'address' => 'Baglung',
//                "password" => bcrypt('password'),
//                "role_id" => RoleConstant::SCHOOL_ID,
//            ]
        ];
        foreach ($users as $user) {
            $this->userService->updateOrCreate(['email' => $user['email']], $user);
        }
//        $numberOfUser = 10;
//        factory(User::class, $numberOfUser)->create();
    }
}
