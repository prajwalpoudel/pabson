<?php


namespace App\Http\ViewComposers\Front;


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

    /**
     * @param View $view
     */
    public function compose(View $view) {
        $setting = $this->settingService->query()->firstOrFail();

        $view->with(compact('setting'));
    }
}
