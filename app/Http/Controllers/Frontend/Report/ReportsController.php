<?php

namespace App\Http\Controllers\Frontend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Report\Report;
use  App\Models\Comment\Comment;
use App\Repositories\Frontend\Report\ReportRepository;
use App\Repositories\Frontend\Comment\CommentRepository;



class ReportsController extends Controller
{

    protected $reportRepository;
    protected $commentRepository;

    public function __construct(ReportRepository $reportRepository,CommentRepository $commentRepository)
    {
        $this->reportRepository = $reportRepository;
        $this->commentRepository = $commentRepository;
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

     public function comment(Request $req ,$id)
    { 
         $user_id=$this->reportRepository->findByid($id)->user->id;
         $comment = $this->commentRepository->create([
            'user_id'=>$user_id,
            'commentable_id'=>$id,
            'commentable_type'=>'reports',
            'text'=>$req->comment,      
         ]);
        return redirect ('/reports/'.$id);
    }

    
    
}
