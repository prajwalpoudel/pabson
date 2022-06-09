<?php

namespace App\Http\Controllers\Admin\User;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModeratorRequest;
use App\Http\Services\Grade\GradeService;
use App\Http\Services\Grade\SubjectService;
use App\Http\Services\User\ModeratorService;
use App\Http\Services\UserService;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;

class ModeratorController extends Controller
{
    /**
     * @var string
     */
    private $moderator = 'admin.user.moderator.';
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var DataTables
     */
    private $dataTable;
    /**
     * @var SubjectService
     */
    private $subjectService;
    /**
     * @var ModeratorService
     */
    private $moderatorService;
    /**
     * @var GradeService
     */
    private $gradeService;

    /**
     * ModeratorController constructor.
     * @param UserService $userService
     * @param DataTables $dataTable
     * @param ModeratorService $moderatorService
     * @param GradeService $gradeService
     * @param SubjectService $subjectService
     */
    public function __construct(
        UserService $userService,
        DataTables $dataTable,
        ModeratorService $moderatorService,
        GradeService $gradeService,
        SubjectService $subjectService
    )
    {
        $this->userService = $userService;
        $this->dataTable = $dataTable;
        $this->subjectService = $subjectService;
        $this->moderatorService = $moderatorService;
        $this->gradeService = $gradeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->moderator.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = $this->gradeService->all();
        $subjects = array();
        foreach ($grades as $grade) {
            $subjects[$grade->display_name] = $this->subjectService->query()->where('grade_id', $grade->id)->get()->pluck('name', 'id');
        }

        return view($this->moderator.'create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModeratorRequest $request)
    {
        $password = Str::random(12);
        $userData = array_merge(
            $request->input('user'),
            [
                'password' => bcrypt($password),
                'role_id' => RoleConstant::MODERATOR_ID,
                'is_verified' => true
            ]
        );


        if($profile = $request->file('user.profile')) {
            $userData = $this->saveProfile($profile, $userData);
        }
        $moderatorData = $request->except(['user', '_token', 'subject_id']);

        DB::beginTransaction();
        $user = $this->userService->create($userData);
        $moderator = $user->moderator()->create($moderatorData);
        $moderator->subjects()->sync($request->input('subject_id'));
        $this->dispatch(new SendEmail($user, 'user_registered', [
            'variables' => [
                'user_name' => $user->full_name,
                'username' => $user->username,
                'email' => $user->email,
                'password' => $password
            ]
        ]));
        DB::commit();

        return redirect()->route('admin.user.moderator.index');
    }

    public function resetPassword($id)
    {
        $password = Str::random(12);
      
      
        $user = $this->userService->find($id);
        $user->password = Hash::make($password);
        $user->save();
        $this->dispatch(new SendEmail($user, 'user_registered', [
            'variables' => [
                'user_name' => $user->full_name,
                'username' => $user->username,
                'email' => $user->email,
                'password' => $password
            ]
        ]));
        Flash::success("Successfully reset password");
        return redirect()->route('admin.user.moderator.index');
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
        $moderator = $this->moderatorService->findOrFail($id)->load(['user']);
        $grades = $this->gradeService->all();
        foreach ($grades as $grade) {
            $subjects[$grade->display_name] = $this->subjectService->query()->where('grade_id', $grade->id)->get()->pluck('name', 'id');
        }

        return view($this->moderator . 'edit', compact('moderator', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModeratorRequest $request, $id)
    {
        $moderator = $this->moderatorService->findOrFail($id);
        $userData = $request->input('user');
        $moderatorData = $request->except(['user', '_token', 'subject_id','_method']);

        if($profile = $request->file('user.profile')) {
            $user = $moderator->user;
            // delete file if already exists at the path.
            if (Storage::exists($user->profile)) {
                Storage::delete($user->profile);
            }
            $userData = $this->saveProfile($profile, $userData);
        }

        DB::beginTransaction();
        if($moderatorData)
        {
            $moderator->update($moderatorData);
        }
        if($subjects = $request->input('subject_id'))
        {
            $moderator->subjects()->sync($subjects);
        }

        if($userData)
        {
            $moderator->user()->update($userData);
        }
        DB::commit();

        if ($request->ajax()) {
            return;
        }

        return redirect()->route('admin.user.moderator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moderator = $this->moderatorService->findOrFail($id);
        // delete file if already exists at the path.
        if (Storage::exists($moderator->user->profile)) {
            Storage::delete($moderator->user->profile);
        }
        $this->moderatorService->destroy($id);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws Exception
     */
    private function datatable(Request $request)
    {
        $moderators = $this->moderatorService->query()->with(['user'])->get();

        return $this->dataTable->of($moderators)
            ->addColumn('action', function ($moderator) {
                $params = [
                    'route'  => 'admin.user.moderator',
                    'id'     => $moderator->id,
                    'edit'   => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->addColumn('full_name', function ($moderator) {
                return $moderator->user->first_name . ' ' . $moderator->user->last_name;
            })
            ->addColumn('status', function ($moderator) {
                $id = $moderator->id;
                $url = route('admin.user.moderator.update', $moderator->id);
                $name = 'user[is_verified]';
                $checked = false;
                $disabled = false;
                if($moderator->user->is_verified == 1) {
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
