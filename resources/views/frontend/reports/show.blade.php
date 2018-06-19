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
          <h2> <span id="foundspan" style="color: blue ; display:none" > هذا الطفل وجد  </span></h2>
      </div>

      @if($report->is_found == 1)
      <div class="center-btn-parent">
         <h2> <span id="foundspan" style="color: blue"> هذا الطفل وجد </span></h2>
      </div>
      @endif

      @if($report->is_found == 0)

    <div class="center-btn-parent">

        <a href="#" class="btn btn-secondary" id="contact" >للتواصل مع الأهل</a>

    </div>
      @endif

      @if($report->is_found == 0 && $report->user_id == Auth::user()->id)
      <div class="center-btn-parent">
          <a  reportID="{{$report->id}}" id="markfound" class="btn btn-secondary">لقيته</a>
      </div>

          @endif
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

    <script>
        $(function() {
            $("#markfound").on("click", function () {

                var reportID = $(this).attr('reportID');

                $.ajax({
                    type: "GET",
                    url: '/report/markfound/'+ reportID ,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data){
                        console.log(data);
                        $("#markfound").attr('style' , 'display:none');
                        $("#contact").attr('style' , 'display:none');
                        $("#foundspan").attr('style' , 'display:block');
                } ,
                    error: function(data){


                }})



            })
        })
    </script>
@include('laravelLikeComment::like', ['like_item_id' => $report->id])
@include('laravelLikeComment::comment', ['comment_item_id' =>  $report->id ])

@endsection