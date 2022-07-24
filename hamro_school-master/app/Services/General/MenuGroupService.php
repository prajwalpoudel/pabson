<?php


namespace App\Services\General;

use App\Entities\MenuGroup;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuGroupService
 * @package App\Services\General
 */
class MenuGroupService extends BaseService
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
        return MenuGroup::class;
    }
}
