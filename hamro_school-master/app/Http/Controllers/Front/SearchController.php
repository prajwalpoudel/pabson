<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Services\Location\ProvinceService;
use App\Http\Services\User\SchoolService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * @var SchoolService
     */
    private $schoolService;
    /**
     * @var ProvinceService
     */
    private $provinceService;

    /**
     * HomeController constructor.
     * @param SchoolService $schoolService
     * @param ProvinceService $provinceService
     */
    public function __construct(
        SchoolService $schoolService,
        ProvinceService $provinceService
    )
    {
        $this->schoolService = $schoolService;
        $this->provinceService = $provinceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = $this->provinceService->query()->with('districts.municipalities')->get();
        $query = $this->schoolService->query();
        $query->whereHas('user', function($query) {
            $query->where('is_verified', true);
        });
        $query->with('user', 'province', 'district', 'municipality');

        if($keyword = $request->input('keyword')) {
            $query->where(function($query) use ($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%')
                    ->orWhereHas('user', function($query) use($keyword) {
                        $query->where('first_name', 'like', '%'.$keyword.'%')
                            ->orWhere('last_name', 'like', '%'.$keyword.'%')
                            ->orWhere(DB::raw("CONCAT('first_name', 'last_name')"), 'like', '%'.$keyword.'%');
                    });
            });
        }

        if($request->input('province_id')) {
            $provinceId = decrypt($request->input('province_id'));
            $query->where(function($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            });
        }

        if($request->input('district_id')) {
            $districtId = decrypt($request->input('district_id'));
            $query->where(function($query) use ($districtId) {
                $query->where('district_id', $districtId);
            });
        }

        if($request->input('municipality_id')) {
            $municipalityId = decrypt($request->input('municipality_id'));
            $query->where(function($query) use ($municipalityId) {
                $query->where('municipality_id', $municipalityId);
            });
        }

        $schools = $query->paginate(8)->appends(request()->query());

        return view('front.home.search.index', compact('schools', 'provinces'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function detail($id) {
        $school = $this->schoolService->findOrFail(decrypt($id));

        return view('front.search.detail', compact('school'));
    }
}
