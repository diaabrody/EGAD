<?php

namespace App\Repositories\Backend\Comment;

use Carbon\Carbon;
use Auth;
use App\Models\Comment\Comment;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;



/**
 * Class CommentRepository.
 */
class CommentRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Comment::class;
    }


    /**
     * @param array $data
     *
     * @return Report
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Comment
    {
        
        return DB::transaction(function () use ($data) {
            $comment = parent::create([
                'user_id'   => Auth::user()->id,
                'commentable_id'  => $data['commentable_id'],
                'commentable_type'  => 'report',
                'text'   => $data['text'],
               
            ]);
            return $comment;
        });
    }
  
   

}