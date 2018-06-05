<?php

namespace App\Http\Controllers\Frontend\Report;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Report\StoreReportChildRequest;
use App\Http\Requests\Frontend\Report\UpdateReportChildRest;
use Illuminate\Http\Request;
use  App\Models\Report\Report;
use  App\Models\Comment\Comment;
use App\Repositories\Frontend\Report\ReportRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;

use App\Classes\Kairos;

class ReportsController extends Controller
{

    protected $reportRepository;

    protected  $Kairosobj;






    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
        $Kairos=new Kairos("7952fe76","840445d4dbb091739dbdf9fe85ddf3e4");

        $this->Kairosobj= $Kairos;



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


        if($request->status == "quick" || $request->status == "normal" )
        {
            $request->found_since = Null;
            $marker = $request->location;


            try {
                $lat = Mapper::location($marker)->getLatitude();
                $lng = Mapper::location($marker)->getLongitude();
            } catch (MapperSearchResultException $exception) {
                return redirect('map')->with('message', $exception->getMessage());
            }




        }
        else
        {
            $request->lost_since = Null;

            $lat=0;
            $lng=0;









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
             'last_seen_at' => $request->location,
              'location' => new Point($lat, $lng),

        ]);






        return redirect ('/reports/');

    }






    public function  edit($id)
    {

        $report=$this->reportRepository->findByid($id);

        return view("frontend.reports.edit")->with('report', $report);

    }





    public function update(UpdateReportChildRest  $request , $id)
    {

        $file=$request->file('photo');
        $report=$this->reportRepository->findByid($id);
        $input=$request->all();


        if($file)
        {
            $name=$file->getClientOriginalName();
            $input['photo']=time().$name;
            Storage::putFileAs(
                'public/childs', $request->file('photo'), time().$name
            );
        }

        else{
            $input['photo']=$report->photo;

        }

        if($report->type == "quick" || $report->type == "normal" )

        {

            $marker = $request->location;


            try {
                $lat = Mapper::location($marker)->getLatitude();
                $lng = Mapper::location($marker)->getLongitude();
            } catch (MapperSearchResultException $exception) {
                return redirect('map')->with('message', $exception->getMessage());
            }



        }

        else
        {

            $lat=0;
            $lng=0;

        }




        $this->reportRepository->updateById($id,[
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'special_sign'=>$request->special_sign,
            'photo'=>$input['photo'],
            'reporter_phone_number' => $request->reporter_phone_number,
             'lost_since'   => $request->lost_since,
            'found_since'   => $request->found_since,
            'height'   => $request->height,
            'weight'   => $request->weight,
            'eye_color'   => $request->eye_color,
            'hair_color'   => $request->hair_color,
            'last_seen_at' => $request->location,
            'location' => new Point($lat, $lng),

        ]);

        return redirect ('/reports/');


    }






    
    
}
