<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use App\Http\Services\Location\ProvinceService;
use http\Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProvinceController extends Controller
{
    /**
     * @var ProvinceService
     */
    private $provinceService;
    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * ProvinceController constructor.
     * @param ProvinceService $provinceService
     * @param DataTables $dataTable
     */
    public function __construct(
        ProvinceService $provinceService,
        DataTables $dataTable
    )
    {
        $this->provinceService = $provinceService;
        $this->dataTable = $dataTable;
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

        return view('admin.location.province.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->provinceService->create($request->all());

        return redirect()->route('admin.province.index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = $this->provinceService->findOrFail($id);

        return view('admin.location.province.edit', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->provinceService->update($id, $request->all());

        return redirect()->route('admin.province.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->provinceService->destroy($id);

        return redirect()->back();
    }

    /**
     * Display a listing of the province for datatable
     *
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function datatable(Request $request)
    {
        $provinces = $this->provinceService->all();

        return $this->dataTable->of($provinces)
            ->addColumn('action', function ($province) {
                $params = [
                    'route' => 'admin.province',
                    'id' => $province->id,
                    'edit' => true,
                    'delete' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
