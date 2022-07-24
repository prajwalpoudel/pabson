<?php

namespace App\Http\Controllers\Teacher;

use App\Entities\School;
use App\Entities\Teacher;
use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\BlogRequest;
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
     * @var string
     */
    private $blog = 'teacher.blog.';
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
    public function store(BlogRequest $request): RedirectResponse
    {
        $blog = $request->validated();

        $blog['slug'] = Str::slug($blog['name']);
        $blog['user_id'] = frontUser('id');

        if ($request->hasFile('file')) {
            $blog['file'] = $this->saveFile($blog);
        }

        frontUser('teacher')->blogs()->create($blog);

        return redirect()->route('teacher.blog.index');
    }

    /**
     * @param string $id
     * @return Factory|View
     */
    public function show(string $id)
    {
        $blog = $this->blogService->findOrFail(decrypt($id));

        return view($this->getBlog() . 'show', compact('blog'));
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

        frontUser('teacher')->blogs()->update($blog);

        return redirect()->route('teacher.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     * @throws \Exception
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

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable()
    {
        $blogs = frontUser('teacher')->blogs;

        return $this->dataTable->of($blogs)
            ->editColumn('description', function ($blog) {
                return Str::limit(strip_tags($blog->description), 100);
            })
            ->addColumn('action', function ($blog) {
                $params = [
                    'route' => 'teacher.blog',
                    'id' => encrypt($blog->id),
                    'edit' => true,
                    'delete' => true,
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

    /**
     * @param $blog
     * @return string
     */
    private function saveFile($blog): string
    {
        $filename = time() . '.' . $blog['file']->getClientOriginalExtension();

        return $blog['file']->storeAs('school/blog', $filename);
    }
}
