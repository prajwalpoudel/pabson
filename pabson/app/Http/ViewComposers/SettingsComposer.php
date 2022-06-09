<?php


namespace App\Http\ViewComposers;


use App\Constants\RoleConstant;
use App\Http\Services\Setting\SettingService;
use Illuminate\View\View;

class SettingsComposer
{
    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * SettingsComposer constructor.
     * @param SettingService $settingService
     */
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function compose(View $view) {
        $setting = $this->settingService->query()->whereHas('user', function ($query) {
            return $query->where('role_id', RoleConstant::ADMIN_ID);
        })->firstOrFail();

        $view->with(compact('setting'));
    }
}
