<?php


namespace App\Http\Services\Grade;


use App\Entities\Subject;
use App\Services\General\BaseService;

class SubjectService extends BaseService
{
    public function model()
    {
        return Subject::class;
    }

}
