<?php


namespace App\Http\Services\User;


use App\Entities\Teacher;
use App\Services\General\BaseService;
use Illuminate\Database\Eloquent\Model;

class TeacherService extends BaseService
{
    /**
     * @return Model|string
     */
    public function model()
    {
        return Teacher::class;
    }

}
