@extends('frontend.layouts.app')

@section('content')
<div class="container pt-5 pb-5">
  <div id="loading" style="display: none" ></div>


<form method="post" enctype="multipart/form-data" action="/reports" class="w-75 m-auto px-0 border p-4 bg-light formStyle" >

    {{ csrf_field() }}
<div class="row p-4 text-secondary">
  
      <div class="col-lg-4 col-md-6 col-sm-8">
  <div class="form-control" style="height:200px">
      <img src="{{asset('img/frontend/profileImage.png')}}" id="image" class=" d-block mx-auto w-100">


  </div>
  <h4 class="form-group">
      <label for="photo" class="float-right py-2">صوره المفقود</label>
      <input type="file" name="photo" class="form-control" placeholder="ادخل الصوره" onchange="readURL(this);">

  </h4>

</div>    
 <div class="col-lg-8 float-right">
    <h4 class="form-group">
      <label for="name" class="float-right">اسم المفقود</label>
      <input type="text" name="name" class="form-control" placeholder="ادخل اسم المفقود">
    </h4>

                <div class="row">
                            <div class="col mb-2">
                                <h4 class="form-group">
                                {{ html()->label(__('النوع'))->for('gender')->class('float-right ml-4') }}

                                    <div>
                                        <input type="radio" name="gender" value="male" class="float-right" /><span class="float-right mr-2 ml-3">ذكر</span>
                                        <input type="radio" name="gender" value="female" class="float-right"  />
                                        <span class="float-right mr-2">أنثي </span>
                                    </div>
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->




<h4 class="form-group">
    <label for="age" class="float-right">العمر</label>
    <input type="number" name="age" class="form-control" min="1" placeholder="ادخل العمر">
</h4>
     
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
                                {{ html()->label(__('الحي'))->for('area')->class('float-right') }}

                                <select name="area" id="region" class="form-control" >
                               
                               </select>
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->     



  <h4 class="form-group">
    <label for="location" class="float-right">العنوان</label>
    <input type="text" name="location" class="form-control" placeholder="ادخل المنطقه" id="autocomplete" autocomplete="off"  >
  </h4>


    @if ($status == "normal" )
    <h4 class="form-group">
        <label for="lost_since" class="float-right">منذ متي فقد</label>
        <input type="date"  name="lost_since" class="form-control" placeholder="منذ متي فقد">
    </h4>
     @elseif($status == "found" )
         <h4 class="form-group">
             <label for="lost_since" class="float-right">منذ متي وجد </label>
             <input type="date"  name="lost_since" class="form-control" placeholder="منذ متي وجد">
         </h4>
    @endif

     @if ($status != "quick")
<h4 class="form-group">
    <label for="special_sign" class="float-right">علامات مميزة</label>
    <textarea  name="special_sign" class="form-control" placeholder="ادخل علامات مميزة"></textarea>
</h4>


<h4 class="form-group">
  <label for="reporter_phone_number" class="float-right">رقم تليفون المبلغ</label>
  <input type="text" name="reporter_phone_number" class="form-control" placeholder="ادخل رقم تليفون المبلغ">
</h4>

     @endif
  <input type="hidden" value="{{$status}}" name="status">

    <button type="submit" class="btn btn-primary btn-lg btn-block text-white font-weight-bold btnfSize" id="report" onclick="displayloading()">انشر بلاغ</button>



</div>



  <div style="clear:both"></div>
  </div>
</form>

</div>

{{--location-spinner--}}
<link rel="stylesheet" href="{{ URL::asset('css/loading-spinner.css') }}" />
<script type="text/javascript" src="{{ URL::asset('js/location-spinner.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdGzflHLWnvZh1Ed3eHeW17SmIF2FUoe0&libraries=places&callback=initAutocomplete"
        async defer></script>


@endsection
