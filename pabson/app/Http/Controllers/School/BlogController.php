<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\BlogRequest;
use App\Http\Services\Blog\BlogService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * @var BlogService
     */
    private $blogService;

    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * @var string
     */
    private $blog = 'school.blog.';

    /**
     * BlogController constructor.
     *
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
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->blog . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view($this->blog . 'create');
    }

    /**
     * Store a newly created blog post in storage.
     *
     * @param BlogRequest $request
     * @return RedirectResponse
     */
    public function store(BlogRequest $request)
    {
        $blog = $request->validated();

        $blog['slug'] = Str::slug($blog['name']);
        $blog['user_id'] = frontUser('id');

        if ($request->hasFile('file')) {
            $blog['file'] = $this->saveFile($blog);
        }

        frontUser('school')->blogs()->create($blog);

        return redirect()->route('school.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function show(string $id)
    {
        $blog = $this->blogService->findOrFail(decrypt($id));

        return view($this->blog . 'show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|Response|View
     */
    public function edit(string $id)
    {
        $blog = $this->blogService->findOrFail(decrypt($id));

        return view($this->blog . 'edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(BlogRequest $request, int $id): RedirectResponse
    {
        $blog = $request->validated();

        $blog['slug'] = Str::slug($blog['name']);

        if ($request->hasFile('file')) {
            $oldData = $this->blogService->findOrFail($id);

            // delete file if already exists at the path.
            if (Storage::exists($oldData->file)) {
                Storage::delete($oldData->file);
            }
            $blog['file'] = $this->saveFile($blog);
        }

        frontUser('school')->blogs()->update($blog);

        return redirect()->route('school.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $blog = $this->blogService->findOrFail(decrypt($id));
        // delete file if already exists at the path.
        if (Storage::exists($blog->file)) {
            Storage::delete($blog->file);
        }

        $blog->delete();

        return redirect()->back();
    }

    private function datatable(Request $request)
    {
        $blogs = frontUser('school')->blogs;

        return $this->dataTable->of($blogs)
            ->addColumn('action', function ($blog) {
                $params = [
                    'route' => 'school.blog',
                    'id' => encrypt($blog->id),
                    'edit' => true,
                    'delete' => true,
                    'show' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @param $blog
     * @return string
     */
    private function saveFile($blog)
    {
        $filename = time() . '.' . $blog['file']->getClientOriginalExtension();

        return $blog['file']->storeAs('school/blog', $filename);
    }
}
