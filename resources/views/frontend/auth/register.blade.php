@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('labels.frontend.auth.register_box_title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card w-75 m-auto bg-light">
                <div class="card-header font-weight-bold bg-white">
                    <strong class="float-right">
                        {{ __('انشاء حساب جديد') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('الاسم الأول'))->for('first_name')-> class('float-right') }}

                                    {{ html()->text('first_name')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191) }}
                                </div><!--col-->
                            </div><!--row-->

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('اسم العائلة'))->for('last_name')->class('float-right') }}

                                    {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('البريد الالكتروني'))->for('email')->class('float-right') }}

                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('رقم الهاتف'))->for('phone_no')->class('float-right') }}

                                    {{ html()->text('phone_no')
                                        ->class('form-control')

                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('المدينة'))->for('city')->class('float-right') }}

                                    {{ html()->text('city')
                                        ->class('form-control')
                                        ->required() }}
                                </div><!--col-->
                            </div><!--row-->

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                {{ html()->label(__('المنطقة'))->for('area')->class('float-right') }}

                                {{ html()->text('area')
                                    ->class('form-control')
                                    ->required()}}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                {{ html()->label(__('النوع'))->for('gender')->class('float-right ml-4') }}
                                
                                    <div>
                                        <input type="radio" name="gender" value="0" class="float-right" /><span class="float-right mr-2 ml-3">ذكر</span> 
                                        <input type="radio" name="gender" value="1" class="float-right"  /> 
                                        <span class="float-right mr-2">أنثي </span>
                                    </div> 
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->


                        

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('كلمة المرور'))->for('password')->class('float-right') }}

                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation')->class('float-right') }}

                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        @if (config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    {!! Captcha::display() !!}
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
<!--                                    {{ form_submit(__('labels.frontend.auth.register_button')) }}-->
                                     <input type="submit" class="btn btn-warning btn-lg btn-block text-white font-weight-bold" value="انشاء حساب جديد">
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}

              
                    
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection

@push('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endpush
