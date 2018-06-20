@extends('frontend.layouts.app')

@section('content')
   <div class="container mt-5 text-secondary">
    <ul class="nav nav-tabs form-header" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">الملف الشخصى</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">بلاغاتى</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">إعدادت الحساب</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">تغيير كلمة المرور</a>
        </li>
    </ul>

    <div class="tab-content mt-5 " id="myTabContent ">
        <div class="tab-pane  show active w-25 mx-auto mb-5 border-0" id="home" role="tabpanel" aria-labelledby="home-tab">
           
           <div class="card mb-3 border-0 text-secondary">
<!--     <div class="col-lg-12">      -->
  <img class=" img-thumbnail w-50 m-auto" src="{{ $logged_in_user->picture }}" id="image" style="border-radius:50%; height:auto;z-index:1;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <div class=" card-body bg-light border px-4 pb-4" style="height:auto;margin-top:-22px;padding-top:40px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    
    
    <ul class="text-justify">
                   
                    <li class="form-text mb-0"><i class="fas fa-user ml-3"></i>{{ $logged_in_user->name }}</li>
                    <li class="form-text mb-0 py-2"><i class="fas fa-envelope ml-3"></i>{{ $logged_in_user->email }}</li>
                    <li class="form-text mb-0"><i class="fas fa-mobile ml-4"></i>{{ $logged_in_user->phone_no }}</li>
                    <li class="form-text mb-0">{{ $logged_in_user->date_of_birth }}</li>
                    <li class="form-text mb-0 pt-2"><i class="fas fa-thumbtack ml-4"></i>{{ $logged_in_user->city}},{{ $logged_in_user->region}}</li>
<!--                    <h5 class="float-right mb-0 mr-5"></h5>-->
      </ul> 

            
  </div>
<!--            </div>  -->
</div>
        </div>        
        
        
        
        <div class="tab-pane  border w-75 mx-auto mb-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            @foreach ($reports as $report)
                <form class="w-100 m-auto  p-4 bg-light mb-3" >
                    <div class="float-right form-text mb-0">بتاريخ :{{ $report-> created_at}}</div>
                    <br><br>
                    <div class="row mt-3">
                        <div class="col-lg-12 float-right">

                            <div class="bg-white p-4">

                                <div class="media align-items-center">
                                    <img class="ml-3 float-right img-thumbnail" src="{{ $report->photo }}" alt="Avatar" style="width:90px;height:90px">
                                    <div class="media-body">
                                        <h5 class="mt-0  float-right form-header"> {{ $report->name }}</h5><br><br><br>
                                        <a href="/report/{{ $report->id }}/edit" class="btn  btn-primary font-weight-bold mt-2  float-right form-text text-white"> تعديل البلاغ </a>
                                    </div>

                                    <a href="/reports/{{ $report->id }}" class="text-primary form-text  mt-auto font-weight-bold">  قراءة المزيد</a>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div style="clear:both"></div>
                </form>

            @endforeach
        </div>
        
        
        
        <div class="tab-pane w-75 m-auto mb-5 pb-5 text-secondary " id="contact" role="tabpanel" aria-labelledby="contact-tab">
            {{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->id('editForm')->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
            <div class="row ">
                <div class="col">
                    <div class="form-group float-right">
                        {{ html()->label(__('الصورة الشخصية'))->for('avatar')->class('float-right form-text') }} <br>

                        <div class="float-right form-text">
                            <input type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} />  بدون صورة
                            <input type="radio" class="mr-4" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} /> ارفع صورة


                        </div>
                    </div><!--form-group-->

                    <div class="form-group" id="avatar_location">
                        {{ html()->file('avatar_location')->class('form-control') }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('الاسم الأول'))->for('first_name')->class('float-right form-text') }}

                        {{ html()->text('first_name')
                            ->class('form-control')
                            ->placeholder(__(''))
                            ->attribute('maxlength', 191)
                            ->required()
                            ->autofocus() }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('اسم العائلة'))->for('last_name')->class('float-right form-text') }}

                        {{ html()->text('last_name')
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
                        {{ html()->label(__('validation.attributes.frontend.email'))->for('email')->class('float-right form-text') }}

                        {{ html()->email('email')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.email'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('رقم الهاتف'))->for('phone_no')->class('float-right form-text') }}

                        {{ html()->text('phone_no')
                        ->class('form-control')
                        ->placeholder(__('Phone Number'))
                        ->required() }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('تاريخ الميلاد'))->for('date_of_birth')->class('float-right form-text') }}

                        {{ html()->date('date_of_birth')
                            ->class('form-control') }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ html()->label(__('المدينة'))->for('city')->class('float-right form-text') }}

                        <select class="form-control" name="city" id="city" >
                            @foreach ($cities as $city)
                                <option value="{{ $city->name }}" {{ $logged_in_user->city == $city->name ? 'selected="selected"' : '' }}>{{ $city->name}}</option>
                            @endforeach
                        </select>
                    </div><!--form-group-->
                </div><!--col-->



                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ html()->label(__('المنطقة'))->for('area')->class('float-right form-text') }}

                        <select name="region" id="region" class="form-control" >
                            @foreach ($regions as $region)
                                <option value="{{ $region->name }}" {{ $logged_in_user->region == $region->name ? 'selected="selected"' : '' }}>{{ $region->name}}</option>
                            @endforeach
                        </select>


                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('timezone'))->for('timezone')->class('float-right form-text') }}

                        <select name="timezone" id="timezone" class="form-control" required="required">
                            @foreach (timezone_identifiers_list() as $timezone)
                                <option value="{{ $timezone }}" {{ $timezone == $logged_in_user->timezone ? 'selected' : '' }} {{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
                            @endforeach
                        </select>
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group mb-0 clearfix">
                    <!--                {{ form_submit(__('labels.general.buttons.update')) }}-->
                        <input type="submit" class="btn btn-primary btn-lg btn-block main-btn  text-white font-weight-bold form-header" value="احفظ التعديلات">
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
            {{ html()->closeModelForm() }}
        </div>
        
        
        
        
        <div class="tab-pane  w-75 mx-auto mb-5" id="password" role="tabpanel" aria-labelledby="password-tab">
            {{ html()->form('PATCH', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}
            <div class="row ">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.old_password'))->for('old_password')->class('float-right form-text') }}

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
                        {{ html()->label(__('كلمة المرور الجديدة'))->for('password')->class('float-right form-text') }}

                        {{ html()->password('password')
                            ->class('form-control')
                            ->placeholder(__(''))
                            ->required() }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group form-text">
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
                        <input type="submit" class="btn btn-block btn-primary btn-lg text-white main-btn font-text font-weight-bold form-header" value="تحديث كلمة المرور">
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
            {{ html()->form()->close() }}

        </div>
    </div>
 </div>
@endsection()