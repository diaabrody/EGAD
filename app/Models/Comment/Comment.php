<?php

namespace App\Models\Comment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment\Traits\Relationship\CommentRelationship;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'reports' => 'App\Models\Report\Report',
]);

class Comment extends Model
{
    use CommentRelationship;


    protected $fillable = [
        'user_id',
        'commentable_id',
        'commentable_type',
        'text',
    ];


}
