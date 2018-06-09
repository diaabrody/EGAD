<?php

namespace App\Http\Controllers\Frontend\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Notification\Notification;
use Illuminate\Support\Facades\Storage;




class NotificationsController extends Controller
{

    public function update()
    { 
        $notifications = Notification :: all();
        foreach ($notifications as $notification)
        {
            $notification -> update([
            'is_seen'=>1,
         ]);
         $notification->save();
        }
        return $notifications;

    }
}

