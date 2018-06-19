@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reports')

@section('content')
<div class="container pt-5 pb-5">
<div class="row mb-5">
    <div class="col-sm-10 details-card">
    <div class="card bg-danger fontFamily">
  <div class="card-body">
  <div class="container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-lg-8">
    <p class="card-text text-success"><span class="text-info">اللإسم:</span> {{ $report->name }}</p>
    <p class="card-text">السن: {{ $report->age }}</p>
    <p class="card-text">فقد منذ: {{ $report->lost_since }}</p>
    <p class="card-text">شوهد اخر مرة في: {{ $report->last_seen_at }}</p>
    <p class="card-text">الطول: {{ $report->height }}</p>
    <p class="card-text">الوزن: {{ $report->weight }}</p>
    <p class="card-text">لون العين: {{ $report->eye_color }}</p>
    <p class="card-text">لون الشعر: {{ $report->hair_color }}</p>
    <p class="card-text">علامات مميزة: {{ $report->special_sign }}</p>
    <div class="center-btn-parent">
        <a href="#" class="btn btn-primary">للتواصل مع الأهل</a>
    </div>
    </div>
         <div style="background-image: url('{{ $report->photo }}');" class="col-lg-4 col-md-12 col-sm-12 card-img-top my-img">
         </div>
  </div>
  </div>
  </div>
</div>
    </div>
</div>
</div>
@include('laravelLikeComment::like', ['like_item_id' => $report->id])
@include('laravelLikeComment::comment', ['comment_item_id' =>  $report->id ])

@endsection