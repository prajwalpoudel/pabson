<?php

namespace App\Http\Controllers\Moderator;

use App\Constants\DiscussionStatusConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\DiscussionService;
use App\Http\Services\User\ModeratorService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class DiscussionController extends Controller
{
    /**
     * @var DiscussionService
     */
    private $discussionService;
    /**
     * @var DataTables
     */
    private $dataTable;
    /**
     * @var ModeratorService
     */
    private $moderatorService;

    /**
     * DiscussionController constructor.
     * @param DiscussionService $discussionService
     * @param ModeratorService $moderatorService
     * @param DataTables $dataTable
     */
    public function __construct(
        DiscussionService $discussionService,
        ModeratorService $moderatorService,
        DataTables $dataTable
    )
    {
        $this->discussionService = $discussionService;
        $this->dataTable = $dataTable;
        $this->moderatorService = $moderatorService;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function pending(Request $request) {
        if ($request->wantsJson()) {
            return $this->datatable($request, DiscussionStatusConstant::PENDING_ID);
        }

        return view('moderator.discussion.index');
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function approved(Request $request) {
        if ($request->wantsJson()) {
            return $this->datatable($request, DiscussionStatusConstant::APPROVED_ID);
        }

        return view('moderator.discussion.index');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function show($id) {
        $discussion = $this->discussionService->query()->with('user')->findOrFail(decrypt($id));

        return view('moderator.discussion.show', compact(['discussion']));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse|void
     */
    public function update(Request $request, $id) {
        if($request->input('is_verified') == true) {
            $approvedBy = frontUser('id');
        }
        else {
            $approvedBy = null;
        }
        $updateData = array_merge(
            $request->except(['_token']),
            [
                'approved_by_id' => $approvedBy
            ]);
        $discussion = $this->discussionService->findOrFail($id);
        $discussion->update($updateData);
        if ($request->ajax()) {
            return;
        }

        return redirect()->route('moderator.discussion.pending');
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws Exception
     */
    private function datatable(Request $request, $status = DiscussionStatusConstant::PENDING_ID)
    {
        $moderator = $this->moderatorService->query()->moderator(frontUser('id'))->with(['subjects'])->first();
        $subjects = $moderator->subjects()->pluck('moderator_subject.subject_id');
        $discussions = $this->discussionService->query()->visible()->with(['user'])->where('is_verified', $status)->where(function ($query) {
            return $query->where('approved_by_id', frontUser('id'))->orWhere('approved_by_id', null);
        })->whereHas('subjects', function ($query) use ($subjects) {
            return $query->whereIn('subject_id', $subjects);
        })->get();


        return $this->dataTable->of($discussions)
            ->addColumn('action', function ($discussion) {
                $params = [
                    'route'  => 'moderator.discussion',
                    'id'     => encrypt($discussion->id),
                    'edit'   => false,
                    'delete' => false,
                    'show'   => true,
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->editColumn('description', function ($discussion) {
                return Str::limit($discussion->description, 200, ('...'));
            })
            ->addColumn('status', function ($discussion) {
                $id = $discussion->id;
                $url = route('moderator.discussion.update', $discussion->id);
                $name = 'is_verified';
                $tableName = 'discussion-table';
                $checked = false;
                $disabled = false;
                if($discussion->is_verified == 1) {
                    $checked = true;
                    $disabled = false;
                }
                return view('general.switch', compact('name', 'tableName', 'disabled', 'checked', 'url'));
            })
            ->rawColumns(['action', 'description', 'status'])
            ->addIndexColumn()
            ->make(true);
    }

}
