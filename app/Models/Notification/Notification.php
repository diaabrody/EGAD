<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notification\Traits\Relationship\NotificationRelationship;



class Notification extends Model
{
    use NotificationRelationship;

    protected $fillable = [
        'user_id',
        'report_id',
        'photo',
        'message',
        'is_seen',
        'type',
    ];


}
