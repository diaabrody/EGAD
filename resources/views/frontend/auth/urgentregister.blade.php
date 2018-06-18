@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('labels.frontend.auth.register_box_title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header font-weight-bold bg-white">
                    <strong class="float-right ">
                        {{ __('تسجيل سريع') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body bg-light">
                    {{ html()->form('POST', route('frontend.auth.urgentregister.post'))->open() }}
                        

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
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
<!--                                    {{ form_submit(__('Report Now'))->class('btn btn-warning btn-lg btn-block text-white font-weight-bold') }}-->
                                    <input  class="btn btn-secondary btn-lg w-25 text-white font-weight-bold" type="submit" value= "تسجيل دخول">
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}

                    
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection


