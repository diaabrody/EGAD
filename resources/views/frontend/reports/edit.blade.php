@extends('frontend.layouts.app')

@section('content')
<div class="container pt-5 pb-5">
    <div id="loading" style="display: none" ></div>
    <form method="post" enctype="multipart/form-data" action="/reports/{{$report->id}}" class="w-75 m-auto px-0 border p-4 bg-light formStyle">
        {{ csrf_field() }}

        {{ method_field('PUT') }}
<div class="row p-4 text-secondary">
 
  <div class="col-lg-4 col-md-6 col-sm-8">
          <div class="form-group">
            <img src="{{$report->photo}}"  id="image" class=" w-100 d-block mx-auto thumbnail mb-0"> 
          </div>

          <h4 class="form-group">
            <label for="photo" class="float-right">صوره المفقود</label>
            <input type="file" id="profile-img" name="photo" class="form-control" placeholder="ادخل الصوره" onchange="readURL(this)">
          </h4>

        
        </div>
  <div class="col-lg-8 float-right">
        <h4 class="form-group">
            <label for="name" class="float-right">اسم المفقود</label>
            <input type="text" name="name" class="form-control" placeholder=" " value="{{$report->name}}">
        </h4>
        
        
        <div class="row">
                            <div class="col mb-2">
                                <h4 class="form-group">
                                {{ html()->label(__('النوع'))->for('gender')->class('float-right ml-4') }}

                                    <div>
                                        @if($report->gender == 0)
                                        <input type="radio" name="gender" value="male" class="float-right" checked="checked"  /><span class="float-right mr-2 ml-3">ذكر</span>
                                        <input type="radio" name="gender" value="female" class="float-right"  />
                                        <span class="float-right mr-2">أنثي </span>
                                            @else
                                            <input type="radio" name="gender" value="male" class="float-right"   /><span class="float-right mr-2 ml-3">ذكر</span>
                                            <input type="radio" name="gender" value="female" class="float-right" checked="checked"  />
                                            <span class="float-right mr-2">أنثي </span>
                                            @endif
                                    </div>
                                </h4><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->


        <h4 class="form-group">

            <label for="age" class="float-right">العمر</label>
            <input type="number" name="age" class="form-control" min="1" placeholder="" value="{{$report->age}}">
        </h4>
        <div class="row">
                            <div class="col-12 col-md-6">
                                <h4 class="form-group">
                                    {{ html()->label(__('المدينة'))->for('city')->class('float-right') }}

                                 <select class="form-control" name="city" id="city" >
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->name }}" {{ $report->city == $city->name ? 'selected="selected"' : '' }}>{{ $city->name}}</option>
                                        @endforeach
                                    </select>
                                    </h4><!--form-group-->
                                </div><!--col-->
            
            <div class="col-12 col-md-6">
                                <h4 class="form-group">
                                {{ html()->label(__('المنطقة'))->for('area')->class('float-right') }}
                                <select name="area" id="region" class="form-control" >
                                    @foreach ($regions as $region)
                                            <option value="{{ $region->name }}" {{ $report->area == $region->name ? 'selected="selected"' : '' }}>{{ $region->name}}</option>
                                    @endforeach
                               </select>
                                    

                                </h4><!--form-group-->
                            </div><!--col-->
                            </div><!--row-->

                            
                       
        <h4 class="form-group">
            <label for="location" class="float-right">العنوان</label>
            <input type="text" name="location" class="form-control" placeholder="العنوان" id="autocomplete" value="{{$report->last_seen_at}}">
        </h4>
        @if ($report->type == "normal" || $report->type  == "quick")
            <h4 class="form-group">
                <label for="lost_since" class="float-right">منذ متي فقد</label>
                <input type="date"  name="lost_since" class="form-control" placeholder="" value="{{$report->lost_since}}">
            </h4>
        @else
            <h4 class="form-group">
                <label for="found_since" class="float-right">منذ متي وجد </label>
                <input type="date"  name="lost_since" class="form-control" placeholder="" value="{{$report->found_since}}">
            </h4>
        @endif


        <h4 class="form-group">
            <label for="special_sign" class="float-right">علامات مميزه</label>
            <textarea  name="special_sign" class="form-control" placeholder=" " {{$report->special_sign}}>{{$report->special_sign}}</textarea>
        </h4>


        <h4 class="form-group">
            <label for="reporter_phone_number" class="float-right">رقم تليفون المبلغ</label>
            <input type="text" name="reporter_phone_number" class="form-control" placeholder="" value="{{$report->reporter_phone_number}}">
        </h4>

        <h4 class="form-group">
            <label for="hair_color" class="float-right">لون الشعر</label>
            <input type="text" name="hair_color" class="form-control" placeholder="لون الشعر" value="{{$report->hair_color}}" >
        </h4>

        <h4 class="form-group">
            <label for="eye_color" class="float-right">لون العين</label>
            <input type="text" name="eye_color" class="form-control" placeholder="لون العين" value="{{$report->eye_color}}">
        </h4>

        <h4 class="form-group">
            <label for="height" class="float-right">طول القامه</label>
            <input type="number" name="height" class="form-control" placeholder="طول القامه" value="{{$report->height}}">
        </h4>

        <h4 class="form-group">
            <label for="weight" class="float-right">الوزن</label>
            <input type="number" name="weight" class="form-control" placeholder=" الوزن" value="{{$report->weight}}">
        </h4>


        <button type="submit" class="btn btn-lg  text-white font-weight-bold btn-primary w-25 float-left" onclick="displayloading()" >تعديل البلاغ</button>
    
     </div><!--row-->
<!--       btn-lg btn-block "-->
    
        
         <div style="clear:both"></div>
        </div>
    </form>

</div>
    <link rel="stylesheet" href="{{ URL::asset('css/loading-spinner.css') }}" />
    <script type="text/javascript" src="{{ URL::asset('js/location-spinner.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdGzflHLWnvZh1Ed3eHeW17SmIF2FUoe0&libraries=places&callback=initAutocomplete"
            async defer></script>

@endsection