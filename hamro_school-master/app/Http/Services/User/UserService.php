<?php

namespace App\Http\Services\User;


use App\Entities\User;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Model;

class UserService extends BaseService
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
        return User::class;
    }
}


