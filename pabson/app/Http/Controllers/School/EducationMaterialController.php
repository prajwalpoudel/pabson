<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\EducationMaterialRequest;
use App\Http\Services\EducationMaterial\EducationMaterialService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class
EducationMaterialController extends Controller
{
    /**
     * @var EducationMaterialService
     */
    private $educationMaterialService;

    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * @var string
     */
    private $education_material = 'school.education_material.';

    /**
     * EducationMaterialController constructor.
     *
     * @param EducationMaterialService $educationMaterialService
     * @param DataTables $dataTable
     */
    public function __construct(
        EducationMaterialService $educationMaterialService,
        DataTables $dataTable
    )
    {
        $this->educationMaterialService = $educationMaterialService;
        $this->dataTable = $dataTable;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->education_material . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view($this->education_material . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EducationMaterialRequest $request
     * @return RedirectResponse
     */
    public function store(EducationMaterialRequest $request)
    {
        $education_material = $request->validated();

        $education_material['slug'] = Str::slug($education_material['name']);
        $education_material['user_id'] = frontUser('id');

        if ($request->hasFile('file')) {
            $education_material['file'] = $this->saveFile($education_material);
        }

        frontUser('school')->education_materials()->create($education_material);

        return redirect()->route('school.education_material.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|Response|View
     */
    public function show($id)
    {
        $educationMaterial = $this->educationMaterialService->findOrFail(decrypt($id));

        return view($this->education_material . 'show', compact('educationMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|Response|View
     */
    public function edit(string $id)
    {
        $education_material = $this->educationMaterialService->findOrFail(decrypt($id));

        return view($this->education_material . 'edit', compact('education_material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EducationMaterialRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(EducationMaterialRequest $request, $id)
    {
        $education_material = $request->validated();

        $education_material['slug'] = str_slug($education_material['name']);

        if ($request->hasFile('file')) {
            $oldData = $this->educationMaterialService->findOrFail($id);
            // delete file if already exists at the path.
            if (Storage::exists($oldData->file)) {
                Storage::delete($oldData->file);
            }
            $education_material['file'] = $this->saveFile($education_material);
        }

        frontUser('school')->education_materials()->update($education_material);

        return redirect()->route('school.education_material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(string $id)
    {
        $educationMaterial = $this->educationMaterialService->findOrFail(decrypt($id));
        // delete file if already exists at the path.
        if (Storage::exists($educationMaterial->file)) {
            Storage::delete($educationMaterial->file);
        }
        $educationMaterial->delete();

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    private function datatable(Request $request)
    {
        $education_materials = frontUser('school')->education_materials;

        return $this->dataTable->of($education_materials)
            ->addColumn('action', function ($education_material) {
                $params = [
                    'route' => 'school.education_material',
                    'id' => encrypt($education_material->id),
                    'edit' => true,
                    'delete' => true,
                    'show' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @param $education_material
     * @return string
     */
    private function saveFile($education_material)
    {
        $filename = time() . '.' . $education_material['file']->getClientOriginalExtension();

        return $education_material['file']->storeAs('school/education_material', $filename);
    }
}
