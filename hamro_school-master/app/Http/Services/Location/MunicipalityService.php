<?php


namespace App\Http\Services\Location;


use App\Entities\City;
use App\Entities\Municipality;
use App\Services\General\BaseService;

class MunicipalityService extends BaseService
{
    public function model()
    {
        return Municipality::class;
    }
}
