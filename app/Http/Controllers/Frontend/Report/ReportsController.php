<?php

namespace App\Http\Controllers\Frontend\Report;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Report\StoreReportChildRequest;
use App\Repositories\Frontend\Child\ChildRepository;
use Illuminate\Http\Request;
use  App\Models\Report\Report;
use  App\Models\Comment\Comment;
use App\Repositories\Frontend\Report\ReportRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\Repositories\Frontend\Location\LocationRepository;
use phpDocumentor\Reflection\Types\Null_;


class ReportsController extends Controller
{

    protected $reportRepository;


    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;


    }

    public function index()
    {
        $reports=$this->reportRepository->retriveAll();
        return view('frontend.reports.index',[
            'reports' => $reports
        ]);
    }
    

    public function show($id)
    {
        $report =$this->reportRepository->findByid($id);
        return view('frontend.reports.show',[
            'report' => $report
        ]);
    }







   
    public function  create($status)
    {


        if($status == "quick" || $status=="found" || $status=="normal")
        {
            return view("frontend.reports.create")->with('status', $status);

        }

        else
        {
            return abort(404);
        }

    }








    public function  store(StoreReportChildRequest $request)
    {


        $file=$request->file('photo');
        $name=$file->getClientOriginalName();
        $input=$request->all();
        $input['photo']=time().$name;
        Storage::putFileAs(
            'public/childs', $request->file('photo'), time().$name
        );

        $found=0;

        if($request->status == "quick" || $request->status == "normal" )
        {
            $request->found_since = Null;

        }
        else
        {
            $request->lost_since = Null;
            $found=1;


        }

            $this->reportRepository->create([
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'special_sign'=>$request->special_sign,
            'photo'=>$input['photo'],
            'user_id' => Auth::user()->id,
            'type' => $request->status,
             'reporter_phone_number' => $request->reporter_phone_number,
             'lost_since'   => $request->lost_since,
             'found_since'   => $request->found_since,
             'is_found'   => $found,


        ]);








        return redirect ('/reports/');

    }

    
    
}
