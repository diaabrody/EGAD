<?php

namespace App\Http\Controllers\Backend\Report;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Report\Report;
use App\Repositories\Backend\Report\ReportRepository;
use App\Http\Requests\Backend\Report\StoreReportRequest;
use App\Http\Requests\Backend\Report\UpdateReportRequest;
use App\Events\SameAreaReport;
use App\Models\Auth\User;
use  App\Models\City\City;
use  App\Models\Region\Region;


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
    {   $cities = City::all();
        return view('backend.report.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
      $report =  $this->reportRepository->create($request->only(
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
                    'city',
                    'area',
                    'type',
                    'reporter_phone_number',
                    'is_found'
                ));
        
                $users = User::where([
                    ['city','=',$report->city]
                   ,['region','=',$report->area]
                   ])-> get();
                
               foreach ($users as $user){
                   if(($user->id) != (Auth::user()->id) ){
                   event(new SameAreaReport($user,$report));
                   }
               }        

        return redirect()->route('admin.report.report.index')->withFlashSuccess('Report Created Succesfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  Report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('backend.report.show')
        ->withReport($report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {   
         $cities = City::all();
        $regions = Region::all();
        return view('backend.report.edit',compact('cities','regions'))
        ->withReport($report);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Report $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $updated_report = $this->reportRepository->update($report,$request->only(
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
                            'city',
                            'area',
                            'type',
                            'reporter_phone_number',
                            'is_found'
                        ));

        if($report->city != $updated_report->city || $report->area !=  $updated_report->area ){
            $users = User::where([
                        ['city','=', $updated_report->city],
                        ['region','=', $updated_report->area]
                        ])-> get();
        
            foreach ($users as $user){
                if(($user->id) != (Auth::user()->id) ){
                    event(new SameAreaReport($user, $updated_report));
                    }
            }
        }

        return redirect()->route('admin.report.report.index')->withFlashSuccess('Report Updated Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Report $report
     * @return \Illuminate\Http\Response
     */
    public function destroy( Report $report)
    {
        $this->reportRepository->deleteById($report->id);
        return redirect()->route('admin.report.report.index')->withFlashSuccess('Report Deleted Succesfuly');
        
    }
}
