<?php

namespace App\Http\Controllers\Frontend\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use risul\LaravelLikeComment\Controllers\CommentController;
use App\Events\CommentsonReport;
use risul\LaravelLikeComment\Models\Comment;
use  App\Models\Report\Report;
use  App\Models\Auth\User;



class CommentsController extends CommentController
{
    
  /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function add(Request $request){
    	$userId = Auth::user()->id;
    	$parent = $request->parent;
    	$commentBody = $request->comment;
    	$itemId = $request->item_id;
        
        $user = self::getUser($userId);
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
    
        $report= Report::where('id','=',$itemId)->first();
        $report_user=$report->user;
        
        if(( $report_user->id) != (Auth::user()->id) ){
            event(new CommentsonReport($comment,$report_user,$user));
         }


	    $id = $comment->id;
    	return response()->json(['flag' => 1, 'id' => $id, 'comment' => $commentBody, 'item_id' => $itemId, 'userName' => $user['name'], 'userPic' => $userPic]);

    }

    /**
     *
     * @return void
     * @author 
     **/
    public static function getComments($itemId){
        $comments = Comment::where('item_id', $itemId)->orderBy('parent_id', 'asc')->get();

        foreach ($comments as $comment){
            $userId = $comment->user_id;
            $user = self::getUser($userId);
            $comment->name = $user['name'];
            $comment->email = $user['email'];
            $comment->url = $user['url'];
            if($user['avatar'] == 'gravatar'){
                $hash = md5(strtolower(trim($user['email'])));
                $comment->avatar = "http://www.gravatar.com/avatar/$hash?d=identicon";
            }
            else{
                $comment->avatar =$user['avatar'];
            }
        }

        return $comments;
    }
   
}

