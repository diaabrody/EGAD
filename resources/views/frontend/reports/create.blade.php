@extends('frontend.layouts.app')

@section('content')
<h1>create report</h1>


<div id="loading" style="display: none" ></div>

<form method="post" enctype="multipart/form-data" action="/report/save" >
    {{ csrf_field() }}

    <div class="form-group">
<label for="name"  >اسم المفقود</label>
    <input type="text" name="name" class="form-control" placeholder="ادخل اسم المفقود" >
</div>

<div class="form-group">
    <label for="gender">نوع</label>
    <select name="gender">
        <option value="0">ذكر</option>
        <option value="1">انثى</option>
    </select>

</div>

<div class="form-group">
    <label for="photo">صوره المفقود</label>
    <input type="file" name="photo" class="form-control" placeholder="ادخل الصوره" >
</div>

<div class="form-group">
    <label for="age">العمر</label>
    <input type="number" name="age" class="form-control" min="1" placeholder="ادخل العمر">
</div>

<div class="form-group">
    <label for="location">اين فقد</label>
    <input type="text" name="location" class="form-control" placeholder="ادخل المنطقه والمحافظه" id="autocomplete"  >
</div>


    @if ($status == "normal" || $status == "quick")
    <div class="form-group">
        <label for="lost_since">منذ متي فقد</label>
        <input type="date"  name="lost_since" class="form-control" placeholder="منذ متي فقد">
    </div>

    @endif


<div class="form-group">
    <label for="special_sign">علامات مميزه</label>
    <textarea  name="special_sign" class="form-control" placeholder="ادخل علامات مميزه"></textarea>
</div>


<div class="form-group">
    <label for="reporter_phone_number">رقم تليفون المبلغ</label>
    <input type="text" name="reporter_phone_number" class="form-control" placeholder="ادخل رقم تليفون المبلغ">
</div>

    <input type="hidden" value="{{$status}}" name="status">

<button type="submit" class="btn btn-success" id="report-create">انشر بلاغ</button>


</form>


<script type="text/javascript" src="{{ URL::asset('js/location-spinner.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOukh8jofbCBMBKRE6XhSKwTUtmgF7Wp0&libraries=places&callback=initAutocomplete"
            async defer></script>

<link rel="stylesheet" href="{{ URL::asset('css/loading-spinner.cssody7') }}" />




@endsection