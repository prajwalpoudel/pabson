<?php


namespace App\Http\Services\Notice;


use App\Entities\Notice;
use App\Services\General\BaseService;

class NoticeService extends BaseService
{
    public function model()
    {
        return Notice::class;
    }
}
