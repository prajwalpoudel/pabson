<?php

namespace Database\Seeders;

use App\Constants\MenuGroupConstant;
use App\Http\Services\MenuGroupService;
use App\Http\Services\MenuService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * MenuGroupService constructor.
     */
    private $menuGroupService;
    /**
     * MenuService constructor.
     */
    private $menuService;

    /**
     * MenuTableSeeder constructor.
     *
     * @param MenuGroupService $menuGroupService
     * @param MenuService $menuService
     */
    public function __construct(
        MenuGroupService $menuGroupService,
        MenuService $menuService
    )
    {
        $this->menuGroupService = $menuGroupService;
        $this->menuService = $menuService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $menus = [
            // Admin dashboard menus
            [
                "title" => "Dashboard",
                "class" => "nav-item",
                "order" => 1,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "admin.dashboard",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [

                ],
                "related_routes" => 'admin.dashboard',
            ],
            [
                "title" => "Email Template",
                "class" => "nav-item",
                "order" => 2,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "admin.email-template.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [

                ],
                "related_routes" => [
                    'admin.email-template.index',
                    'admin.email-template.create',
                    'admin.email-template.edit',
                    'admin.email-template.destroy',
                ],
            ],
            [
                "title" => "Locations",
                "class" => "nav-item",
                "order" => 4,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "admin.province.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [
                    [

                        "title" => "Province",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.province.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.province.index',
                            'admin.province.create',
                            'admin.province.edit',
                        ],
                    ],
                    [
                        "title" => "District",
                        "class" => "nav-item",
                        "order" => 2,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.district.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                    ],
                    [
                        "title" => "Municipality",
                        "class" => "nav-item",
                        "order" => 3,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.municipality.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                    ],
                ],
                "related_routes" => [
                    'admin.province.index',
                    'admin.province.create',
                    'admin.province.edit',
                    'admin.district.index',
                    'admin.district.create',
                    'admin.district.edit',
                    'admin.municipality.index',
                    'admin.municipality.create',
                    'admin.municipality.edit',
                ],
            ],
            [
                "title" => "Users",
                "class" => "nav-item",
                "order" => 5,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "admin.user.school",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [
                    [

                        "title" => "School",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.user.school.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.user.school.create',
                            'admin.user.school.edit',
                            'admin.user.school.show'
                        ],
                    ]
                ],
                "related_routes" => [
                    'admin.user.school.index',
                    'admin.user.school.create',
                    'admin.user.school.edit',
                    'admin.user.school.show',
                ],
            ],
            [
                "title" => "Settings",
                "class" => "nav-item",
                "order" => 4,
                "icon" => "fa fa-cogs",
                "is_active" => true,
                "route" => "admin.setting.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [

                ],
                "related_routes" => [
                    'admin.setting.index',
                    'admin.setting.edit',
                ],
            ],
            // School Dashboard menus
            [
                "title" => "Dashboard",
                "class" => "nav-item",
                "order" => 1,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "school.dashboard",
                "group_id" => MenuGroupConstant::SCHOOL_ID,
                "children" => [

                ],
                "related_routes" => 'school.dashboard',
            ],
            [
                "title" => "School Description",
                "class" => "nav-item",
                "order" => 3,
                "icon" => "fa fa-newspaper",
                "is_active" => true,
                "route" => "school.description.index",
                "group_id" => MenuGroupConstant::SCHOOL_ID,
                "children" => [

                ],
                "related_routes" => [
                    'school.description.index',
                    'school.description.create',
                    'school.description.edit',
                    'school.description.destroy',
                    'school.description.show',
                ],
            ],
            [
                "title" => "Principal Message",
                "class" => "nav-item",
                "order" => 4,
                "icon" => "fa fa-newspaper",
                "is_active" => true,
                "route" => "school.principal_message.index",
                "group_id" => MenuGroupConstant::SCHOOL_ID,
                "children" => [

                ],
                "related_routes" => [
                    'school.principal_message.index',
                    'school.principal_message.create',
                    'school.principal_message.edit',
                    'school.principal_message.destroy',
                    'school.principal_message.show',
                ],
            ],
            [
                "title" => "Blogs",
                "class" => "nav-item",
                "order" => 5,
                "icon" => "fa fa-newspaper",
                "is_active" => true,
                "route" => "school.blog.index",
                "group_id" => MenuGroupConstant::SCHOOL_ID,
                "children" => [

                ],
                "related_routes" => [
                    'school.blog.index',
                    'school.blog.create',
                    'school.blog.edit',
                    'school.blog.destroy',
                    'school.blog.show',
                ],
            ],
//            Front Menus
            [
                "title" => "Home",
                "class" => "nav-item",
                "order" => 1,
                "icon" => "",
                "is_active" => true,
                "route" => "home",
                "group_id" => MenuGroupConstant::FRONT_MENU_ID,
                "children" => [

                ],
                "related_routes" => 'home',
            ],
            [
                "title" => "School",
                "class" => "nav-item",
                "order" => 2,
                "icon" => "",
                "is_active" => true,
                "route" => "school",
                "group_id" => MenuGroupConstant::FRONT_MENU_ID,
                "children" => [

                ],
                "related_routes" => 'school',
            ],
        ];

        $groups = [
            [
                'title' => MenuGroupConstant::ADMIN,
                'order' => 1,
            ],
            [
                'title' => MenuGroupConstant::SCHOOL,
                'order' => 2,
            ],
            [
                'title' => MenuGroupConstant::PRINCIPAL,
                'order' => 3,
            ],
            [
                'title' => MenuGroupConstant::FRONT_MENU,
                'order' => 4,
            ],
            [
                'title' => MenuGroupConstant::FRONT_MOBILE_MENU,
                'order' => 5,
            ],
        ];

        foreach ($groups as $group) {
            $this->menuGroupService->updateOrCreate(['title' => $group['title']], $group);
        }
        $this->menuService->truncate();

        foreach ($menus as $menu) {
            $childrenMenus = $menu['children'];
            unset($menu['children']);
            if (!empty($menu['related_routes']) && is_array($menu['related_routes'])) {
                $menu['related_routes'] = implode(',', array_map('trim', $menu['related_routes']));
            }
            $parentMenu = $this->menuService->create($menu);
            foreach ($childrenMenus as $childrenMenu) {
                if (!empty($childrenMenu['related_routes']) && is_array($childrenMenu['related_routes'])) {
                    $childrenMenu['related_routes'] = implode(',', array_map('trim', $childrenMenu['related_routes']));
                }
                $childrenMenu['parent_id'] = $parentMenu->id;
                $this->menuService->updateOrCreate($childrenMenu, $childrenMenu);
            }
        }
    }

}
