@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div class="row">
@foreach ($reports as $report)
<div class="card" style="width:300px">
<img src="{{ url($report->child->photo) }}" alt="Avatar" style="height:200px">
  <div class="container">
    <b>{{ $report->child->name }}</b>
    <hr>
    <a href="reports/{{ $report->id }}"  name="view" > اقرا المزيد</a>
  </div>
</div>
@endforeach
</div>
@endsection

