@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))


@section('content')
    {{ html()->form('POST', route('admin.report.report.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                                Report Management
                            <small class="text-muted">Create  Report</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr />

                <div class="row mt-4 mb-4">
                    <div class="col">
                            <div class="form-group row">
                                    {{ html()->label('Report Type')->class('col-md-2 form-control-label')->for('type') }}
        
                                    <div class="col-md-10">
                                            {{ html()->select('type')
                                            ->options([''=> "Select Report Type", 'quick' => 'quick', 'normal' => 'normal', 'found'=>'found'])
                                            ->class('form-control')->required() }}
        
                                    </div><!--col-->
                                </div><!--form-group-->
                                <div class="form-group row">
                                        {{ html()->label('Phone Number')->class('col-md-2 form-control-label')->for('reporter_phone_number') }}
                
                                            <div class="col-md-10">
                                                {{ html()->text('reporter_phone_number')
                                                    ->class('form-control')
                                                    ->placeholder('Cotact Phone Number')
                                                    ->attribute('maxlength', 11)
                                                    ->required()
                                                     }}
                                            </div><!--col-->
                                        </div><!--form-group-->
                        <div class="form-group row">
                            {{ html()->label('Name')->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder('Child Name')
                                    ->attribute('maxlength', 191)
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
                                    ->required()
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
                                     }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Special Sign')->class('col-md-2 form-control-label')->for('special_sign') }}

                            <div class="col-md-10">
                                {{ html()->text('special_sign')
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
                                        {{ html()->text('eye_color')
                                        ->class('form-control')
                                        ->placeholder('Eye Color')
                                            
                                            }}
                                    </div><!--col-->
                                </div><!--form-group-->

                                <div class="form-group row">
                                        {{ html()->label('Hair Color')->class('col-md-2 form-control-label')->for('hair_color') }}
            
                                        <div class="col-md-10">
                                            {{ html()->text('hair_color')
                                            ->class('form-control')
                                        ->placeholder('Hair Color')
                                                
                                                }}
                                        </div><!--col-->
                                    </div><!--form-group-->
                                        <div class="form-group row">
                                                {{ html()->label('City')->for('city')->class('col-md-2 form-control-label') }}
                                                <div class="col-md-10">                                            
                                                 <select class="form-control" name="city" id="city" required>
                                                <option > select city</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->name }}">{{ $city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                                {{ html()->label('Area')->for('area')->class('col-md-2 form-control-label') }}
                                                <div class="col-md-10">                                            
                                                        <select name="area" id="region" class="form-control" required >
                               
                                                            </select>
                                            </div><!--col-->
                                        </div><!--form-group-->
                                        <div class="form-group row">
                                            {{ html()->label('Lost Since')->class('col-md-2 form-control-label')->for('lost_since') }}
                
                                            <div class="col-md-10">
                                                {{ html()->date('lost_since')
                                                    ->class('form-control')
                                                    
                                                    
                                                    }}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            {{ html()->label('Found Since')->class('col-md-2 form-control-label')->for('found_since') }}
                
                                            <div class="col-md-10">
                                                {{ html()->date('found_since')
                                                    ->class('form-control')
                                                    
                                    
                                                    }}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            {{ html()->label('Last seen on')->class('col-md-2 form-control-label')->for('last_seen_on') }}
                
                                            <div class="col-md-10">
                                                {{ html()->date('last_seen_on')
                                                    ->class('form-control')
                                                    
                                                    
                                                    }}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                                {{ html()->label('Last Seen At')->class('col-md-2 form-control-label')->for('last_seen_at') }}
                    
                                                <div class="col-md-10">
                                                    {{ html()->text('last_seen_at')
                                                        ->class('form-control')
                                                        ->required()
                                                        
                                                        }}
                                                </div><!--col-->
                                            </div><!--form-group-->

                                        <div class="form-group row">
                                            {{ html()->label('Is Found?')->class('col-md-2 form-control-label')->for('is_found') }}
            
                                            <div class="col-md-10">
                                                <label class="switch switch-3d switch-primary">
                                                    {{ html()->checkbox('is_found')->class('switch-input') }}
                                                    <span class="switch-label"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
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