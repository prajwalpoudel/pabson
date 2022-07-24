<?php

namespace App\Http\Controllers\Admin\User;

use App\Constants\RoleConstant;
use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeacherRequest;
use App\Http\Services\Grade\GradeService;
use App\Http\Services\Grade\SubjectService;
use App\Http\Services\User\SchoolService;
use App\Http\Services\User\TeacherService;
use App\Http\Services\UserService;
use App\Jobs\SendEmail;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller
{

    private $teacher = 'admin.user.teacher.';
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var DataTables
     */
    private $dataTable;
    /**
     * @var SchoolService
     */
    private $schoolService;
    /**
     * @var TeacherService
     */
    private $teacherService;
    /**
     * @var SubjectService
     */
    private $subjectService;
    /**
     * @var GradeService
     */
    private $gradeService;

    /**
     * TeacherController constructor.
     * @param UserService $userService
     * @param SchoolService $schoolService
     * @param TeacherService $teacherService
     * @param DataTables $dataTable
     * @param SubjectService $subjectService
     * @param GradeService $gradeService
     */
    public function __construct(
        UserService $userService,
        SchoolService $schoolService,
        TeacherService $teacherService,
        DataTables $dataTable,
        SubjectService $subjectService,
        GradeService $gradeService
    )
    {
        $this->userService = $userService;
        $this->dataTable = $dataTable;
        $this->schoolService = $schoolService;
        $this->teacherService = $teacherService;
        $this->subjectService = $subjectService;
        $this->gradeService = $gradeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->teacher.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $schools = $this->userService->query()->with(['school'])->where([
            'role_id' => RoleConstant::SCHOOL_ID,
            'is_verified' => true
        ])->get()->pluck('school.name', 'school.id');

        $grades = $this->gradeService->all();
        foreach ($grades as $grade) {
            $subjects[$grade->display_name] = $this->subjectService->query()->where('grade_id', $grade->id)->get()->pluck('name', 'id');
        }
        return view($this->teacher.'create', compact('schools','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(TeacherRequest $request)
    {
        $password = Str::random(12);
        $userData = array_merge(
            $request->input('user'),
            [
                'password' => bcrypt($password),
                'role_id' => RoleConstant::TEACHER_ID,
                'is_verified' => true
            ]
        );


        if($profile = $request->file('user.profile')) {
            $userData = $this->saveProfile($profile, $userData);
        }
        $teacherData = $request->except(['user', '_token', 'school_id', 'subject_id']);

        DB::beginTransaction();
        $user = $this->userService->create($userData);
        $teacher = $user->teacher()->create($teacherData);
        $teacher->schools()->sync($request->input('school_id'));
        $teacher->subjects()->sync($request->input('subject_id'));
        $this->dispatch(new SendEmail($user, 'user_registered', [
            'variables' => [
                'user_name' => $user->full_name,
                'username' => $user->username,
                'email' => $user->email,
                'password' => $password
            ]
        ]));
        DB::commit();

        return redirect()->route('admin.user.teacher.index');
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
     * @return void
     */
    public function edit($id)
    {
        $teacher = $this->teacherService->findOrFail($id)->load(['user', 'schools']);
        $schools = $this->userService->query()->with(['school'])->where([
            'role_id' => RoleConstant::SCHOOL_ID,
            'is_verified' => true
        ])->get()->pluck('school.name', 'school.id');
        $grades = $this->gradeService->all();
        foreach ($grades as $grade) {
            $subjects[$grade->display_name] = $this->subjectService->query()->where('grade_id', $grade->id)->get()->pluck('name', 'id');
        }

        return view($this->teacher . 'edit', compact('teacher', 'schools', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(TeacherRequest $request, $id)
    {
        $teacher = $this->teacherService->findOrFail($id);
        $userData = $request->input('user');
        $teacherData = $request->except(['user', '_token', 'school_id', 'subject_id']);

        if($profile = $request->file('user.profile')) {
            $user = $teacher->user;
            // delete file if already exists at the path.
            if (Storage::exists($user->profile)) {
                Storage::delete($user->profile);
            }
            $userData = $this->saveProfile($profile, $userData);
        }

        DB::beginTransaction();
        if($teacherData)
        {
            $teacher->update($teacherData);
        }
        if($schools = $request->input('school_id'))
        {
            $teacher->schools()->sync($schools);
        }
        if($subjects = $request->input('subject_id'))
        {
            $teacher->subjects()->sync($subjects);
        }

        if($userData)
        {
            $teacher->user()->update($userData);
        }
        DB::commit();

        if ($request->ajax()) {
            return;
        }

        return redirect()->route('admin.user.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $teacher = $this->teacherService->findOrFail($id);
        // delete file if already exists at the path.
        if (Storage::exists($teacher->user->profile)) {
            Storage::delete($teacher->user->profile);
        }
        $this->teacherService->destroy($id);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws Exception
     */
    private function datatable(Request $request)
    {
        $teachers = $this->teacherService->query()->with(['user'])->get();

        return $this->dataTable->of($teachers)
            ->addColumn('action', function ($teacher) {
                $params = [
                    'route'  => 'admin.user.teacher',
                    'id'     => $teacher->id,
                    'edit'   => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->addColumn('full_name', function ($teacher) {
                return $teacher->user->first_name . ' ' . $teacher->user->last_name;
            })
            ->addColumn('status', function ($teacher) {
                $id = $teacher->id;
                $url = route('admin.user.teacher.update', $teacher->id);
                $name = 'user[is_verified]';
                $checked = false;
                $disabled = false;
                if($teacher->user->is_verified == 1) {
                    $checked = true;
                    $disabled = true;
                }
                return view('general.switch', compact('name', 'disabled', 'checked', 'url'));
            })
            ->rawColumns(['action', 'full_name', 'status'])
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
