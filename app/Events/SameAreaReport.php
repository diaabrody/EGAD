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

    public $users = [];

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($users)
    {
        $this->users = $users;

        Notification::create([
            'message'=>"a child has been lost in your area",
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
        $channels = [];

        foreach ($this->users as $user) {
            array_push($channels, new PrivateChannel('users.' . $user->id));
        }

        return $channels;
    }
}
