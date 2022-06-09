<?php


namespace App\Http\Services\Location;


use App\Http\Services\BaseService;
use App\Models\Province;
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
