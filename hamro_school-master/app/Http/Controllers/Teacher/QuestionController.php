<?php

namespace App\Http\Controllers\Teacher;

use App\Entities\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\QuestionRequest;
use App\Http\Services\Discussion\QuestionService;
use App\Http\Services\Grade\SubjectService;
use App\Http\Services\User\TeacherService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class QuestionController extends Controller
{
    /**
     * @var QuestionService
     */
    private $questionService;

    /**
     * @var DataTables
     */
    private $dataTable;


    /**
     * @var SubjectService
     */
    private $subjectService;

    /**
     * @var TeacherService
     */
    private $teacherService;

    /**
     * @var string
     */
    private $question = 'teacher.discussion.question.';


    /**
     * QuestionController constructor.
     *
     * @param QuestionService $questionService
     * @param SubjectService $subjectService
     * @param DataTables $dataTable
     */
    public function __construct(
        QuestionService $questionService,
        SubjectService $subjectService,
        DataTables $dataTable
    )
    {
        $this->questionService = $questionService;
        $this->subjectService = $subjectService;
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

        return view($this->question . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view($this->question . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @return RedirectResponse
     */
    public function store(QuestionRequest $request): RedirectResponse
    {
        $question = $request->validated();
        $question = array_merge($question, [
            'slug' => Str::slug($question['name']),
            'user_id' => frontUser('id')
        ]);

        $this->questionService->create($question);

        return redirect()->route('teacher.question.index');
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
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $question = $this->questionService->findOrFail($id);

        return view($this->question . 'edit', compact(['question']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(QuestionRequest $request, int $id): RedirectResponse
    {
        $question = $request->validated();
        $question = array_merge($question, [
            'slug' => Str::slug($question['name']),
            'user_id' => frontUser('id')
        ]);

        $this->questionService->update($id, $question);

        return redirect()->route('teacher.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->questionService->destroy($id);

        return redirect()->back();
    }

    private function datatable(Request $request)
    {
        $questions = $this->questionService->query()->where('user_id', frontUser('id'))->get();

        return $this->dataTable->of($questions)
            ->addColumn('action', function ($question) {
                $params = [
                    'route' => 'teacher.question',
                    'id' => $question->id,
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
