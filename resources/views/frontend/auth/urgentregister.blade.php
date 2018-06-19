@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('labels.frontend.auth.register_box_title'))

@section('content')
<div class="container">   
    <div class="row justify-content-center align-items-center py-5">
        <div class="col col-sm-8 align-self-center">
            <div class="card formStyle p-4 bg-light">
                <h2 class="card-header font-weight-bold bg-white text-center text-primary p-4">
                    <strong>
                        {{ __('تسجيل سريع') }}
                    </strong>
                </h2><!--card-header-->

                <div class="card-body bg-light">
                    {{ html()->form('POST', route('frontend.auth.urgentregister.post'))->open() }}
                        

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
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
<!--                                    {{ form_submit(__('Report Now'))->class('btn btn-warning btn-lg btn-block text-white font-weight-bold') }}-->
                                    <input  class="btn btn-primary btn-lg btn-block text-white font-weight-bold btnfSize main-btn" type="submit" value= "تسجيل دخول">
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}

                    
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-md-8 -->
    </div><!-- row -->
    </div>
@endsection


