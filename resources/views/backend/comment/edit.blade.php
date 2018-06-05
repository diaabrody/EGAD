@extends ('backend.layouts.app')

@section ('title', "Comment Management" . ' | ' ."Comment Edit")


@section('content')
    {{ html()->modelForm($comment,'PATCH', route('admin.comment.comment.update', $comment->id))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Comment Management 
                            <small class="text-muted">Comment Edit</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr />

                <div class="row mt-4 mb-4">
                    <div class="col">
                            <div class="form-group row">
                                    {{ html()->label('Report')->class('col-md-2 form-control-label')->for('commentable_id') }}
        
                                    <div class="col-md-10">
                                            <select name="commentable_id" id="commentable_id" class="form-control" required="required">
                                                @foreach ($reports as $report)
                                            <option value="{{ $report->id }}" {{ $report->id == $comment->commentable_id ? 'selected' : '' }} {{ $report->id == old('report->id') ? ' selected' : '' }}>{{$report->id}}</option>
                                                @endforeach
                                            </select>
                                        </div><!--col-->
                                </div><!--form-group-->
                                <div class="form-group row">
                                        {{ html()->label('Comment Body')->class('col-md-2 form-control-label')->for('text') }}
            
                                        <div class="col-md-10">
                                            {{ html()->textarea('text')
                                                ->class('form-control')
                                                ->placeholder('comment...')
                                                ->required()
                                                }}
                                        </div><!--col-->
                                    </div><!--form-group-->
                                
                            
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.comment.comment.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.update')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection