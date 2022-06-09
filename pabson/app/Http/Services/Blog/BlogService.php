<?php


namespace App\Http\Services\Blog;


use App\Http\Services\BaseService;
use App\Models\Blog;

class BlogService extends BaseService
{
    public function model()
    {
        return Blog::class;
    }
}
