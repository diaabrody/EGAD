<?php

namespace App\Http\Controllers\Backend\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Report\Report;
use App\Models\Auth\User;
use App\Repositories\Backend\Comment\CommentRepository;
use App\Repositories\Backend\Report\ReportRepository;
use App\Http\Requests\Backend\Comment\StoreCommentRequest;
use App\Http\Requests\Backend\Comment\UpdateCommentRequest;


class CommentController extends Controller
{


    /**
     * @var CommentRepository
     */
    protected $commentRepository;

    /**
     * CommentController constructor.
     *
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.comment.index')
        ->withComments($this->commentRepository->orderBy('id', 'asc')
        ->paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ReportRepository $reportRepository)
    {
        return view('backend.comment.create')->withReports($reportRepository->get(['id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $this->commentRepository->create($request->only(
            'commentable_id',
            'text'
            
        ));

        return redirect()->route('admin.comment.comment.index')->withFlashSuccess('Comment Created Succesfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment,ReportRepository $reportRepository)
    {
        return view('backend.comment.edit')
        ->withComment($comment)->withReports($reportRepository->get(['id']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $this->commentRepository->update($comment,$request->only(
            'commentable_id',
            'text'
            
        ));

        return redirect()->route('admin.comment.comment.index')->withFlashSuccess('Comment updated Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->commentRepository->deleteById($id);
        return redirect()->route('admin.comment.comment.index')->withFlashSuccess('Comment deleted Succesfuly');
        
    }
}
