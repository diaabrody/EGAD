<?php

namespace App\Repositories\Frontend\Comment;

use Carbon\Carbon;
use App\Models\Comment\Comment;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


/**
 * Class CommentRepository.
 */
class CommentRepository extends BaseRepository
{
    public function model()
    {
        return Comment::class;
    }
    public function create(array $data)
    {
        
        return DB::transaction(function () use ($data) {
            $comment = parent::create([
                'user_id'   => $data['user_id'],
                'commentable_id'  => $data['commentable_id'],
                'commentable_type'  => 'reports',
                'text'   => $data['text'],
               
            ]);
            return $comment;
        });
    }
  
   

}