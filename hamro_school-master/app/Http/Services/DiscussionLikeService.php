<?php


namespace App\Http\Services;


use App\Entities\DiscussionLike;
use App\Services\General\BaseService;

class DiscussionLikeService extends BaseService
{
    public function model()
    {
        return DiscussionLike::class;
    }
}
