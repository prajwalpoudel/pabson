<?php

namespace App\Http\Services\User;


use App\Http\Services\BaseService;
use App\Models\User;
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


