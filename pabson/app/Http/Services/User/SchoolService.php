<?php


namespace App\Http\Services\User;


use App\Http\Services\BaseService;
use App\Models\School;
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
