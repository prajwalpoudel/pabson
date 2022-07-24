<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StudentUpdateRequest;
use App\Http\Services\Location\DistrictService;
use App\Http\Services\Location\MunicipalityService;
use App\Http\Services\Location\ProvinceService;
use App\Http\Services\User\SchoolService;
use App\Http\Services\UserService;
use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StudentProfileController extends Controller
{
    /**
     * @var string
     */
    private $profile = 'student.profile.';

    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var SchoolService
     */
    private $schoolService;

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
     * Create a new controller instance.
     *
     * @param UserService $userService
     * @param SchoolService $schoolService
     * @param ProvinceService $provinceService
     * @param DistrictService $districtService
     * @param MunicipalityService $municipalityService
     */
    public function __construct(
        UserService $userService,
        SchoolService $schoolService,
        ProvinceService $provinceService,
        DistrictService $districtService,
        MunicipalityService $municipalityService
    )
    {
        $this->userService = $userService;
        $this->schoolService = $schoolService;
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        $this->municipalityService = $municipalityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view($this->profile . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return Application|Factory|\Illuminate\Http\Response|View
     */
    public function edit()
    {
        return view($this->profile . 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(StudentUpdateRequest $request): RedirectResponse
    {
        $userData = array_merge(
            $request->only(['first_name', 'last_name', 'email', 'address', 'phone'])
        );
        DB::beginTransaction();

        $user = $this->userService->update(['id' => frontUser()->id], $userData);

        DB::commit();

        return redirect()->route('student.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
