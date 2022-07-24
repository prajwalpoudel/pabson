<?php


namespace App\Http\ViewComposers\Teacher;


use App\Constants\MenuGroupConstant;
use App\Services\General\MenuService;
use Illuminate\View\View;

class TeacherMenuComposer
{
    /**
     * @var MenuService
     */
    private $menuService;

    /**
     * TeacherMenuComposer constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function compose(View $view) {
        $menus = $this->menuService->menus(MenuGroupConstant::TEACHER_ID);

        $view->with(compact('menus'));
    }
}
