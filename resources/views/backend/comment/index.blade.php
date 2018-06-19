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
                           
                            <th> Commented By </th>
                            <th> Report Id </th>
                            <th> Comment </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td><a href="/admin/auth/user/{{$comment->user_id}}"> {{ $userModel::getAuthor($comment->user_id)['name']}}</a></td>
                                <td> <a href="/admin/report/{{$comment->item_id}}">{{$comment->item_id}}</a></td>
                                <td> {{$comment->comment}}</td>
                                <td><div class="btn-group btn-group-sm" report="group" aria-label="Report Actions">
                                        <a href="/admin/comment/{{$comment->id}}/edit" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{__('buttons.general.crud.edit')}}"></i></a>
                                        <a href="/admin/comment/{{$comment->id}}/destroy"
			 data-method="delete"
			 data-trans-button-cancel="{{__('buttons.general.cancel')}}"
			 data-trans-button-confirm="{{__('buttons.general.crud.delete')}}"
			 data-trans-title="{{__('strings.backend.general.are_you_sure')}}"
			 class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="{{__('buttons.general.crud.delete')}}"></i></a> 
                                </div></td>
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
                        
                    </div>
                </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
