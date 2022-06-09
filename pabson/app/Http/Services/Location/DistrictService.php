<?php


namespace App\Http\Services\Location;


use App\Http\Services\BaseService;
use App\Models\District;
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
