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
     * HomeController constructor.
     * @param SchoolService $schoolService
     */
    public function __construct(
        SchoolService $schoolService
    )
    {
        $this->schoolService = $schoolService;
    }

    /**
     * @return Factory|View
     */
    public function index() {
        $schools = $this->schoolService->query()->whereHas('user', function ($query) {
            $query->where('is_verified', true);
        })->with('user')->get();

        return view('front.home.index', compact(['schools']));
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
