<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notification\Traits\Relationship\NotificationRelationship;
use Illuminate\Database\Eloquent\Relations\Relation;


class Notification extends Model
{
    use NotificationRelationship;


    protected $fillable = [
        'user_id',
        'comment_id',
        'type',
    ];


}
