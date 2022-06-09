<?php


namespace App\Http\Services;

use App\Models\Role;

/**
 * Class RoleService
 * @package App\Services\General
 */
class RoleService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Role::class;
    }
}
