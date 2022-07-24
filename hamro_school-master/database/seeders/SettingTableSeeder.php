<?php

namespace Database\Seeders;

use App\Http\Services\Setting\SettingService;
use App\Http\Services\UserService;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * @var SettingService
     */
    private $settingService;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * SettingTableSeeder constructor.
     * @param SettingService $settingService
     * @param UserService $userService
     */
    public function __construct(
        SettingService $settingService,
        UserService $userService
    )
    {
        $this->settingService = $settingService;
        $this->userService = $userService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'user_id' => $this->userService->findBy(['role_id' => \App\Constants\RoleConstant::ADMIN_ID])->id,
                'name' => 'Hamro School',
                'email' => 'hamro.school@gmail.com',
                'address' => 'Biratnagar-1, Pokhariya',
                'phone' => '9862078434'
            ]
        ];

        foreach ($settings as $setting) {
            $this->settingService->updateOrCreate(['user_id' => $setting['user_id']], $setting);
        }
    }
}
