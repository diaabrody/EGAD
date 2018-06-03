@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. 'Comment Management')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                        Comment Managment
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.comment.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Type </th>
                            <th> User </th>
                            <th> Comment </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td> {{$comment->commentable_type}}</td>
                                <td> {{$comment->commentable_type}}</td>
                                <td> {{$comment->text}}</td>
                                <td>{!! $comment->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $comments->count() !!} comments total
                </div>
            </div><!--col-->

            <div class="col-5">
                    <div class="float-right">
                        {!! $comments->render() !!}
                    </div>
                </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
