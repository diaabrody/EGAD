<?php

namespace App\Http\Controllers\Frontend\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Report\Report;
use  App\Models\Comment\Comment;
use App\Repositories\Frontend\Report\ReportRepository;
use App\Repositories\Frontend\Comment\CommentRepository;
use Illuminate\Support\Facades\Storage;


class CommentsController extends Controller
{

    protected $reportRepository;
    protected $commentRepository;


    public function __construct(ReportRepository $reportRepository,CommentRepository $commentRepository )
    {
        $this->reportRepository = $reportRepository;
        $this->commentRepository = $commentRepository;

    }

 
     public function create(Request $req ,$id)
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


