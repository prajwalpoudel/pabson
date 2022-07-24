<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Http\Services\User\SchoolService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PrincipalMessageController extends Controller
{
    /**
     * @var string
     */
    private $principal_message = 'school.principal_message.';

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
        return view($this->principal_message . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view($this->principal_message . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $schoolData = $request->validate([
            'principal_message' => 'required',
        ]);

        $this->schoolService->findOrFail(frontUser()->school->id)->update($schoolData);

        return redirect()->route('school.principal_message.index');
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
     * @return Application|Factory|Response|View
     */
    public function edit()
    {
        return view($this->principal_message . 'edit');
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
            'principal_message' => 'required',
        ]);

        $this->schoolService->findOrFail($id)->update($schoolData);

        return redirect()->route('school.principal_message.index');
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
