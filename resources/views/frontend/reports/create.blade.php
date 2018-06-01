@extends('frontend.layouts.app')

@section('content')

<form method="post" enctype="multipart/form-data" >
<div class="form-group">
<label for="name">اسم المفقود</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="form-group">
    <label for="gender">نوع</label>
    <select name="gender">
        <option value="ذكر">ذكر</option>
        <option value="انثى">انثى</option>
    </select>

</div>
<div class="form-group">
    <label for="photo">صوره المفقود</label>
    <input type="file" name="photo" class="form-control">
</div>

<div class="form-group">
    <label for="age">السن</label>
    <input type="number" name="age" class="form-control">
</div>

<div class="form-group">
    <label for="name">اين فقد</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="form-group">
    <label for="special_sign">علامات مميزه</label>
    <textarea  name="special_sign" class="form-control"></textarea>
</div>

<div class="form-group">
    <label for="phonenumber">رقم تليفون المبلغ</label>
    <input type="text" name="phonenumber" class="form-control">
</div>

<button type="submit" class="btn btn-success">انشر بلاغ</button>


</form>
@stop