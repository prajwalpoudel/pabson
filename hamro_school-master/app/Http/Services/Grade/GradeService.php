<?php


namespace App\Http\Services\Grade;


use App\Entities\Grade;
use App\Services\General\BaseService;

class GradeService extends BaseService
{
    public function model()
    {
        return Grade::class;
    }
}
