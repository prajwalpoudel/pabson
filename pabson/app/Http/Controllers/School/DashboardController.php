<?php

namespace App\Http\Controllers\School;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\User\StudentService;
use App\Http\Services\User\TeacherService;
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
    public function __construct(
        UserService $userService,
    )
    {
        $this->userService = $userService;
    }

    public function index() {
        return view('school.dashboard.index');
    }
}
