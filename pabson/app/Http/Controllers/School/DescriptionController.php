<?php

namespace App\Http\Controllers\School;

use App\Entities\School;
use App\Http\Controllers\Controller;
use App\Http\Services\User\SchoolService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DescriptionController extends Controller
{
    /**
     * @var string
     */
    private $description = 'school.description.';

    /**
     * @var SchoolService
     */
    private $schoolService;

    /**
     * Create a new controller instance.
     *
     * @param SchoolService $schoolService
     */
    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view($this->description . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Http\Response|View
     */
    public function create()
    {
        return view($this->description . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $schoolData = $request->validate([
            'description' => 'required',
        ]);

        $this->schoolService->findOrFail(frontUser()->school->id)->update($schoolData);

        return redirect()->route('school.description.index');
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
     * @return Application|Factory|\Illuminate\Http\Response|View
     */
    public function edit()
    {
        return view($this->description . 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $schoolData = $request->validate([
            'description' => 'required',
        ]);

        $this->schoolService->findOrFail($id)->update($schoolData);

        return redirect()->route('school.description.index');
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
