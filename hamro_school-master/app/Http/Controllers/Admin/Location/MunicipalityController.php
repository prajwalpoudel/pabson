<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use App\Http\Services\Location\MunicipalityService;
use App\Http\Services\Location\DistrictService;
use App\Http\Services\Location\ProvinceService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MunicipalityController extends Controller
{
    /**
     * @var Datatables
     */
    private $dataTable;
    /**
     * @var DistrictService
     */
    private $districtService;
    /**
     * @var ProvinceService
     */
    private $provinceService;
    /**
     * @var MunicipalityService
     */
    private $municipalityService;
    /**
     * @var String
     */
    private $municipality = 'admin.location.municipality.';

    /**
     * MunicipalityController constructor.
     * @param MunicipalityService $municipalityService
     * @param DistrictService $districtService
     * @param ProvinceService $provinceService
     * @param DataTables $dataTable
     */
    public function __construct(
        MunicipalityService $municipalityService,
        DistrictService $districtService,
        ProvinceService $provinceService,
        Datatables $dataTable
    )
    {
        $this->dataTable = $dataTable;
        $this->districtService = $districtService;
        $this->provinceService = $provinceService;
        $this->municipalityService = $municipalityService;
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

        return view($this->municipality . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = $this->provinceService->all();
        foreach ($provinces as $province) {
            $districts[$province->name] = $this->districtService->query()->where('province_id', $province->id)->get()->pluck('name', 'id');
        }

        return view($this->municipality . 'create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->municipalityService->create($request->all());

        return redirect()->route('admin.municipality.index');
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
        $municipality = $this->municipalityService->findOrFail($id);
        $provinces = $this->provinceService->all();
        foreach ($provinces as $province) {
            $districts[$province->name] = $this->districtService->query()->where('province_id', $province->id)->get()->pluck('name', 'id');
        }

        return view($this->municipality . 'edit', compact('districts', 'municipality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->municipalityService->update($id, $request->all());

        return redirect()->route('admin.municipality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->municipalityService->destroy($id);

        return redirect()->back();
    }

    /**
     * Display a listing of the province for datatable
     *
     * @param  Request  $request
     * @return mixed
     * @throws \Exception
     */
    public function datatable(Request $request)
    {
        $municipalities = $this->municipalityService->query()->with('district.province')->get();

        return $this->dataTable->of($municipalities)
            ->addColumn('action', function ($municipality) {
                $params = [
                    'route'  => 'admin.municipality',
                    'id'     => $municipality->id,
                    'edit'   => true,
                    'delete' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
