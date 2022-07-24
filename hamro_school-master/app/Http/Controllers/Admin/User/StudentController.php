<?php

namespace App\Http\Controllers\Admin\User;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Http\Services\Grade\GradeService;
use App\Http\Services\User\StudentService;
use App\Http\Services\UserService;
use App\Jobs\SendEmail;
use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    private $studentView = 'admin.user.student.';
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var DataTables
     */
    private $dataTable;
    /**
     * @var StudentService
     */
    private $studentService;
    /**
     * @var GradeService
     */
    private $gradeService;

    /**
     * SchoolController constructor.
     * @param UserService $userService
     * @param StudentService $studentService
     * @param GradeService $gradeService
     * @param DataTables $dataTable
     */
    public function __construct(
        UserService $userService,
        StudentService $studentService,
        GradeService $gradeService,
        DataTables $dataTable
    )
    {
        $this->userService = $userService;
        $this->dataTable = $dataTable;
        $this->studentService = $studentService;
        $this->gradeService = $gradeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|\Illuminate\Http\Response|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->studentView.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $schools = $this->userService->query()->with(['school'])->where([
            'role_id' => RoleConstant::SCHOOL_ID,
            'is_verified' => true
        ])->get()->pluck('school.name', 'school.id');

        $grades = $this->gradeService->all()->pluck('display_name', 'id');

        return view($this->studentView.'create', compact('schools', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentRequest $request): \Illuminate\Http\RedirectResponse
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

        $studentData = $request->except(['user', '_token']);

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

        return redirect()->route('admin.user.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->studentService->findOrFail($id)->load('user');
        $schools = $this->userService->query()->with(['school'])->where([
            'role_id' => RoleConstant::SCHOOL_ID,
            'is_verified' => true
        ])->get()->pluck('school.name', 'school.id');
        $grades = $this->gradeService->all()->pluck('display_name', 'id');

        return view($this->studentView.'edit', compact('student', 'schools', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

        return redirect()->route('admin.user.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Display a listing of the student for datatable
     *
     * @param  Request  $request
     * @return mixed
     * @throws \Exception
     */
    public function datatable(Request $request)
    {
        $students = $this->studentService->query()->with('user', 'school', 'grade')->get();

        return $this->dataTable->of($students)
            ->addColumn('action', function ($student) {
                $params = [
                    'route'  => 'admin.user.student',
                    'id'     => $student->id,
                    'edit'   => true,
                    'delete' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->addColumn('full_name', function ($student) {
                return $student->user->first_name . ' ' . $student->user->last_name;
            })
            ->addColumn('status', function ($student) {
                 $id = $student->id;
                 $url = route('admin.user.student.update', $student->id);
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
//            ->filterColumn('full_name', function($query, $keyword) {
//                $sql = "CONCAT(first_name,'-',last_name)  like ?";
//                $query->whereRaw($sql, ["%{$keyword}%"]);
//            })
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
