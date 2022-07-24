<?php

namespace App\Http\Controllers\Front;

use App\Constants\DiscussionStatusConstant;
use App\Http\Controllers\Controller;
use App\Http\Services\DiscussionService;
use App\Http\Services\Grade\SubjectService;
use App\Http\Services\User\SchoolService;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @var SchoolService
     */
    private $schoolService;

    /**
     * @var DiscussionService
     */
    private $discussionService;

    private $subjectService;
    /**
     * HomeController constructor.
     * @param SchoolService $schoolService
     * @param DiscussionService $discussionService
     */
    public function __construct(
        SchoolService $schoolService,
        DiscussionService $discussionService,SubjectService $subjectService
    )
    {
        $this->schoolService = $schoolService;
        $this->discussionService = $discussionService;
        $this->subjectService = $subjectService;
    }

    /**
     * @return Factory|View
     */
    public function index() {
        $schools = $this->schoolService->query()->whereHas('user', function ($query) {
            $query->where('is_verified', true);
        })->with('user')->get();

        // $discussions = $this->discussionService->query()->parent()
        //     ->where('is_verified', DiscussionStatusConstant::APPROVED_ID)
        //     ->with(['user', 'discussionSubjects.grade'])
        //     ->get();
        $subjects = $this->subjectService->query()->with('grade')->inRandomOrder()->limit(40)->get();
        $grades = $subjects->map(function($subject){
            return $subject->grade;
        });
        $grades= $grades->unique();
        return view('front.home.index', compact(['schools','subjects','grades']));
    }

    /**
     * @param string $id
     * @return Factory|View
     */
    public function schoolDetail(string $id) {
        $school = $this->schoolService->findOrFail(decrypt($id))->load(['province', 'district', 'municipality']);

        return view('front.home.school.detail.index', compact('school'));
    }

    public function comingSoon() {
        return view('front.coming-soon');
    }
}
