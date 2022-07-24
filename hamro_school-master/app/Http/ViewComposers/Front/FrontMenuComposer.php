<?php


namespace App\Http\ViewComposers\Front;


use App\Constants\MenuGroupConstant;
use App\Services\General\MenuService;
use Illuminate\View\View;

class FrontMenuComposer
{
    /**
     * @var MenuService
     */
    private $menuService;

    /**
     * FrontMenuComposer constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function compose(View $view) {
        $menus = $this->menuService->menus(MenuGroupConstant::FRONT_MENU_ID);

        $view->with(compact('menus'));
    }
}
