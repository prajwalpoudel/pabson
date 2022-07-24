<?php

namespace App\Http\Controllers\Teacher\Discussion;

use App\Constants\DiscussionStatusConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Discussion\DiscussionRequest;
use App\Http\Services\DiscussionService;
use App\Http\Services\Grade\SubjectService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MyPostController extends Controller
{
    /**
     * @var SubjectService
     */
    private $subjectService;
    /**
     * @var DiscussionService
     */
    private $discussionService;

    /**
     * MyPostController constructor.
     * @param DiscussionService $discussionService
     * @param SubjectService $subjectService
     */
    public function __construct(
        DiscussionService $discussionService,
        SubjectService $subjectService
    )
    {
        $this->subjectService = $subjectService;
        $this->discussionService = $discussionService;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $discussions = $this->discussionService->where(['user_id' => frontUser('id')])->parent()->with(['user', 'discussionSubjects.grade'])->withCount(['likes', 'comments'  => function($query) {
            return $query->where('is_verified', DiscussionStatusConstant::APPROVED_ID);
        }, 'likes as owner_like' => function ($query) {
            return $query->where('user_id', frontUser('id'));
        }])->latest()->paginate(6);

        return view('teacher.discussion.myPost.index', compact('discussions'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $teacherSubjects = frontUser('teacher')->subjects()->pluck('subject_teacher.id');
        $subjects = $this->subjectService->query()->whereIn('id', $teacherSubjects)->pluck('name', 'id');

        return view('teacher.discussion.myPost.create', compact('subjects'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function store(DiscussionRequest $request)
    {
        $discussionData = array_merge(
            $request->except(['subject_id', '_token']),
            [
                'user_id' => frontUser('id')
            ]
        );
        DB::beginTransaction();
        $discussion = $this->discussionService->create($discussionData);
        foreach ($subjects = $request->input('subject_id') as $subject) {
            $discussion->subjects()->create(['subject_id' => $subject]);
        }
        DB::commit();

        return redirect()->route('teacher.my-post.index');
    }

    /**
     * @param string $id
     * @return Factory|View
     */
    public function edit(string $id)
    {
        $discussion = $this->discussionService->findOrFail(decrypt($id))->load('subjects');
        $discussionSubjects = $discussion->subjects->pluck('subject_id')->toArray();
        $teacherSubjects = frontUser('teacher')->load('subjects')->subjects()->pluck('subject_teacher.id');
        $subjects = $this->subjectService->query()->whereIn('id', $teacherSubjects)->pluck('name', 'id');

        return view('teacher.discussion.myPost.edit', compact('discussion', 'subjects', 'discussionSubjects'));
    }

    /**
     * @param DiscussionRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(DiscussionRequest $request, $id)
    {
        $discussion = $this->discussionService->findOrFail($id);
        DB::beginTransaction();
        $discussion->update($request->except(['subject_id', '_token']));
        if ($request->input('subject_id'))
            $discussion->subjects()->delete();
        foreach ($subjects = $request->input('subject_id') as $subject) {
            $discussion->subjects()->create(['subject_id' => $subject]);
        }
        DB::commit();

        return redirect()->route('teacher.my-post.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->discussionService->destroy($id);

        return redirect()->back();

    }
}
