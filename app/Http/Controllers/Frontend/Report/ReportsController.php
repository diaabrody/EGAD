<?php

namespace App\Http\Controllers\Frontend\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Report\StoreReportChildRequest;
use App\Repositories\Frontend\Child\ChildRepository;
use Illuminate\Http\Request;
use  App\Models\Report\Report;
use  App\Models\Comment\Comment;
use App\Repositories\Frontend\Report\ReportRepository;
use App\Repositories\Frontend\Comment\CommentRepository;
use Illuminate\Support\Facades\Storage;


class ReportsController extends Controller
{

    protected $reportRepository;
    protected $commentRepository;
    protected $childRepository;

    public function __construct(ReportRepository $reportRepository,CommentRepository $commentRepository , ChildRepository $childRepository)
    {
        $this->reportRepository = $reportRepository;
        $this->commentRepository = $commentRepository;
        $this->childRepository = $childRepository;
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






        // insert into reports



        return redirect ('/reports/');

    }

    
    
}
