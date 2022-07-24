<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\NoticeRequest;
use App\Http\Services\Notice\NoticeService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class NoticeController extends Controller
{
    /**
     * @var NoticeService
     */
    private $noticeService;

    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * @var string
     */
    private $notice = 'school.notice.';

    /**
     * SchoolController constructor.
     *
     * @param NoticeService $noticeService
     * @param DataTables $dataTable
     */
    public function __construct(
        NoticeService $noticeService,
        DataTables $dataTable
    )
    {
        $this->noticeService = $noticeService;
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
        return view($this->notice . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view($this->notice . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NoticeRequest $request
     * @return RedirectResponse
     */
    public function store(NoticeRequest $request)
    {
        $notice = array_merge(
            $request->validated(),
            [
                'slug' => Str::slug($request['title']),
                'school_id' => frontUser('school')->id
            ]
        );

        if($image = $request->file('image')) {
            $notice = $this->saveImage($image, $notice);
        }
        $this->noticeService->create($notice);

        return redirect()->route('school.notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show(string $id)
    {
        $notice = $this->noticeService->findOrFail(decrypt($id));

        return view($this->notice . 'show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit(string $id)
    {
        $notice = $this->noticeService->findOrFail(decrypt($id));

        return view($this->notice . 'edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NoticeRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(NoticeRequest $request, $id)
    {
        $notice = $request->validated();

        if($notice['title']) {
            $notice['slug'] = Str::slug($notice['title']);
        }

        if ($image = $request->file('image')) {
            $notice = $this->noticeService->findOrFail($id);
            // delete file if already exists at the path.
            if (Storage::exists($notice->image)) {
                Storage::delete($notice->image);
            }
            // get new file path
            $notice = $this->saveImage($image, $notice);
        }
        $this->noticeService->update($id, $notice);

        return redirect()->route('school.notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(string $id)
    {
        $notice = $this->noticeService->findOrFail(decrypt($id));
        // delete file if already exists at the path.
        if (Storage::exists($notice->image)) {
            Storage::delete($notice->image);
        }
        $notice->delete();

        return redirect()->back();
    }

    private function datatable(Request $request)
    {
        $notices = $this->noticeService->all();

        return $this->dataTable->of($notices)
            ->addColumn('action', function ($notice) {
                $params = [
                    'route' => 'school.notice',
                    'id' => encrypt($notice->id),
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
     *
     * @param $notice
     * @return string
     */
    private function saveImage($image, $storeData)
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();

        $storeData = array_merge(
            $storeData,
            [
                'image' => Storage::putFileAs('school/notice', $image, $image_name)
            ]
        );

        return $storeData;
    }
}
