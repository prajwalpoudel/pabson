<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\TeacherRequest;
use App\Http\Requests\Teacher\TeacherUpdateRequest;
use App\Http\Services\User\SchoolService;
use App\Http\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TeacherProfileController extends Controller
{
    /**
     * @var string
     */
    private $profile = 'teacher.profile.';

    /**
     * @var UserService
     */
    private $userService;


    /**
     * TeacherProfileController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $teacher = frontUser();

        return view($this->profile . 'index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $teacher = $this->userService->findOrFail($id);

        return view($this->profile . 'edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TeacherUpdateRequest $request, $id)
    {
        $updateData = $request->validated();
        $this->userService->update($id, $updateData);

        return redirect()->route('teacher.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
