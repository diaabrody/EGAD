<?php

namespace App\Http\Controllers\Frontend\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Report\Report;
use App\Models\Comment\Comment;
use App\Repositories\Frontend\Report\ReportRepository;
use App\Repositories\Frontend\Comment\CommentRepository;
use App\Http\Requests\Frontend\Comment\StoreComment;
use Illuminate\Support\Facades\Storage;
use App\Events\CommentsonReport;



class CommentsController extends Controller
{

    protected $commentRepository;


    public function __construct(CommentRepository $commentRepository )
    {
        $this->commentRepository = $commentRepository;

    }

     public function create(StoreComment $req ,$id)
    { 
         

         $comment = $this->commentRepository->create([
            'user_id'=>Auth::user()->id,
            'commentable_id'=>$id,
            'commentable_type'=>'reports',
            'text'=>$req->text,      
         ]);

         $comment->save();

         if(($comment->commentable->user->id) != (Auth::user()->id) ){
             
            event(new CommentsonReport($comment));
         }
         
        return redirect ('/reports/'.$id);
    }
}


