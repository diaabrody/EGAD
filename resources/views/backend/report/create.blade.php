@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))


@section('content')
    {{ html()->form('POST', route('admin.report.report.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            {{ __('labels.backend.access.users.management') }}
                            <small class="text-muted">{{ __('labels.backend.access.users.create') }}</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr />

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label('Name')->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder('Child Name')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        {{ html()->label('Age')->class('col-md-2 form-control-label')->for('age') }}

                            <div class="col-md-10">
                                {{ html()->text('age')
                                    ->class('form-control')
                                    ->placeholder('Child age')
                                    ->attribute('maxlength', 2)
                                     }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Gender')->class('col-md-2 form-control-label')->for('gender') }}

                            <div class="col-md-10">
                                    {{ html()->select('gender')->options(['' => "Select Gender", '0' => 'male', '1' => 'female'])->class('form-control')->required() }}

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Photo')->class('col-md-2 form-control-label')->for('photo') }}

                            <div class="col-md-10">
                                {{ html()->file('photo')
                                    ->class('form-control')
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Special Signs')->class('col-md-2 form-control-label')->for('special_signs') }}

                            <div class="col-md-10">
                                {{ html()->text('special_signs')
                                    ->class('form-control')
                                    ->placeholder('Ex: Birth mark')
                                    }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                                {{ html()->label('Height')->class('col-md-2 form-control-label')->for('height') }}
    
                                <div class="col-md-10">
                                    {{ html()->text('height')
                                        ->class('form-control')
                                        ->placeholder('Height')
                                        }}
                                </div><!--col-->
                            </div><!--form-group-->
                            <div class="form-group row">
                                    {{ html()->label('Weight')->class('col-md-2 form-control-label')->for('weight') }}
        
                                    <div class="col-md-10">
                                        {{ html()->text('weight')
                                            ->class('form-control')
                                            ->placeholder('Weight')
                                            }}
                                    </div><!--col-->
                                </div><!--form-group-->
                                <div class="form-group row">
                                        {{ html()->label('Eye Color')->class('col-md-2 form-control-label')->for('eye_color') }}
            
                                        <div class="col-md-10">
                                            {{ html()->select('eye_color')->options([ '' => "Select Eye Color",'black' => 'black', 'brown' => 'brown','blue'=>'blue','green'=>'green','gray'=>'gray','hazal'=>'hazal'])
                                                ->class('form-control')
                                                
                                                }}
                                        </div><!--col-->
                                    </div><!--form-group-->

                                    <div class="form-group row">
                                            {{ html()->label('Hair Color')->class('col-md-2 form-control-label')->for('hair_color') }}
                
                                            <div class="col-md-10">
                                                {{ html()->select('hair_color')->options([ '' => "Select hair Color",'black' => 'black', 'brown' => 'brown','blue'=>'blue','green'=>'green','gray'=>'gray','hazal'=>'hazal'])
                                                    ->class('form-control')
                                                    
                                                    }}
                                            </div><!--col-->
                                        </div><!--form-group-->
                            
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.report.report.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection