<?php

namespace App\Http\Controllers\School\User;

use App\Constants\RoleConstant;
use App\Entities\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\StudentRequest;
use App\Http\Services\Grade\GradeService;
use App\Http\Services\Grade\SectionService;
use App\Http\Services\User\StudentService;
use App\Http\Services\User\UserService;
use App\Jobs\SendEmail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;


    /**
     * @var StudentService
     */
    private $studentService;

    /**
     * @var SectionService
     */
    private $sectionService;

    /**
     * @var GradeService
     */
    private $gradeService;

    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * @var string
     */
    private $student = 'school.user.student.';

    /**
     * PrincipalController constructor.
     *
     * @param UserService $userService
     * @param StudentService $studentService
     * @param SectionService $sectionService
     * @param GradeService $gradeService
     * @param DataTables $dataTable
     */
    public function __construct(
        UserService $userService,
        StudentService $studentService,
        SectionService $sectionService,
        GradeService $gradeService,
        DataTables $dataTable
    )
    {
        $this->userService = $userService;
        $this->studentService = $studentService;
        $this->sectionService = $sectionService;
        $this->gradeService = $gradeService;
        $this->dataTable = $dataTable;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->student . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $grades = $this->gradeService->all()->pluck('display_name', 'id');

        return view($this->student . 'create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentRequest $request
     * @return RedirectResponse
     */
    public function store(StudentRequest $request)
    {

        $password = $request->input('user.password');
        $userData = array_merge(
            $request->input('user'),
            [
                'password' => bcrypt($password),
                'role_id' => RoleConstant::STUDENT_ID,
                'is_verified' => true
            ]
        );
        if($profile = $request->file('user.profile')) {
            $userData = $this->saveProfile($profile, $userData);
        }

        $studentData = array_merge(
            $request->except(['user', '_token']),
            [
                'school_id' => frontUser('id')
            ]
        );

        DB::beginTransaction();
        $user = $this->userService->create($userData);
        $user->student()->create($studentData);
        $email = $user->email ?? adminUser('email');;
        $this->dispatch(new SendEmail($user, 'user_registered', [
            'variables' => [
                'user_name' => $user->full_name,
                'email' => $email,
                'password' => $password
            ]
        ]));
        DB::commit();

        return redirect()->route('school.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit(int $id)
    {
        $student = $this->studentService->findOrFail($id)->load('user');
        $grades = $this->gradeService->all()->pluck('display_name', 'id');

        return view($this->student . 'edit', compact(['student', 'grades']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentRequest $request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(StudentRequest $request, $id)
    {
        $student = $this->studentService->findOrFail($id);
        $userData = $request->input('user');
        $studentData = $request->except(['user', '_token']);

        if($profile = $request->file('user.profile')) {
            $user = $student->user;
            // delete file if already exists at the path.
            if (Storage::exists($user->profile)) {
                Storage::delete($user->profile);
            }
            $userData = $this->saveProfile($profile, $userData);
        }

        DB::beginTransaction();
        if($studentData)
        {
            $student->update($studentData);
        }
        if($userData)
        {
            $student->user()->update($userData);
        }
        DB::commit();

        if ($request->ajax()) {
            return;
        }

        return redirect()->route('school.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $student = $this->studentService->findOrFail($id);
        // delete file if already exists at the path.
        if (Storage::exists($student->user->profile)) {
            Storage::delete($student->user->profile);
        }
        $this->studentService->destroy($id);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws Exception
     */
    private function datatable(Request $request)
    {
        $students = $this->studentService->query()->with('user', 'school', 'grade')->get();

        return $this->dataTable->of($students)
            ->addColumn('action', function ($student) {
                $params = [
                    'route' => 'school.student',
                    'id' => $student->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->addColumn('full_name', function ($student) {
                return $student->user->first_name . ' ' . $student->user->last_name;
            })
            ->addColumn('status', function ($student) {
                $id = $student->id;
                $url = route('school.student.update', $student->id);
                $name = 'user[is_verified]';
                $checked = false;
                $disabled = false;
                if($student->user->is_verified == 1) {
                    $checked = true;
                    $disabled = true;
                }
                return view('general.switch', compact('name', 'disabled', 'checked', 'url'));
            })
            ->rawColumns(['full_name', 'status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @param $school
     * @return string
     */
    private function saveProfile($image, $storeData)
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();

        $storeData = array_merge(
            $storeData,
            [
                'profile' => Storage::putFileAs('user/profile', $image, $image_name)
            ]
        );

        return $storeData;
    }
}
