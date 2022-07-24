<?php

namespace App\Http\Controllers\Teacher;

use App\Constants\RoleConstant;
use App\Entities\Question;
use App\Entities\Subject;
use App\Entities\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Services\Discussion\AnswerService;
use App\Http\Services\Discussion\QuestionService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AnswerController extends Controller
{
    /**
     * @var AnswerService
     */
    private $answerService;

    /**
     * @var QuestionService
     */
    private $questionService;

    /**
     * @var string
     */
    private $answer = 'teacher.discussion.answer.';

    /**
     * AnswerController constructor.
     *
     * @param QuestionService $questionService
     * @param AnswerService $answerService
     */
    public function __construct(
        QuestionService $questionService,
        AnswerService $answerService
    )
    {
        $this->questionService = $questionService;
        $this->answerService = $answerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        $questions = $this->questionService->all();

        return view($this->answer . 'index', compact(['questions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view($this->answer . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
