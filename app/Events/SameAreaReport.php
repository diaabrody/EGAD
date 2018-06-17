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

class SameAreaReport implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $report;
    public $notify;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$report)
    {
        $this->user = $user;
        $this->report = $report;
        $this->message = "a child has been lost in your area";
        
        $notify= Notification::create([
            'user_id'=>$user->id,
            'report_id'=>$report->id,
            'message'=>"a child has been lost in your area",
            'photo' =>$report->photo,
            'is_seen'=>0,
            'type'=>'same area',
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
        return ['users.'.$this->user->id];
    }
}
