<?php


namespace App\Http\Services\Location;


use App\Http\Services\BaseService;
use App\Models\Municipality;

class MunicipalityService extends BaseService
{
    public function model()
    {
        return Municipality::class;
    }
}
