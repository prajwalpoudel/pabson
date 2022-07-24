<?php


namespace App\Http\Services\Location;


use App\Entities\District;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Model;

class DistrictService extends BaseService
{
    /**
     * @return Model|string
     */
    public function model()
    {
        return District::class;
    }
}
