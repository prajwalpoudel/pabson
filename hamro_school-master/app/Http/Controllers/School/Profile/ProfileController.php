<?php

namespace App\Http\Controllers\School\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\SchoolUpdateRequest;
use App\Http\Services\Location\DistrictService;
use App\Http\Services\Location\MunicipalityService;
use App\Http\Services\Location\ProvinceService;
use App\Http\Services\User\SchoolService;
use App\Http\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @var string
     */
    private $profile = 'school.profile.';

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
        $user = frontUser();

        return view($this->profile . 'index', compact('user'));
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
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|Response|View
     */
    public function edit(int $id)
    {
        $user = $this->userService->findOrFail($id);

        $provinces = $this->provinceService->all()->pluck('name', 'id');

        return view($this->profile . 'edit', compact(['user', 'provinces']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SchoolUpdateRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $userData = $request->input('user');
        $schoolData = $request->except(['user', '_token']);

        if ($logo = $request->file('logo')) {
            $school = $this->schoolService->findOrFail($id);
            // delete file if already exists at the path.
            if (Storage::exists($school->logo)) {
                Storage::delete($school->logo);
            }
            $schoolData = $this->saveLogo($logo, $schoolData);
        }

        DB::beginTransaction();

        $school = $this->schoolService->findOrFail($id);

        if ($schoolData) {
            $school->update($schoolData);
        }
        if ($userData) {
            $school->user()->update($userData);
        }
        DB::commit();

        return redirect()->route('school.profile.index');
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

    /**
     * @param $school
     * @return string
     */
    private function saveLogo($image, $storeData)
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();

        $storeData = array_merge(
            $storeData,
            [
                'logo' => Storage::putFileAs('school/logo', $image, $image_name)
            ]
        );
        return $storeData;
    }
}
