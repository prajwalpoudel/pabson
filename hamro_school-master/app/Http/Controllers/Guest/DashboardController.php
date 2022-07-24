<?php

namespace App\Http\Controllers\Guest;

use App\Entities\Blog;
use App\Http\Controllers\Controller;
use App\Http\Services\Blog\BlogService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @var BlogService
     */
    private $blogService;

    /**
     * DashboardController constructor.
     *
     * @param BlogService $blogService
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $blogs = $this->blogService->paginate(6);
        return view('guest.dashboard.index', compact('blogs'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $blog = $this->blogService->findOrFail($id);
        return view('guest.blog.show', compact('blog'));
    }
}
