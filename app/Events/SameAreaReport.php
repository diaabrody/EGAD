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

class SameAreaReport
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $report;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$report)
    {
        $this->user = $user;
        $this->report = $report;
        $this->message = "فُقد طفل فى منطقتك";
        
        Notification::create([
            'user_id'=>$user->id,
            'report_id'=>$report->id,
            'message'=>"فُقد طفل فى منطقتك",
            'photo' =>$report->photo,
            'is_seen'=>0,
            'type'=>'same area',
          ]);

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
