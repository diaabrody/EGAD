@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div class="row mb-5">
    <div class="col-sm-10 details-card">
    <div class="card ">
  <div class="card-body">
  <div class="row">
  <div class="col-lg-8">
    <p class="card-text">اللإسم: {{ $report->name }}</p>
    <p class="card-text">السن: {{ $report->age }}</p>
    <p class="card-text">فقد منذ: {{ $report->lost_since }}</p>
    <p class="card-text">شوهد اخر مرة في: {{ $report->last_seen_at }}</p>
    <p class="card-text">الطول: {{ $report->height }}</p>
    <p class="card-text">الوزن: {{ $report->weight }}</p>
    <p class="card-text">لون العين: {{ $report->eye_color }}</p>
    <p class="card-text">لون الشعر: {{ $report->hair_color }}</p>
    <p class="card-text">علامات مميزة: {{ $report->special_sign }}</p>
    <div class="center-btn-parent">
        <a href="#" class="btn btn-secondary">للتواصل مع الأهل</a>
    </div>
    </div>
          <img src="{{ $report->photo }}" alt="avatar" class="img-fluid mb-3">
  </div>
    
     
  </div>
</div>
    </div>
</div>


<div class="row">
    <div class="col-sm-10 comments">
    @if (Auth::user())
<form role="form"  method="post" action="/reports/comment/{{$report->id}}">
     {{ csrf_field() }}
     <label>إكتب تعليق:</label>
     <textarea type="text" name="comment" class="form-control" rows="5" placeholder="إكتب تعليقك هنا"></textarea>
     <br> 
     <input type="submit" class="btn btn-secondary" value="إرسال التعليق"/>
</form>
@endif

<hr>  
<h1>التعليقات</h1>
@foreach ($report->comments as $comment) 
   {{  $comment->text  }}
   {{  $comment->user->name }}
   <br>
@endforeach

    </div>
</div>
@endsection