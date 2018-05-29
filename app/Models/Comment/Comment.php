<?php

namespace App\Models\Comment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment\Traits\Relationship\CommentRelationship;

class Comment extends Model
{
    use CommentRelationship;


    protected $fillable = [
        'user_id',
        'report_id',
        'text',
    ];


}
