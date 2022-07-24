<?php

namespace Database\Seeders;

use App\Constants\MenuGroupConstant;
use App\Services\General\MenuGroupService;
use App\Services\General\MenuService;
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
                "title" => "Academics",
                "class" => "nav-item",
                "order" => 3,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "admin.academics.grade.index",
                "group_id" => MenuGroupConstant::ADMIN_ID,
                "children" => [
                    [

                        "title" => "Grade",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.academics.grade.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.academics.grade.index',
                            'admin.academics.grade.create',
                            'admin.academics.grade.edit',
                        ],
                    ],
                    [
                        "title" => "Subject",
                        "class" => "nav-item",
                        "order" => 2,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.academics.subject.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.academics.subject.index',
                            'admin.academics.subject.create',
                            'admin.academics.subject.edit',
                        ],
                    ],
                ],
                "related_routes" => [
                    'admin.academics.grade.index',
                    'admin.academics.grade.create',
                    'admin.academics.grade.edit',
                    'admin.academics.subject.index',
                    'admin.academics.subject.create',
                    'admin.academics.subject.edit',
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
                    ],
                    [
                        "title" => "Teacher",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.user.teacher.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.user.teacher.create',
                            'admin.user.teacher.edit',
                            'admin.user.teacher.show'
                        ],
                    ],
                    [
                        "title" => "Student",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.user.student.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.user.student.create',
                            'admin.user.student.edit',
                            'admin.user.student.show'
                        ],
                    ],
                    [
                        "title" => "Moderator",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "admin.user.moderator.index",
                        "group_id" => MenuGroupConstant::ADMIN_ID,
                        "related_routes" => [
                            'admin.user.moderator.create',
                            'admin.user.moderator.edit',
                            'admin.user.moderator.show'
                        ],
                    ],
                ],
                "related_routes" => [
                    'admin.user.school.index',
                    'admin.user.school.create',
                    'admin.user.school.edit',
                    'admin.user.school.show',
                    'admin.user.teacher.index',
                    'admin.user.teacher.create',
                    'admin.user.teacher.edit',
                    'admin.user.teacher.show',
                    'admin.user.student.index',
                    'admin.user.student.create',
                    'admin.user.student.edit',
                    'admin.user.student.show',
                    'admin.user.moderator.index',
                    'admin.user.moderator.create',
                    'admin.user.moderator.edit',
                    'admin.user.moderator.show'
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
                "title" => "Users",
                "class" => "nav-item",
                "order" => 2,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "school.teacher.index",
                "group_id" => MenuGroupConstant::SCHOOL_ID,
                "children" => [
                    [
                        "title" => "Teacher",
                        "class" => "nav-item",
                        "order" => 1,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "school.teacher.index",
                        "group_id" => MenuGroupConstant::SCHOOL_ID,
                    ],
                    [
                        "title" => "Student",
                        "class" => "nav-item",
                        "order" => 2,
                        "icon" => "fa fa-envelope",
                        "is_active" => true,
                        "route" => "school.student.index",
                        "group_id" => MenuGroupConstant::SCHOOL_ID,
                        "related_routes" => [
                            'school.student.create',
                            'school.student.edit',
                            'school.student.show'
                        ],
                    ],
                ],
                "related_routes" => [
                    'school.school',
                    'school.principal',
                    'school.teacher',
                    'school.student.index',
                    'school.student.create',
                    'school.student.edit',
                    'school.student.show',
                ],
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
            [
                "title" => "Notices",
                "class" => "nav-item",
                "order" => 6,
                "icon" => "fa fa-newspaper",
                "is_active" => true,
                "route" => "school.notice.index",
                "group_id" => MenuGroupConstant::SCHOOL_ID,
                "children" => [

                ],
                "related_routes" => [
                    'school.notice.index',
                    'school.notice.create',
                    'school.notice.edit',
                    'school.notice.show',
                    'school.notice.destroy',
                ],
            ],
            [
                "title" => "Education Materials",
                "class" => "nav-item",
                "order" => 7,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "school.education_material.index",
                "group_id" => MenuGroupConstant::SCHOOL_ID,
                "children" => [

                ],
                "related_routes" => [
                    'school.education_material.index',
                    'school.education_material.create',
                    'school.education_material.edit',
                    'school.education_material.show',
                    'school.education_material.destroy',
                ],
            ],
            // Student Dashboard menus
            [
                "title" => "Dashboard",
                "class" => "nav-item",
                "order" => 1,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "student.dashboard",
                "group_id" => MenuGroupConstant::STUDENT_ID,
                "children" => [

                ],
                "related_routes" => 'student.dashboard',
            ],
            [
                "title" => "Blogs",
                "class" => "nav-item",
                "order" => 2,
                "icon" => "fa fa-newspaper",
                "is_active" => true,
                "route" => "student.blog.index",
                "group_id" => MenuGroupConstant::STUDENT_ID,
                "children" => [

                ],
                "related_routes" => [
                    'student.blog.index',
                    'student.blog.show',
                ],
            ],
            [
                "title" => "Notices",
                "class" => "nav-item",
                "order" => 3,
                "icon" => "fa fa-newspaper",
                "is_active" => true,
                "route" => "student.notice.index",
                "group_id" => MenuGroupConstant::STUDENT_ID,
                "children" => [

                ],
                "related_routes" => [
                    'student.notice.index',
                    'student.notice.show',
                ],
            ],
            [
                "title" => "Education Materials",
                "class" => "nav-item",
                "order" => 4,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "student.education-material.index",
                "group_id" => MenuGroupConstant::STUDENT_ID,
                "children" => [

                ],
                "related_routes" => [
                    'student.education-material.index',
                    'student.education-material.show',
                ],
            ],
            [
                "title" => "Discussions",
                "class" => "nav-item",
                "order" => 4,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "student.discussion.index",
                "group_id" => MenuGroupConstant::STUDENT_ID,
                "children" => [

                ],
                "related_routes" => [
                    'student.discussion.index',
                    'student.my-post.index',
                    'student.my-post.create',
                    'student.my-post.edit',
                ],
            ],
            // Teacher Dashboard

            [
                "title" => "Dashboard",
                "class" => "nav-item",
                "order" => 1,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "teacher.dashboard",
                "group_id" => MenuGroupConstant::TEACHER_ID,
                "children" => [

                ],
                "related_routes" => 'teacher.dashboard',
            ],
            [
                "title" => "Blogs",
                "class" => "nav-item",
                "order" => 2,
                "icon" => "fa fa-newspaper",
                "is_active" => true,
                "route" => "teacher.blog.index",
                "group_id" => MenuGroupConstant::TEACHER_ID,
                "children" => [

                ],
                "related_routes" => [
                    'teacher.blog.index',
                    'teacher.blog.show',
                ],
            ],
            [
                "title" => "Notices",
                "class" => "nav-item",
                "order" => 3,
                "icon" => "fa fa-newspaper",
                "is_active" => true,
                "route" => "teacher.notice.index",
                "group_id" => MenuGroupConstant::TEACHER_ID,
                "children" => [

                ],
                "related_routes" => [
                    'teacher.notice.index',
                    'teacher.notice.show',
                ],
            ],
            [
                "title" => "Education Materials",
                "class" => "nav-item",
                "order" => 4,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "teacher.education_material.index",
                "group_id" => MenuGroupConstant::TEACHER_ID,
                "children" => [

                ],
                "related_routes" => [
                    'teacher.education_material.index',
                    'teacher.education_material.create',
                    'teacher.education_material.edit',
                    'teacher.education_material.show',
                    'teacher.education_material.destroy',
                ],
            ],
            [
                "title" => "Discussions",
                "class" => "nav-item",
                "order" => 4,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "teacher.discussion.index",
                "group_id" => MenuGroupConstant::TEACHER_ID,
                "children" => [
                ],
                "related_routes" => [
                    'teacher.discussion.index',
                    'teacher.my-post.index',
                    'teacher.my-post.create',
                    'teacher.my-post.edit',
                ],
            ],
//            Moderator Menus
            [
                "title" => "Discussion",
                "class" => "nav-item",
                "order" => 2,
                "icon" => "fa fa-envelope",
                "is_active" => true,
                "route" => "moderator.discussion.pending",
                "group_id" => MenuGroupConstant::MODERATOR_ID,
                "children" => [

                ],
                "related_routes" => 'moderator.discussion.approved',
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
                'title' => MenuGroupConstant::TEACHER,
                'order' => 4,
            ],
            [
                'title' => MenuGroupConstant::STUDENT,
                'order' => 5,
            ],
            [
                'title' => MenuGroupConstant::MODERATOR,
                'order' => 6,
            ],
            [
                'title' => MenuGroupConstant::FRONT_MENU,
                'order' => 7,
            ],
            [
                'title' => MenuGroupConstant::FRONT_MOBILE_MENU,
                'order' => 8,
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
