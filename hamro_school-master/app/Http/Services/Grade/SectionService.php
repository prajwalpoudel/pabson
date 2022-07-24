<?php


namespace App\Http\Services\Grade;


use App\Entities\Section;
use App\Services\General\BaseService;

class SectionService extends BaseService
{
    public function model()
    {
        return Section::class;
    }

}
