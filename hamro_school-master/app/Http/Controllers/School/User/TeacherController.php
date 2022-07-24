<?php

namespace App\Http\Controllers\School\User;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\TeacherRequest;
use App\Http\Services\Grade\GradeService;
use App\Http\Services\Grade\SubjectService;
use App\Http\Services\User\TeacherService;
use App\Http\Services\User\UserService;
use App\Jobs\SendEmail;
use http\Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller
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
     * @var DataTables
     */
    private $dataTable;

    /**
     * @var string
     */
    private $teacher = 'school.user.teacher.';
    /**
     * @var GradeService
     */
    private $gradeService;
    /**
     * @var SubjectService
     */
    private $subjectService;

    /**
     * TeacherController constructor.
     *
     * @param UserService $userService
     * @param TeacherService $teacherService
     * @param GradeService $gradeService
     * @param SubjectService $subjectService
     * @param DataTables $dataTable
     */
    public function __construct(
        UserService $userService,
        TeacherService $teacherService,
        GradeService $gradeService,
        SubjectService $subjectService,
        DataTables $dataTable
    )
    {
        $this->userService = $userService;
        $this->teacherService = $teacherService;
        $this->dataTable = $dataTable;
        $this->gradeService = $gradeService;
        $this->subjectService = $subjectService;
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

        return view($this->teacher . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $grades = $this->gradeService->all();
        foreach ($grades as $grade) {
            $subjects[$grade->display_name] = $this->subjectService->query()->where('grade_id', $grade->id)->get()->pluck('name', 'id');
        }

        return view($this->teacher . 'create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherRequest $request
     * @return RedirectResponse
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
        $teacherData = $request->except(['user', '_token', 'subject_id']);

        DB::beginTransaction();
        $user = $this->userService->create($userData);
        $teacher = $user->teacher()->create($teacherData);
        $teacher->schools()->attach(frontUser('id'));
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

        return redirect()->route('school.teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
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
    public function edit($id)
    {
        $teacher = $this->teacherService->findOrFail($id)->load('user');
        $grades = $this->gradeService->all();
        foreach ($grades as $grade) {
            $subjects[$grade->display_name] = $this->subjectService->query()->where('grade_id', $grade->id)->get()->pluck('name', 'id');
        }

        return view($this->teacher . 'edit', compact('teacher', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TeacherRequest $request, $id)
    {
        $teacher = $this->teacherService->findOrFail($id);
        $userData = $request->input('user');
        $teacherData = $request->except(['user', '_token', 'subject_id']);
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

        return redirect()->route('school.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->userService->destroy($id);

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
                    'route' => 'school.teacher',
                    'id' => $teacher->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->addColumn('full_name', function ($teacher) {
                return $teacher->user->first_name . ' ' . $teacher->user->last_name;
            })
            ->addColumn('status', function ($teacher) {
                $id = $teacher->id;
                $url = route('school.teacher.update', $teacher->id);
                $name = 'user[is_verified]';
                $checked = false;
                $disabled = false;
                if($teacher->user->is_verified == 1) {
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
