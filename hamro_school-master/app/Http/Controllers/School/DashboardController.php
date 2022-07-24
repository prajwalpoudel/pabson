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
     * @var TeacherService
     */
    private $teacherService;
    /**
     * @var StudentService
     */
    private $studentService;

    /**
     * DashboardController constructor.
     * @param UserService $userService
     * @param TeacherService $teacherService
     * @param StudentService $studentService
     */
    public function __construct(
        UserService $userService,
        TeacherService $teacherService,
        StudentService $studentService
    )
    {
        $this->userService = $userService;
        $this->teacherService = $teacherService;
        $this->studentService = $studentService;
    }

    public function index() {
        $teacherData = [];
        $studentData = [];

        $teacherActiveCount = $this->teacherService->query()->whereHas('user', function ($query) {
            return $query->where('is_verified', true);
        })->whereHas('schools', function ($query) {
            return $query->where('schools.id', frontUser('id'));
        })->count();
        $teacherInActiveCount = $this->teacherService->query()->whereHas('user', function ($query) {
            return $query->where('is_verified', false);
        })->whereHas('schools', function ($query) {
            return $query->where('schools.id', frontUser('id'));
        })->count();

        $studentActiveCount = $this->studentService->query()->whereHas('user', function ($query) {
            return $query->where('is_verified', true);
        })->where('school_id',  frontUser('id'))->count();
        $studentInActiveCount = $this->studentService->query()->whereHas('user', function ($query) {
            return $query->where('is_verified', false);
        })->where('school_id',  frontUser('id'))->count();

        if(($teacherActiveCount+$teacherInActiveCount) > 0) {
            $teacherData = [
                [
                    'status' => 'InActive',
                    'numbers' => $teacherInActiveCount,
                    "color" => "#520F1B"

                ],
                [
                    'status' => 'Active',
                    'numbers' => $teacherActiveCount,
                    "color" => "#18651B"
                ]
            ];
        }


        if(($studentActiveCount+$studentInActiveCount) > 0) {
            $studentData = [
                [
                    'status' => 'InActive',
                    'numbers' => $studentInActiveCount,
                    "color" => "#520F1B"

                ],
                [
                    'status' => 'Active',
                    'numbers' => $studentActiveCount,
                    "color" => "#18651B"
                ]
            ];
        }

        return view('school.dashboard.index', compact('teacherData', 'studentData'));
    }
}
