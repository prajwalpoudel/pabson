<?php


namespace App\Http\Services;


use App\Entities\User;
use App\Services\General\BaseService;

class UserService extends BaseService
{
    public function model()
    {
        return User::class;
    }
}
