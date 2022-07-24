<?php


namespace App\Http\ViewComposers\Front;


use App\Constants\MenuGroupConstant;
use App\Services\General\MenuService;
use Illuminate\View\View;

class FrontMobileMenuComposer
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

    /**
     * @param View $view
     */
    public function compose(View $view) {
        $mobileMenus = $this->menuService->menus(MenuGroupConstant::FRONT_MOBILE_MENU_ID);

        $view->with(compact('mobileMenus'));
    }
}
