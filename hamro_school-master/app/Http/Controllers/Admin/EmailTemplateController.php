<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\General\EmailTemplateService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class EmailTemplateController extends Controller
{
    /**
     * @var EmailTemplateService
     */
    private $emailTemplateService;
    /**
     * @var Datatables
     */
    private $dataTable;

    /**
     * EmailTemplateController constructor.
     * @param EmailTemplateService $emailTemplateService
     * @param Datatables $dataTable
     */
    public function __construct(EmailTemplateService $emailTemplateService, Datatables $dataTable)
    {
        $this->emailTemplateService = $emailTemplateService;
        $this->dataTable = $dataTable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->datatable($request);
        }

        return view('admin.emailTemplate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $emailTemplate = $this->emailTemplateService->findOrFail($id);

        return \view('admin.emailTemplate.edit', compact('emailTemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->emailTemplateService->update($id, $request->all());
        return redirect()->route('admin.email-template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->emailTemplateService->destroy($id);

        return redirect()->back();
    }

    /**
     * Display a listing of the cms pages for datatable
     *
     * @param  Request  $request
     * @return mixed
     * @throws \Exception
     */
    public function datatable(Request $request)
    {
        $emailTemplates = $this->emailTemplateService->all();

        return $this->dataTable->of($emailTemplates)
            ->addColumn('action', function ($emailTemplate) {
                $params = [
                    'route'  => 'admin.email-template',
                    'id'     => $emailTemplate->id,
                    'edit'   => true,
                    'delete' => true
                ];

                return view('admin.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
