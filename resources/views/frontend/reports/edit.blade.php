@extends('frontend.layouts.app')

@section('content')
    <form method="post" enctype="multipart/form-data" action="/report/update/{{$report->id}}" class="w-75 m-auto px-0 border p-4 bg-light">
        {{ csrf_field() }}

        {{ method_field('PUT') }}
<div class="col-lg-8 float-right">
        <div class="form-group">
            <label for="name" class="float-right">اسم المفقود</label>
            <input type="text" name="name" class="form-control" placeholder=" " value="{{$report->name}}">
        </div>
        
        
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

<!--
        <div class="form-group">
            <label for="gender">نوع</label>
            <select name="gender" >
                @if($report->gender == 1)
                    <option value="0">ذكر</option>
                    <option value="1" selected>انثى</option>

                @else
                    <option value="0" selected>ذكر</option>
                    <option value="1" >انثى</option>
                  @endif


            </select>

        </div>
-->

        <div class="form-group">
            <label for="age" class="float-right">العمر</label>
            <input type="number" name="age" class="form-control" min="1" placeholder="" value="{{$report->age}}">
        </div>
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
        <div class="form-group">
            <label for="location" class="float-right">اين فقد</label>
            <input type="text" name="location" class="form-control" placeholder=""  value="{{$report->last_seen_at}}">
        </div>

        @if ($report->type == "normal" || $report->type  == "quick")
            <div class="form-group">
                <label for="lost_since" class="float-right">منذ متي فقد</label>
                <input type="date"  name="lost_since" class="form-control" placeholder="" value="{{$report->lost_since}}">
            </div>
        @else
            <div class="form-group">
                <label for="found_since" class="float-right">منذ متي وجد </label>
                <input type="date"  name="found_since" class="form-control" placeholder="" value="{{$report->found_since}}">
            </div>
        @endif


        <div class="form-group">
            <label for="special_sign" class="float-right">علامات مميزه</label>
            <textarea  name="special_sign" class="form-control" placeholder=" " {{$report->special_sign}}>{{$report->special_sign}}</textarea>
        </div>


        <div class="form-group">
            <label for="reporter_phone_number" class="float-right">رقم تليفون المبلغ</label>
            <input type="text" name="reporter_phone_number" class="form-control" placeholder="" value="{{$report->reporter_phone_number}}">
        </div>

        <div class="form-group">
            <label for="hair_color" class="float-right">لون الشعر</label>
            <input type="text" name="hair_color" class="form-control" placeholder="" value="{{$report->hair_color}}" >
        </div>

        <div class="form-group">
            <label for="eye_color" class="float-right">لون العين</label>
            <input type="text" name="eye_color" class="form-control" placeholder="" value="{{$report->eye_color}}">
        </div>

        <div class="form-group">
            <label for="height" class="float-right">طول القامه</label>
            <input type="number" name="height" class="form-control" placeholder="" value="{{$report->height}}">
        </div>

        <div class="form-group">
            <label for="weight" class="float-right">الوزن</label>
            <input type="number" name="weight" class="form-control" placeholder=" " value="{{$report->weight}}">
        </div>


        <button type="submit" class="btn btn-secondary btn-lg btn-block text-white font-weight-bold">تعديل البلاغ</button>
    
    
<!--       btn-lg btn-block "-->
    
        </div>
        <div class="col-lg-4">
          <div class="form-group" style="height:200px">
            <img src="{{$report->photo}}"  id="image" class="h-100 w-100 d-block mx-auto">
          </div>

          <div class="form-group">
            <label for="photo" class="float-right">صوره المفقود</label>
            <input type="file" id="profile-img" name="photo" class="form-control" placeholder="ادخل الصوره" >
          </div>

        
        </div>
        
         <div style="clear:both"></div>
    </form>

@endsection