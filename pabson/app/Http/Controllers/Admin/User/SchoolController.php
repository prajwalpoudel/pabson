<?php

namespace App\Http\Controllers\Admin\User;

use App\Constants\ImageSizeConstant;
use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Http\Services\Location\ProvinceService;
use App\Http\Services\User\SchoolService;
use App\Http\Services\UserService;
use App\Jobs\SendEmail;
use App\Notifications\EmailTemplateNotification;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class SchoolController extends Controller
{
    /**
     * @var SchoolService
     */
    private $schoolService;

    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * @var string
     */
    private $school = 'admin.user.school.';
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var ProvinceService
     */
    private $provinceService;

    /**
     * SchoolController constructor.
     *
     * @param UserService $userService
     * @param SchoolService $schoolService
     * @param ProvinceService $provinceService
     * @param DataTables $dataTable
     */
    public function __construct(
        UserService $userService,
        SchoolService $schoolService,
        ProvinceService $provinceService,
        DataTables $dataTable
    )
    {
        $this->schoolService = $schoolService;
        $this->dataTable = $dataTable;
        $this->userService = $userService;
        $this->provinceService = $provinceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->school . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $provinces = $this->provinceService->all()->pluck('name', 'id');

        return view($this->school . 'create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SchoolRequest $request
     * @return RedirectResponse
     */
    public function store(SchoolRequest $request)
    {
        $password = Str::random(12);
        $userData = array_merge(
            $request->input('user'),
            [
                'password' => bcrypt($password),
                'role_id' => RoleConstant::SCHOOL_ID,
                'is_verified' => true
            ]
        );

        $schoolData = $request->except(['user', '_token', 'address']);

        if($logo = $request->file('logo')) {
            $schoolData = $this->saveLogo($logo, $schoolData);
        }

        DB::beginTransaction();
            $user = $this->userService->create($userData);
            $user->school()->create($schoolData);
            $this->dispatch(new SendEmail($user, 'school_added', [
                'variables' => [
                    'principal_name' => $user->school->principal_name,
                    'school_name' => $user->school->name,
                    'email' => $user->email,
                    'username' => $user->username,
                    'password' => $password
                ]
            ]));
        DB::commit();

        return redirect()->route('admin.user.school.index');

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
     * @return Factory|View
     */
    public function edit($id)
    {
        $school = $this->schoolService->findOrFail($id)->load('user');
        $provinces = $this->provinceService->all()->pluck('name', 'id');


        return view($this->school . 'edit', compact('school', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SchoolRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(SchoolRequest $request, $id)
    {
        $userData = $request->input('user');
        $schoolData = $request->except(['user', '_token']);

        if($logo = $request->file('logo')) {
            $school = $this->schoolService->findOrFail($id);
            // delete file if already exists at the path.
            if (Storage::exists($school->logo)) {
                Storage::delete($school->logo);
                foreach(ImageSizeConstant::SCHOOLLOGO as $key=>$size) {
                    Storage::delete($key.'/'.$school->logo);
                }
            }
            $schoolData = $this->saveLogo($logo, $schoolData);
        }
        DB::beginTransaction();
        $school = $this->schoolService->findOrFail($id);
        if($schoolData)
        {
            $school->update($schoolData);
        }
        if($userData)
        {
            $school->user()->update($userData);
        }
        DB::commit();

        if ($request->ajax()) {
            return;
        }
        return redirect()->route('admin.user.school.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $school = $this->schoolService->findOrFail($id);
        // delete file if already exists at the path.
        if (Storage::exists($school->logo)) {
            Storage::delete($school->logo);
            foreach(ImageSizeConstant::SCHOOLLOGO as $key=>$size) {
                Storage::delete($key.'/'.$school->logo);
            }
        }
        $this->schoolService->destroy($id);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws Exception
     */
    private function datatable(Request $request)
    {
        $schools = $this->schoolService->query()->with(['user'])->get();

        return $this->dataTable->of($schools)
            ->addColumn('action', function ($school) {
                $params = [
                    'route' => 'admin.user.school',
                    'id' => $school->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->addColumn('address', function ($school) {
                return $school->municipality->name . '-' . $school->ward_number . ', ' . $school->district->name . ', '. $school->province->name;
            })
            ->addColumn('status', function ($school) {
                $id = $school->id;
                $url = route('admin.user.school.update', $school->id);
                $name = 'user[is_verified]';
                $checked = false;
                $disabled = false;
                if($school->user->is_verified == 1) {
                    $checked = true;
                    $disabled = true;
                }
                return view('general.switch', compact('name', 'disabled', 'checked', 'url', 'id'));
            })
            ->rawColumns(['address', 'status', 'action'])
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
    private function saveLogo($image, $storeData)
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();

        $storeData = array_merge(
            $storeData,
            [
                'logo' => Storage::putFileAs('school/logo', $image, $image_name)
            ]
        );
        $resizedImage = Image::make($image);
        $resizedImage->backup();
        foreach (ImageSizeConstant::SCHOOLLOGO as $key=>$size) {
            Storage::put('/'.$key.'/school/logo/'.$image_name, $resizedImage->resize($size['width'],$size['height'])->encode());
            $resizedImage->reset();
        }
        return $storeData;
    }
}
