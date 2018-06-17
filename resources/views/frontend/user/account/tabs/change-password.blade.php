@extends('frontend.layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col col-sm-10 align-self-center">
            <div class="card">
                <div class="card-header font-weight-bold">
                @include('frontend.user.account')
                    <strong class="float-right">
                        {{ __('تغيير كلمة المرور') }}
                    </strong>
                </div>

                <div class="card-body px-5">
                
{{ html()->form('PATCH', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.old_password'))->for('old_password')->class('float-right') }}

                {{ html()->password('old_password')
                    ->class('form-control')
                    ->placeholder(__(''))
                    ->autofocus()
                    ->required() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('كلمة المرور الجديدة'))->for('password')->class('float-right') }}

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

    <div class="row">
        <div class="col">
            <div class="form-group mb-0 clearfix">
<!--                {{ form_submit(__('labels.general.buttons.update') . ' ' . __('validation.attributes.frontend.password')) }}-->
                <input type="submit" class="btn btn-warning btn-lg btn-block text-white font-weight-bold" value="تحديث كلمة المرور">
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
{{ html()->form()->close() }}

</div><!--card body-->
            </div><!-- card -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->
@endsection