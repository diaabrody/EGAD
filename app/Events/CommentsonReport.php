<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Comment\Comment;
use  App\Models\Notification\Notification;

class CommentsonReport implements ShouldBroadcast

{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    

    public $comment;
    public $message;
    


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
       
        $this->message="{$comment->user->name} Commented On your Report";

        Notification::create([
          'user_id'=>$comment->commentable->user_id,
          'report_id'=>$comment->commentable_id,
          'photo' =>$comment->user->picture,
          'message'=>"{$comment->user->name} Commented On your Report",
          'is_seen'=>0,
          'type'=>'Comments',
        ]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
       
        return ['report_'.$this->comment->commentable->user_id];
       
    }
    
}
