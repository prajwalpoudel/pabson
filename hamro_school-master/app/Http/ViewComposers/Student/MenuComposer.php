<?php


namespace App\Http\ViewComposers\Student;


use App\Constants\MenuGroupConstant;
use App\Services\General\MenuService;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * @var MenuService
     */
    private $menuService;

    /**
     * MenuComposer constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @param View $view
     */
    public function compose(View $view) {
        $menus = $this->menuService->menus(MenuGroupConstant::STUDENT_ID);

        $view->with(compact('menus'));
    }

}
