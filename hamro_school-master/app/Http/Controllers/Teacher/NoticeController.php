<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Services\Notice\NoticeService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class NoticeController extends Controller
{
    /**
     * @var string
     */
    private $notice = 'teacher.notice.';
    /**
     * @var NoticeService
     */
    private $noticeService;
    /**
     * @var DataTables
     */
    private $dataTable;

    /**
     * NoticeController constructor.
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
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request) {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view($this->getNotice() . 'index');
    }

    /**
     * @param string $id
     * @return Factory|View
     */
    public function show(string $id) {
        $notice = $this->noticeService->findOrFail(decrypt($id));

        return view($this->getNotice() . 'show', compact('notice'));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function datatable() {
        $teacher_schools = frontUser('teacher')->schools()->pluck('school_teacher.id');
        $notices = $this->noticeService->query()->wherein('school_id', $teacher_schools)->get();

        return $this->dataTable->of($notices)
            ->editColumn('description', function ($notice) {
                return Str::limit(strip_tags($notice->description), 100);
            })
            ->addColumn('action', function ($notice) {
                $params = [
                    'route' => 'teacher.notice',
                    'id' => encrypt($notice->id),
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
    public function getNotice(): string
    {
        return $this->notice;
    }
}
