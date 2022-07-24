<?php

namespace App\Http\Controllers\Admin\Academics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Academics\GradeRequest;
use App\Http\Services\Grade\GradeService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GradeController extends Controller
{
    /**
     * @var GradeService
     */
    private $gradeService;
    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * @var string
     */
    private $grade = 'admin.academics.grade.';

    /**
     * GradeController constructor.
     * @param GradeService $gradeService
     * @param DataTables $dataTable
     */
    public function __construct(
        GradeService $gradeService,
        DataTables $dataTable
    )
    {
        $this->gradeService = $gradeService;
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

        return view($this->grade . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->grade . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradeRequest $request)
    {
        $grade = $request->validated();
        $this->gradeService->create($grade);

        return redirect()->route('admin.academics.grade.index');
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
        $grade = $this->gradeService->findOrFail($id);

        return view($this->grade . 'edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradeRequest $request, $id)
    {
        $grade = $request->validated();

        $this->gradeService->update($id, $grade);

        return redirect()->route('admin.academics.grade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gradeService->destroy($id);

        return redirect()->back();
    }

    private function datatable(Request $request)
    {
        $grades = $this->gradeService->all();

        return $this->dataTable->of($grades)
            ->addColumn('action', function ($grade) {
                $params = [
                    'route' => 'admin.academics.grade',
                    'id' => $grade->id,
                    'edit' => true,
                    'delete' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

}
