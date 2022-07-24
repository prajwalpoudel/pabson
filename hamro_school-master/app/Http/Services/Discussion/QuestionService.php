<?php


namespace App\Http\Services\Discussion;


use App\Entities\Question;
use App\Services\General\BaseService;

class QuestionService extends BaseService
{
    public function model()
    {
        return Question::class;
    }
}
