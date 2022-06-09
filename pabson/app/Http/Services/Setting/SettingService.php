<?php


namespace App\Http\Services\Setting;


use App\Http\Services\BaseService;
use App\Models\Setting;

class SettingService extends BaseService
{
    public function model()
    {
        return Setting::class;
    }
}
