<?php


namespace App\Services\General;

use App\Entities\Menu;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuService
 * @package App\Services\General
 */
class MenuService extends BaseService
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
        return Menu::class;
    }

    /**
     * @param $groupId
     * @return mixed
     */
    public function menus($groupId)
    {
        return $this->model->with('children')->whereHas('group', function ($query) use ($groupId) {
            $query->where('id', $groupId);
        })->where('is_active', true)->where('parent_id', null)->get();
    }
}
