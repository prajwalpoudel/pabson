<?php

namespace App\Http\Controllers\Auth;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\Grade\GradeService;
use App\Http\Services\Grade\SubjectService;
use App\Http\Services\Location\DistrictService;
use App\Http\Services\Location\MunicipalityService;
use App\Http\Services\Location\ProvinceService;
use App\Http\Services\UserService;
use App\Providers\RouteServiceProvider;
use http\Client\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SCHOOL;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var SubjectService
     */
    private $subjectService;

    /**
     * @var ProvinceService
     */
    private $provinceService;

    /**
     * @var DistrictService
     */
    private $districtService;

    /**
     * @var MunicipalityService
     */
    private $municipalityService;
    /**
     * @var GradeService
     */
    private $gradeService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     * @param GradeService $gradeService
     * @param SubjectService $subjectService
     * @param ProvinceService $provinceService
     * @param DistrictService $districtService
     * @param MunicipalityService $municipalityService
     */
    public function __construct(
        UserService $userService,
        GradeService $gradeService,
        SubjectService $subjectService,
        ProvinceService $provinceService,
        DistrictService $districtService,
        MunicipalityService $municipalityService
    )
    {
        $this->middleware('guest');
        $this->userService = $userService;
        $this->subjectService = $subjectService;
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        $this->municipalityService = $municipalityService;
        $this->gradeService = $gradeService;
    }

    /**
     * @return Factory|View
     */
    public function school()
    {
        $provinces = $this->provinceService->all()->pluck('name', 'id');

        return view('auth.register.school', compact(['provinces']));
    }

    /**
     * @return Factory|View
     */
    public function teacher()
    {
        $schools = $this->userService->query()->with(['school'])->where([
            'role_id' => RoleConstant::SCHOOL_ID,
            'is_verified' => true
        ])->get()->pluck('school.name', 'school.id');
        $subjects = $this->subjectService->all()->pluck('name', 'id');

        return view('auth.register.teacher', compact(['schools', 'subjects']));
    }

    /**
     * @return Factory|View
     */
    public function student()
    {
        $schools = $this->userService->query()->with(['school'])->where([
            'role_id' => RoleConstant::SCHOOL_ID,
            'is_verified' => true
        ])->get()->pluck('school.name', 'school.id');

        $grades = $this->gradeService->all()->pluck('display_name', 'id');

        return view('auth.register.student', compact(['schools', 'grades']));
    }


    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $userData = array_merge(
            $request->input('user'),
            ['password' => bcrypt($request->input('user.password'))]
        );
        DB::beginTransaction();
        $user = $this->userService->create($userData);
        if ($userData['role_id'] == RoleConstant::SCHOOL_ID) {
            $schoolData = [
                'name' => $request->input('name'),
                'principal_name' => $request->input('principal_name'),
                'principal_email' => $request->input('principal_email'),
                'phone' => $request->input('phone'),
                'province_id' => $request->input('province_id'),
                'district_id' => $request->input('district_id'),
                'municipality_id' => $request->input('municipality_id'),
                'ward_number' => $request->input('ward_number'),
                'website_link' => $request->input('website_link'),
            ];

            $user->school()->create($schoolData);

        } elseif ($userData['role_id'] == RoleConstant::STUDENT_ID) {
            $studentData = [
                'school_id' => $request->input('school_id'),
                'grade_id' => $request->input('grade_id'),
                'guardian_name' => $request->input('guardian_name'),
            ];
            $user->student()->create($studentData);
            $this->redirectTo = RouteServiceProvider::STUDENT;

        } elseif ($userData['role_id'] == RoleConstant::TEACHER_ID) {
            $teacherData = [
            ];
            $teacher = $user->teacher()->create($teacherData);
            $teacher->schools()->sync($request->input('school_id'));
            $teacher->subjects()->sync($request->input('subject_id'));
            $this->redirectTo = RouteServiceProvider::TEACHER;
        }
        DB::commit();

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('front');
    }
}
