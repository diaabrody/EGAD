@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div>
<img src="{{ url($report->child->photo) }}" alt="Avatar" style="height:200px">
    <hr>   
        <p>الاسم : {{ $report->child->name }}</p>
        <p> السن:{{ $report->child->age }}</p>     
        <p>تاريخ الفقد : {{ $report->child->lost_since }}</p>
        <p>اخر مرة شوفته فين:{{ $report->child->last_seen_at }}</p>     
        <p>تاريخ اخر مرة شوفته : {{ $report->child->last_seen_on }}</p>
        <p> الوزن:{{ $report->child->weight }}</p>     
        <p>الطول : {{ $report->child->height }}</p>
        <p>لون العين:{{ $report->child->eye_color }}</p>     
        <p>لون الشعر : {{ $report->child->hair_color }}</p>
        <p> علامة مميزة:{{ $report->child->special_sign }}</p>      
    <hr>    
</div>
@if (Auth::user())
<form role="form"  method="post" action="/reports/comment/{{$report->id}}">
     {{ csrf_field() }}
     <label>التعليق:</label>
     <input type="text" name="comment" class="form-control" placeholder="أكتب تعليق">
     <br> 
     <input type="submit" class="btn btn-primary" value="ضع تعليقا"/>
</form>
@endif

<hr>  
<h1>التعليقات</h1>
@foreach ($report->comments as $comment) 
   {{  $comment->text  }}
   {{  $comment->user->name }}
   <br>
@endforeach
@endsection