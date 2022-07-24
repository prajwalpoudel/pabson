<?php


namespace App\Http\Services\Setting;


use App\Entities\Setting;
use App\Services\General\BaseService;

class SettingService extends BaseService
{
    public function model()
    {
        return Setting::class;
    }
}
