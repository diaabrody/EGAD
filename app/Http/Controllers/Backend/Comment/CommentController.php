<?php

namespace App\Http\Controllers\Backend\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Report\Report;
use App\Models\Auth\User;
use App\Events\CommentsonReport;
use risul\LaravelLikeComment\Models\Comment;
use App\Repositories\Backend\Report\ReportRepository;
use App\Http\Requests\Backend\Comment\StoreCommentRequest;
use App\Http\Requests\Backend\Comment\UpdateCommentRequest;
use Auth;


class CommentController extends Controller
{


   
    public function index()
    {
        $userModel = config('laravelLikeComment.userModel');
        $comments= Comment::all();
        return view('backend.comment.index',['comments'=>$comments,'userModel'=>$userModel]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $reports= Report::all();
        return view('backend.comment.create',['reports'=>$reports]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $userId = Auth::user()->id;
    	$parent =0;
    	$commentBody = $request->text;
        $itemId = $request->commentable_id;

        $user = User::findOrFail($userId);;
        $userPic = $user['avatar'];
        if($userPic == 'gravatar'){
            $hash = md5(strtolower(trim($user['email'])));
            $userPic = "http://www.gravatar.com/avatar/$hash?d=identicon";
        }

        $comment = new Comment;
	    $comment->user_id = $userId;
	    $comment->parent_id = $parent;
	    $comment->item_id = $itemId;
	    $comment->comment = $commentBody;
        $comment->save();

        return redirect()->route('admin.comment.comment.index')->withFlashSuccess('Comment Created Succesfuly');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {    $reports= Report::all();
        return view('backend.comment.edit',['reports'=>$reports,'comment'=>$comment]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  Comment $comment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateCommentRequest $request, Comment $comment)
    // {
    //     $this->commentRepository->update($comment,$request->only(
    //         'commentable_id',
    //         'text'
            
    //     ));

    //     return redirect()->route('admin.comment.comment.index')->withFlashSuccess('Comment updated Succesfuly');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Comment $comment)
    {
        Comment::destroy($comment);;
        return redirect()->route('admin.comment.comment.index')->withFlashSuccess('Comment deleted Succesfuly');
        
    }
}
