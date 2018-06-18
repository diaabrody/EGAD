<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use  App\Models\Notification\Notification;

class CommentsonReport implements ShouldBroadcast

{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    

    public $comment;
    public $report_user;
    public $message;
    public $notify;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($comment,$report_user,$user)
    {
      
        $this->comment = $comment;
        $this->report_user = $report_user;

        $this->message=" على البلاغ الخاص بك{$user['name']} علق";

        $notify=Notification::create([
          'user_id'=>$report_user->id,
          'report_id'=>$comment->item_id,
          'photo' =>$report_user->picture,
          'message'=>" على البلاغ الخاص بك {$user['name']} علق",
          'is_seen'=>0,
          'type'=>'Comments',
        ]);

        $this->notify=$notify;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['report_'.$this->report_user->id];  
    }
    
}
