@extends('frontend.layouts.app')

@section('title', app_name() . ' | Contact Us')

@section('content')
<div class="container pt-5 pb-5">
    <div class="row justify-content-center text-secondary " >
        <div class="col-lg-6 align-self-center">
            <div class="card formStyle p-4 bg-light" >
                <div class="card-header p-4 bg-white text-center font-weight-bold text-primary">
                   <h2> <strong>
                        {{ __('تواصل معنا') }}
                    </strong></h2>
                </div><!--card-header-->

                <div class="card-body p-4 bg-light">
                    {{ html()->form('POST', route('frontend.contact.send'))->open() }}
                        <div class="row">
                            <div class="col">
                                <h4 class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.name'))->for('name')->class('float-right') }}

                                    {{ html()->text('name')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <h4 class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email')->class('float-right') }}

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
                                    {{ html()->label(__('رقم الهاتف'))->for('phone')->class('float-right') }}

                                    {{ html()->text('phone')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row mb-3">
                            <div class="col">
                                <h4 class="form-group">
                                    {{ html()->label(__('الرسالة'))->for('message')->class('float-right') }}

                                    {{ html()->textarea('message')
                                        ->class('form-control')
                                        ->placeholder(__(''))
                                        ->attribute('rows', 3) }}
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                            <input type="submit" class="btn btn-primary btn-lg btn-block text-white font-weight-bold btnfSize main-btn" value="ارسال">                
<!--                                    {{ form_submit(__('labels.frontend.contact.button')) }}-->
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
                                    </div>
@endsection
