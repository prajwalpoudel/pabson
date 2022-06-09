<?php

namespace App\Http\Controllers\Admin;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * DashboardController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() {
        $schoolActiveCount = $this->userService->query()->where(['role_id' => RoleConstant::SCHOOL_ID, 'is_verified' => true])->count();
        $schoolInActiveCount = $this->userService->query()->where(['role_id' => RoleConstant::SCHOOL_ID, 'is_verified' => false])->count();
        $schoolData = [
            [
                'status' => 'InActive',
                'numbers' => $schoolInActiveCount,
                "color" => "#520F1B"

            ],
            [
                'status' => 'Active',
                'numbers' => $schoolActiveCount,
                "color" => "#18651B"
            ]
        ];

        return view('admin.dashboard.index', compact('schoolData'));
    }
}
