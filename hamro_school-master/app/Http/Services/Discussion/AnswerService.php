<?php


namespace App\Http\Services\Discussion;


use App\Entities\Answer;
use App\Services\General\BaseService;

class AnswerService extends BaseService
{
    public function model()
    {
        return Answer::class;
    }

}
