@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('labels.frontend.auth.register_box_title'))

@section('content')
   <div class="container">
    <div class="row justify-content-center align-items-center py-5">
        <div class="col col-sm-8 align-self-center">
            <div class="card w-75 m-auto bg-light formStyle p-4">
                <h2 class="card-header font-weight-bold bg-white text-primary text-center p-4">
                    <strong >
                        {{ __('انشاء حساب جديد') }}
                    </strong>
                </h2><!--card-header-->

                <div class="card-body ">
                    {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h4 class="form-group">
                                    {{ html()->label(__('الاسم الأول'))->for('first_name')-> class('float-right') }}

                                    {{ html()->text('first_name')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191) }}
                                </h4><!--col-->
                            </div><!--row-->

                            <div class="col-12 col-md-6">
                                <h4 class="form-group">
                                    {{ html()->label(__('اسم العائلة'))->for('last_name')->class('float-right') }}

                                    {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191) }}
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <h4 class="form-group">
                                    {{ html()->label(__('البريد الالكتروني'))->for('email')->class('float-right') }}

                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <h4 class="form-group">
                                    {{ html()->label(__('رقم الهاتف'))->for('phone_no')->class('float-right') }}

                                    {{ html()->text('phone_no')
                                        ->class('form-control')

                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h4 class="form-group">
                                    {{ html()->label(__('المدينة'))->for('city')->class('float-right') }}

                                    
                                    <select class="form-control" name="city" id="city" >
                                    <option > اختر المدينة</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->name }}">{{ $city->name}}</option>
                                        @endforeach
                                    </select>

                                </h4><!--col-->
                            </div><!--row-->

                            <div class="col-12 col-md-6">
                                <h4 class="form-group">
                                {{ html()->label(__('المنطقة'))->for('region')->class('float-right') }}

                                <select name="region" id="region" class="form-control" >
                               
                                </select>
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                

                        <div class="row">
                            <div class="col">
                                <h4 class="form-group">
                                {{ html()->label(__('النوع'))->for('gender')->class('float-right ml-4') }}
                                
                                    <div>
                                        <input type="radio" name="gender" value="0" class="float-right" /><span class="float-right mr-2 ml-3">ذكر</span> 
                                        <input type="radio" name="gender" value="1" class="float-right"  /> 
                                        <span class="float-right mr-2">أنثي </span>
                                    </div> 
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->


                        

                        <div class="row">
                            <div class="col">
                                <h4 class="form-group">
                                    {{ html()->label(__('كلمة المرور'))->for('password')->class('float-right') }}

                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->required() }}
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <h4 class="form-group">
                                    {{ html()->label(__('تأكيد كلمة المرور'))->for('password_confirmation')->class('float-right') }}

                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->required() }}
                                </h4><!--form-group-->
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
                                     <input type="submit" class="btn btn-primary btn-lg btn-block text-white font-weight-bold btnfSize main-btn" value="انشاء حساب جديد">
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}

              <div class="row">
                        <div class="col">
                            <div class="text-center">
                                {!! $socialiteLinks !!}
                            </div>
                        </div><!--/ .col -->
                    </div><!-- / .row -->
                    
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-md-8 -->
    </div><!-- row -->
</div>    
@endsection

@push('after-scripts')

    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endpush
