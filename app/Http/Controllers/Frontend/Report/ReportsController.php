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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\RedirectResponse;

use App\Classes\Kairos;

class ReportsController extends Controller
{

    protected $reportRepository;

    protected  $Kairosobj;

    protected  $face_id ;
    protected  $report_id;
    protected  $found_childs = [];






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

            //save image
        $file=$request->file('photo');
        $name=$file->getClientOriginalName();
        $input=$request->all();
       $imagename= time().$name;
        Storage::putFileAs(
            'public/childs/', $request->file('photo'), $imagename
        );

        $image = $request->file('photo')->path();  // your base64 encoded
        $base64 = base64_encode(file_get_contents($image));

        $gallery_name = 'newbranch4';
        $argumentArray =  [
            "image" => $base64 ,
            "gallery_name" => $gallery_name
        ];

        if($request->status == "quick" || $request->status == "normal" )
        {

           $this->checkImageByAI($argumentArray);

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
            $this->checkImageByAI($argumentArray);



            $request->lost_since = Null;

            $lat=0;
            $lng=0;



        }


            $this->reportRepository->create([
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'special_sign'=>$request->special_sign,
            'photo'=>$imagename,
            'user_id' => Auth::user()->id,
            'type' => $request->status,
             'reporter_phone_number' => $request->reporter_phone_number,
             'lost_since'   => $request->lost_since,
             'found_since'   => $request->found_since,
             'last_seen_at' => $request->location,
              'location' => new Point($lat, $lng),
              'face_id' =>$this->face_id

        ]);

        if(count($this->found_childs) > 0)
        {
            $foundchilds=json_encode($this->found_childs);

        return Redirect::route('frontend.report.founded')->with( ['childs' => $foundchilds] );

          //  return view("frontend.reports.founded")->with(['childs' => $this->found_childs] );


        }








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



private  function checkImageByAI($argumentArray)
{


    $response   = $this->Kairosobj->recognize($argumentArray);
    $response = json_decode($response);
    if(!isset($response->images[0]))
    {
        $image_status ="failure";
    }

    else
    {
        $image_status=$response->images[0]->transaction->status;

    }


    if($image_status == "success")
    {

        $candidates= $response->images[0]->candidates;


       foreach ($candidates as $candidate)
       {

           $report_found=$this->reportRepository->selectByFaceID($candidate->face_id);

           if ($report_found && $report_found->id && $report_found->user_id != Auth::user()->id)
           {
             //  $this->found_child_id=$report_found->id;
               array_push($this->found_childs, $report_found);


           }

       }


           $subject_id = time();
           $argumentArray["subject_id"]=strval($subject_id);
           $response   = $this->Kairosobj->enroll($argumentArray);
           $response = json_decode($response);
           $this->face_id=$response->face_id;


    }

    else{
        $subject_id = time();
        $argumentArray["subject_id"]=strval($subject_id);
        $response   = $this->Kairosobj->enroll($argumentArray);
        $response = json_decode($response);
        $this->face_id=$response->face_id;


    }


}


public function childFound()

{

    $childs=Session::get('childs');
    $childs=json_decode($childs);
    return view("frontend.reports.founded")->with('childs' , $childs);
  //  return view("frontend.reports.founded");


}

    
    
}
