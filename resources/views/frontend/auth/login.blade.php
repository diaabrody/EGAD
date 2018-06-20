@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('labels.frontend.auth.login_box_title'))

@section('content')
<div class="container">
<div class="row justify-content-center align-items-center text-secondary py-5">
    <div class="col col-sm-8 align-self-center">
        <div class="card w-75 m-auto bg-light formStyle p-4">
            <h2 class="card-header bg-white font-weight-bold text-center text-primary p-4">
                <strong>
                    {{ __('تسجيل دخول') }}
                </strong>
            </h2><!--card-header-->

            <div class="card-body">
                {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
                 
                <div class="row">
                    <div class="col">
                        <h4 class="form-group">
                        {{ html()->label(__('البريد الالكتروني او رقم الهاتف'))->for('email')->class('float-right') }}
                            
                        {{ html()->text('email')
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
                            {{ html()->label(__('كلمة المرور'))->for('password')->class('float-right') }}

                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(__(''))
                                ->required() }}
                        </h4><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

               <div class="row mb-3">
                    <div class="col">
                        <h5 class="form-group">
<!--                            <div class="checkbox">-->
                                 {{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('تذكر بياناتي'))->for('remember')->class('float-right') }}
<!--                            </div>-->
                        </h5><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group clearfix ">
<!--                            {{ form_submit(__('تسجيل دخول')) }}-->
                    <input type="submit" class="btn btn-primary float-left btn-lg btn-block text-white font-weight-bold btnfSize main-btn mb-3" value="تسجيل دخول">
                            
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="row">
                    <div class="col">
                        <h5 class="form-group text-center">
                            <a href="{{ route('frontend.auth.password.reset') }}" class="text-secondary">{{ __('هل نسيت كلمة المرور؟') }}</a>
                        </h5><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
                {{ html()->form()->close() }}


         
            </div><!--card body-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
 </div> 
@endsection
