<?php

namespace App\Http\Controllers\Teacher\Discussion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discussion\CommentRequest;
use App\Http\Services\DiscussionLikeService;
use App\Http\Services\DiscussionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
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
     * DiscussionController constructor.
     * @param DiscussionService $discussionService
     * @param DiscussionLikeService $discussionLikeService
     */
    public function __construct(
        DiscussionService $discussionService,
        DiscussionLikeService $discussionLikeService
    )
    {
        $this->discussionService = $discussionService;
        $this->discussionLikeService = $discussionLikeService;
    }

    public function store(CommentRequest $request, $discussionID): RedirectResponse
    {

        $parent = $this->discussionService->findOrFail($discussionID);
        $commentData = array_merge($request->all(), [
            'user_id' => frontUser('id'),
            'parent_id' => $discussionID
        ]);

        DB::beginTransaction();
        $discussion = $this->discussionService->create($commentData);

        foreach ($subjects = $parent->subjects as $subject) {
            $discussion->subjects()->create(['subject_id' => $subject->subject_id]);
        }
        DB::commit();

        return redirect()->route('teacher.discussion.show', encrypt($discussionID));
    }

    public function edit($id)
    {
        $comment = $this->discussionService->findOrFail(decrypt($id));

        return view('teacher.discussion.comment.edit', compact('comment'));
    }

    public function update(CommentRequest $request, $id)
    {
        $comment = $request->validated();
        $discussion = $this->discussionService->findOrFail($id);

        DB::beginTransaction();
        $this->discussionService->update($id, $comment);
        DB::commit();

        return redirect()->route('teacher.discussion.show', encrypt($discussion->parent_id));
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
