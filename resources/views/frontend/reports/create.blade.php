@extends('frontend.layouts.app')

@section('content')

  <div id="loading" style="display: none" ></div>


<form method="post" enctype="multipart/form-data" action="/report/save" class="w-75 m-auto px-0 border p-4 bg-light" >

    {{ csrf_field() }}
 <div class="col-lg-8 float-right">
    <div class="form-group">
<label for="name" class="float-right">اسم المفقود</label>
    <input type="text" name="name" class="form-control" placeholder="ادخل اسم المفقود">

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



<div class="form-group">
    <label for="age" class="float-right">العمر</label>
    <input type="number" name="age" class="form-control" min="1" placeholder="ادخل العمر">
</div>
     
<div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('المدينة'))->for('location')->class('float-right') }}

                                    {{ html()->text('city')
                                        ->class('form-control')
                                        ->required() }}
                                </div><!--col-->
                            </div><!--row-->

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                {{ html()->label(__('الحي'))->for('location')->class('float-right') }}

                                {{ html()->text('area')
                                    ->class('form-control')
                                    ->required()}}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->     



     <div class="form-group">
    <label for="location" class="float-right">العنوان</label>
    <input type="text" name="location" class="form-control" placeholder="ادخل المنطقه" id="autocomplete">

</div>


    @if ($status == "normal" || $status == "quick")
    <div class="form-group">
        <label for="lost_since" class="float-right">منذ متي فقد</label>
        <input type="date"  name="lost_since" class="form-control" placeholder="منذ متي فقد">
    </div>
    @endif


<div class="form-group">
    <label for="special_sign" class="float-right">علامات مميزة</label>
    <textarea  name="special_sign" class="form-control" placeholder="ادخل علامات مميزة"></textarea>
</div>


<div class="form-group">
    <label for="reporter_phone_number" class="float-right">رقم تليفون المبلغ</label>
    <input type="text" name="reporter_phone_number" class="form-control" placeholder="ادخل رقم تليفون المبلغ">
</div>

    <input type="hidden" value="{{$status}}" name="status">
      <button type="submit" class="btn btn-secondary btn-lg btn-block text-white font-weight-bold" id="report">انشر بلاغ</button>


</div>

<div class="col-lg-4">
    <div class="form-control" style="height:200px">
        <img src="{{asset('img/frontend/profileImage.png')}}" id="image" class="h-100 d-block mx-auto">


    </div>
    <div class="form-group">
        <label for="photo" class="float-right">صوره المفقود</label>
        <input type="file" name="photo" class="form-control" placeholder="ادخل الصوره" onchange="readURL(this);">

    </div>

</div>

    <div style="clear:both"></div>
</form>






@endsection