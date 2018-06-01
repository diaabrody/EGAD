@extends('frontend.layouts.app')

@section('content')

<form method="post" enctype="multipart/form-data" action="/report/save" >
    {{ csrf_field() }}

    <div class="form-group">
<label for="name">اسم المفقود</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="form-group">
    <label for="gender">نوع</label>
    <select name="gender">
        <option value="1">ذكر</option>
        <option value="0">انثى</option>
    </select>

</div>
<div class="form-group">
    <label for="photo">صوره المفقود</label>
    <input type="file" name="photo" class="form-control">
</div>

<div class="form-group">
    <label for="age">العمر</label>
    <input type="number" name="age" class="form-control" min="1">
</div>

<div class="form-group">
    <label for="location">اين فقد</label>
    <input type="text" name="location" class="form-control">
</div>

<div class="form-group">
    <label for="special_sign">علامات مميزه</label>
    <textarea  name="special_sign" class="form-control"></textarea>
</div>

<div class="form-group">
    <label for="reporter_phone_number">رقم تليفون المبلغ</label>
    <input type="text" name="reporter_phone_number" class="form-control">
</div>

<button type="submit" class="btn btn-success">انشر بلاغ</button>


</form>
@stop