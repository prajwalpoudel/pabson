<?php

namespace App\Http\Controllers\Teacher\Discussion;

use App\Constants\DiscussionStatusConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\DiscussionLikeService;
use App\Http\Services\DiscussionService;
use App\Http\Services\User\TeacherService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiscussionController extends Controller
{
    /**
     * @var DiscussionService
     */
    private $discussionService;
    /**
     * @var DiscussionLikeService
     */
    private $discussionLikeService;
    /**
     * @var TeacherService
     */
    private $teacherService;

    /**
     * DiscussionController constructor.
     * @param DiscussionService $discussionService
     * @param DiscussionLikeService $discussionLikeService
     * @param TeacherService $teacherService
     */
    public function __construct(
        DiscussionService $discussionService,
        DiscussionLikeService $discussionLikeService,
        TeacherService $teacherService
    )
    {
        $this->discussionService = $discussionService;
        $this->discussionLikeService = $discussionLikeService;
        $this->teacherService = $teacherService;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $teacher = $this->teacherService->query()->teacher(frontUser('id'))->with(['subjects'])->first();
        $subjects = $teacher->subjects()->pluck('subject_teacher.id');
        $discussions = $this->discussionService->query()->parent()->visible()->where('is_verified', DiscussionStatusConstant::APPROVED_ID)->with(['user', 'discussionSubjects.grade'])->withCount(['likes', 'comments' => function($query) {
            return $query->where('is_verified', DiscussionStatusConstant::APPROVED_ID);
        }, 'likes as owner_like' => function ($query) {
            return $query->where('user_id', frontUser('id'));
        }])->whereHas('subjects', function ($query) use ($subjects) {
            return $query->whereIn('subject_id', $subjects);
        })->paginate(6);

        return view('teacher.discussion.discussion.index', compact('discussions'));
    }

    /**
     * @param string $id
     * @return Factory|View
     */
    public function show(string $id)
    {
        $discussion = $this->discussionService->query()->with(['user'])->withCount(['likes', 'comments'  => function($query) {
            return $query->where('is_verified', DiscussionStatusConstant::APPROVED_ID);
        }, 'likes as owner_like' => function ($query) {
            return $query->where('user_id', frontUser('id'));
        }])->findOrFail( decrypt($id));

        $comments = $this->discussionService->query()->with('user')->where(function ($query) {
            return $query->where('is_verified', DiscussionStatusConstant::APPROVED_ID)->orWhere('user_id', frontUser('id'));
        })->where(['parent_id' => $discussion->id])->latest()->paginate(6);

        return view('teacher.discussion.discussion.show', compact(['discussion', 'comments']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function like(Request $request)
    {
        $discussion = $this->discussionService->findOrFail($request->input('discussion_id'));
        $discussionLike = $this->discussionLikeService->query()->ownerLike($request->input('discussion_id'), $request->input('user_id'))->first();
        if ($discussionLike) {
            $discussionLike->delete();
        } else {
            $discussion->likes()->create(['user_id' => $request->input('user_id')]);
        }

        return response()->json(['count' => $discussion->likes()->count(), 'owner_like' => $this->discussionService->query()->where('id', $request->input('discussion_id'))->withCount(['likes' => function ($query) use ($request) {
            return $query->where('user_id', $request->input('user_id'));
        }])->firstOrFail()->likes_count]);
    }
}
