<?php

namespace App\Notifications\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

class CloseUsers extends Notification
{
    use Queueable;

    public  $childname;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($childname)
    {
        $this->childname=$childname;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }





    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
        'childname' => $this->childname
        ]);

    }












    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
