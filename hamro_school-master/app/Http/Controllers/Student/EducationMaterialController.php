<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Services\EducationMaterial\EducationMaterialService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class EducationMaterialController extends Controller
{
    /**
     * @var string
     */
    private $educationMaterial = 'student.educationMaterial.';
    /**
     * @var EducationMaterialService
     */
    private $educationMaterialService;
    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * EducationMaterialController constructor.
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
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->getEducationMaterial() . 'index');
    }

    /**
     * @param string $id
     * @return Factory|View
     */
    public function show(string $id)
    {
        $educationMaterial = $this->educationMaterialService->findOrFail(decrypt($id));

        return view($this->getEducationMaterial() . 'show', compact('educationMaterial'));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable()
    {
        $educationMaterials = $this->educationMaterialService->all();

        return $this->dataTable->of($educationMaterials)
            ->editColumn('description', function ($educationMaterial) {
                return Str::limit(strip_tags($educationMaterial->description), 100);
            })
            ->addColumn('action', function ($educationMaterial) {
                $params = [
                    'route' => 'student.education-material',
                    'id' => encrypt($educationMaterial->id),
                    'edit' => false,
                    'delete' => false,
                    'show' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['description', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return string
     */
    public function getEducationMaterial(): string
    {
        return $this->educationMaterial;
    }
}
