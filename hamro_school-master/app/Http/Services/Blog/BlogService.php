<?php


namespace App\Http\Services\Blog;


use App\Entities\Blog;
use App\Services\General\BaseService;

class BlogService extends BaseService
{
    public function model()
    {
        return Blog::class;
    }
}
