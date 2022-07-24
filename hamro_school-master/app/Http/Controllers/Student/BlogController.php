<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Services\Blog\BlogService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * @var string
     */
    private $blog = 'student.blog.';
    /**
     * @var BlogService
     */
    private $blogService;
    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * BlogController constructor.
     * @param BlogService $blogService
     * @param DataTables $dataTable
     */
    public function __construct(
        BlogService $blogService,
        DataTables $dataTable
    )
    {
        $this->blogService = $blogService;
        $this->dataTable = $dataTable;
    }

    /**
     * @param Request $request
     * @return Factory|View|void
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->getBlog() . 'index');
    }

    /**
     * @param int $id
     * @return Factory|View
     */
    public function show(string $id)
    {
        $blog = $this->blogService->findOrFail(decrypt($id));

        return view($this->getBlog() . 'show', compact('blog'));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable()
    {
        $blogs = $this->blogService->all();

        return $this->dataTable->of($blogs)
            ->editColumn('description', function ($blog) {
                return Str::limit(strip_tags($blog->description), 100);
            })
            ->addColumn('action', function ($blog) {
                $params = [
                    'route' => 'student.blog',
                    'id' => encrypt($blog->id),
                    'edit' => false,
                    'delete' => false,
                    'show' => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['description', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @return string
     */
    public function getBlog(): string
    {
        return $this->blog;
    }
}
