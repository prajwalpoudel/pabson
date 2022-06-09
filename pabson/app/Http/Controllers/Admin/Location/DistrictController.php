<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use App\Http\Services\Location\DistrictService;
use App\Http\Services\Location\ProvinceService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DistrictController extends Controller
{
    /**
     * @var DistrictService
     */
    private $districtService;
    /**
     * @var DataTables
     */
    private $dataTable;
    /**
     * @var ProvinceService
     */
    private $provinceService;

    /**
     * DistrictController constructor.
     * @param DistrictService $districtService
     * @param ProvinceService $provinceService
     * @param DataTables $dataTable
     */
    public function __construct(
        DistrictService $districtService,
        ProvinceService $provinceService,
        DataTables $dataTable
    )
    {
        $this->districtService = $districtService;
        $this->dataTable = $dataTable;
        $this->provinceService = $provinceService;
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

        return view('admin.location.district.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = $this->provinceService->all()->pluck('name', 'id');

        return view('admin.location.district.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->districtService->create($request->all());

        return redirect()->route('admin.district.index');
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
        $district = $this->districtService->findOrFail($id);
        $provinces = $this->provinceService->all()->pluck('name', 'id');

        return view('admin.location.district.edit', compact('district', 'provinces'));
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
        $this->districtService->update($id, $request->all());

        return redirect()->route('admin.district.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->districtService->destroy($id);

        return redirect()->back();
    }

    /**
     * Display a listing of the district for datatable
     *
     * @param  Request  $request
     * @return mixed
     * @throws \Exception
     */
    public function datatable(Request $request)
    {
        $districts = $this->districtService->query()->with('province')->get();

        return $this->dataTable->of($districts)
            ->addColumn('action', function ($district) {
                $params = [
                    'route'  => 'admin.district',
                    'id'     => $district->id,
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
