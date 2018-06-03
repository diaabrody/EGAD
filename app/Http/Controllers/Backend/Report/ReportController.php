<?php

namespace App\Http\Controllers\Backend\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Report\Report;
use App\Repositories\Backend\Report\ReportRepository;
use App\Http\Requests\Backend\Report\StoreReportRequest;



class ReportController extends Controller
{

    /**
     * @var ReportRepository
     */
    protected $reportRepository;

    /**
     * ReportController constructor.
     *
     * @param ReportRepository $reportRepository
     */
    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.report.index')
        ->withReports($this->reportRepository->orderBy('id', 'asc')
        ->paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $this->reportRepository->create($request->only(
            'name',
            'age',
            'photo',
            'gender',
            'special_sign',
            'height',
            'weight',
            'eye_color',
            'hair_color',
            'lost_since',
            'found_since',
            'last_seen_at',
            'last_seen_on',
            'type',
            'reporter_phone_number',
            'is_found'
        ));

        return redirect()->route('admin.report.report.index')->withFlashSuccess('Report Created Succesfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
