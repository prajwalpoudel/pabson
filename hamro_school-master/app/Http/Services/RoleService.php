<?php


namespace App\Services\General;

use App\Entities\Role;

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
