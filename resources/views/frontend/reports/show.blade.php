@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div>
<img src="{{ $report->photo }}" alt="Avatar" style="height:200px">
    <hr>   
        <p>Name: {{ $report->name }}</p>
        <p> Age:{{ $report->age }}</p>     
        <p> Lost Since : {{ $report->lost_since }}</p>
        <p>Last Seen At :{{ $report->last_seen_at }}</p>     
        <p>Last Seen On : {{ $report->last_seen_on }}</p>
        <p> Weight:{{ $report->weight }}</p>     
        <p>Height : {{ $report->height }}</p>
        <p> The Color Of Eye:{{ $report->eye_color }}</p>     
        <p> The Color Of Hair  : {{ $report->hair_color }}</p>
        <p> Special Sign:{{ $report->special_sign }}</p>      
    <hr>    
</div>
@if (Auth::user())
<form role="form"  method="post" action="/reports/comment/{{$report->id}}">
     {{ csrf_field() }}
     <label>Comment:</label>
     <input type="text" name="comment" class="form-control" placeholder="Write Comment">
     <br> 
     <input type="submit" class="btn btn-primary" value="Write Comment"/>
</form>
@endif

<hr>  
<h1>Comments</h1>
@foreach ($report->comments as $comment) 
   {{  $comment->text  }}
   {{  $comment->user->name }}
   <br>
@endforeach
@endsection