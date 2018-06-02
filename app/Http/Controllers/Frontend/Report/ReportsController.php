<?php

namespace App\Http\Controllers\Frontend\Report;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Report\StoreReportChildRequest;
use Illuminate\Http\Request;
use  App\Models\Report\Report;
use  App\Models\Comment\Comment;
use App\Repositories\Frontend\Report\ReportRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;



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

   
    public function  create()
    {
        return view("frontend.reports.create");

    }



    public function  store(StoreReportChildRequest $request)
    {

        // insert into child
        //insert photo
        $file=$request->file('photo');
        $name=$file->getClientOriginalName();
        $input=$request->all();
        $input['photo']=time().$name;

        Storage::putFileAs(
            'public/childs', $request->file('photo'), time().$name
        );

        //insert other child info

        $child=$this->childRepository->create([
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'special_sign'=>$request->special_sign,
            'photo'=>$input['photo'],

        ]);
        // insert into locations

        $lat =  Mapper::location($input['location'])->getLatitude();
        $lng = Mapper::location($input['location'])->getLongitude();
        $data = [
            'name' => $input['location'],
            'location' => new Point($lat , $lng),
        ];
        $locationobject=$this->locationRepository->create($data);

        // insert into reports
        $this->reportRepository->create([
            'user_id'=>Auth::user()->id,
            'child_id'=>$child->id,
            'reporter_phone_number'=>$input['reporter_phone_number'],
            'type'=>'normal',
            'location_id'=>$locationobject->id

        ]);
        return redirect ('/reports/');

    }

    
    
}
