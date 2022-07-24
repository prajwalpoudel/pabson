<?php


namespace App\Http\Services\User;


use App\Entities\Moderator;
use App\Services\General\BaseService;

class ModeratorService extends BaseService
{
    public function model()
    {
        return Moderator::class;
    }
}
