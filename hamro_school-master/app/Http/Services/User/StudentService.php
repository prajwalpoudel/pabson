<?php


namespace App\Http\Services\User;


use App\Entities\Student;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Model;

class StudentService extends BaseService
{
    /**
     * @return Model|string
     */
    public function model()
    {
        return Student::class;
    }
}
