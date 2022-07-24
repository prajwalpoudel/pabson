<?php

namespace App\Http\Controllers\Teacher;

use App\Entities\Answer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\AnswerRequest;
use App\Http\Services\Discussion\AnswerService;
use App\Http\Services\Discussion\QuestionService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TestController extends Controller
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
     * @var UserService
     */
    private $userService;

    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * @var string
     */
    private $answer = 'teacher.discussion.answer.';

    /**
     * AnswerController constructor.
     *
     * @param QuestionService $questionService
     * @param AnswerService $answerService
     * @param UserService $userService
     * @param DataTables $dataTable
     */
    public function __construct(
        QuestionService $questionService,
        AnswerService $answerService,
        UserService $userService,
        DataTables $dataTable
    )
    {
        $this->questionService = $questionService;
        $this->answerService = $answerService;
        $this->userService = $userService;
        $this->dataTable = $dataTable;
    }

    public function commentPageShow($question_id)
    {
        $question = $this->questionService->findOrFail($question_id);
        $user = $this->userService->findOrFail($question['user_id']);
        $answers = Answer::where('question_id', $question_id)->get();

        return view($this->answer . 'create', compact(['question', 'user', 'answers']));
    }

    public function saveComment(AnswerRequest $request, $question_id)
    {
        $answer = $request->validated();
        $answer = array_merge($answer, [
            'question_id' => $question_id,
            'user_id' => frontUser('id'),
            'ratings' => 5
        ]);

        $this->answerService->create($answer);

        return redirect()->route('teacher.comment.index', $question_id);
    }
}
