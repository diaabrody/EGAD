@extends('frontend.layouts.app')

@section('content')
<h1>edit report</h1>
    <form method="post" enctype="multipart/form-data" action="/report/update/{{$report->id}}" >
        {{ csrf_field() }}

        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="name">اسم المفقود</label>
            <input type="text" name="name" class="form-control" placeholder="ادخل اسم المفقود" value="{{$report->name}}">
        </div>

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

        <div class="form-group">
            <img src="{{$report->photo}}" width="300px" height="300px" id="image">
        </div>

        <div class="form-group">
            <label for="photo">صوره المفقود</label>
            <input type="file" id="profile-img" name="photo" class="form-control" placeholder="ادخل الصوره" >
        </div>
        


        <div class="form-group">
            <label for="age">العمر</label>
            <input type="number" name="age" class="form-control" min="1" placeholder="ادخل العمر" value="{{$report->age}}">
        </div>

        <div class="form-group">
            <label for="location">اين فقد</label>
            <input type="text" name="location" class="form-control" placeholder="ادخل المنطقه والمحافظه"  value="{{$report->last_seen_at}}">
        </div>

        @if ($report->type == "normal" || $report->type  == "quick")
            <div class="form-group">
                <label for="lost_since">منذ متي فقد</label>
                <input type="date"  name="lost_since" class="form-control" placeholder="منذ متي فقد" value="{{$report->lost_since}}">
            </div>
        @else
            <div class="form-group">
                <label for="found_since">منذ متي وجد </label>
                <input type="date"  name="found_since" class="form-control" placeholder="منذ متي وجد" value="{{$report->found_since}}">
            </div>
        @endif


        <div class="form-group">
            <label for="special_sign">علامات مميزه</label>
            <textarea  name="special_sign" class="form-control" placeholder="ادخل علامات مميزه" {{$report->special_sign}}>{{$report->special_sign}}</textarea>
        </div>


        <div class="form-group">
            <label for="reporter_phone_number">رقم تليفون المبلغ</label>
            <input type="text" name="reporter_phone_number" class="form-control" placeholder="ادخل رقم تليفون المبلغ" value="{{$report->reporter_phone_number}}">
        </div>

        <div class="form-group">
            <label for="hair_color">لون الشعر</label>
            <input type="text" name="hair_color" class="form-control" placeholder="لون الشعر" value="{{$report->hair_color}}" >
        </div>

        <div class="form-group">
            <label for="eye_color">لون العين</label>
            <input type="text" name="eye_color" class="form-control" placeholder="لون العين" value="{{$report->eye_color}}">
        </div>

        <div class="form-group">
            <label for="height">طول القامه</label>
            <input type="number" name="height" class="form-control" placeholder="طول القامه" value="{{$report->height}}">
        </div>

        <div class="form-group">
            <label for="weight">الوزن</label>
            <input type="number" name="weight" class="form-control" placeholder=" الوزن" value="{{$report->weight}}">
        </div>


        <button type="submit" class="btn btn-success">تعديل البلاغ</button>

    </form>













@endsection