<?php

namespace App\Http\Controllers\Admin\Academics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Academics\SubjectRequest;
use App\Http\Services\Grade\GradeService;
use App\Http\Services\Grade\SubjectService;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SubjectController extends Controller
{
    /**
     * @var SubjectService
     */
    private $subjectService;
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
    private $subject = 'admin.academics.subject.';

    /**
     * SubjectController constructor.
     * @param SubjectService $subjectService
     * @param GradeService $gradeService
     * @param DataTables $dataTable
     */
    public function __construct(
        SubjectService $subjectService,
        GradeService $gradeService,
        DataTables $dataTable
    )
    {

        $this->subjectService = $subjectService;
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

        return view($this->subject . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = $this->gradeService->all()->pluck('display_name', 'id');

        return view($this->subject . 'create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $subject = $request->validated();
        if($subject['grades'] == null){
            return $subject['grades'] = array();
        }
        $media = null;
        foreach($subject['grades'] as $grade)
        {
            $subject['grade_id'] = $grade;
            $subj = $this->subjectService->create($subject);
            if($media == null && $request->image){
                $subj->addMedia($request->image)
                ->toMediaCollection('image');
                $media = $subj->getFirstMedia('image');
            }else if($media){
                $media->copy($subj,'image');
            }
            
        }

        Flash::success("Successfully created subjects");

        return redirect()->route('admin.academics.subject.index');
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
        $subject = $this->subjectService->findOrFail($id);
        $grades = $this->gradeService->all()->pluck('display_name', 'id');

        return view($this->subject . 'edit', compact('subject', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        $subject = $request->validated();

        $this->subjectService->update($id, $subject);
        if($request->image){
            $s = $this->subjectService->find($id);
            $s->clearMediaCollection("image");
            $s->addMedia($request->image)
            ->toMediaCollection('image');
        }
        Flash::success("Successfully updated the subject");
        return redirect()->route('admin.academics.subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subjectService->destroy($id);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    private function datatable(Request $request)
    {
        $subjects = $this->subjectService->query()->with('grade')->get();

        return $this->dataTable->of($subjects)
            ->addColumn('action', function ($subject) {
                $params = [
                    'route' => 'admin.academics.subject',
                    'id' => $subject->id,
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
