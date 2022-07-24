<?php


namespace App\Http\Services\User;


use App\Entities\School;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Model;

class SchoolService extends BaseService
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
        return School::class;
    }
}
