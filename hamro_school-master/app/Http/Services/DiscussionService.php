<?php


namespace App\Http\Services;


use App\Entities\Discussion;
use App\Services\General\BaseService;

class DiscussionService extends BaseService
{
    public function model()
    {
        return Discussion::class;
    }
}
