<?php


namespace App\Http\Services\Location;


use App\Entities\Province;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Model;

class ProvinceService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Model|string
     */
    public function model()
    {
        return Province::class;
    }
}
