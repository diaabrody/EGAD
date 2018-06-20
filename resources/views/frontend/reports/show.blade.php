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
  <div class="col-lg-4 col-md-12 col-sm-12 ">
         <div style="background-image: url('{{ $report->photo }}');" class="card-img-top my-img mb-3">
        
         </div>
         @if($report->is_found == 0)

<div class="align-btn-parent">
    <a onclick="toggleInfo()" class="btn btn-primary" id="contact" >للتواصل مع الأهل</a>
</div>
<div id="report-contact-info">
      <p>رقم تليفون المبلغ: {{$report->reporter_phone_number}}</p>
  </div>
  @endif
  
</div>
  <div class="col-md-12 col-sm-12 col-lg-8">
    <p class="card-text text-success"><span class="text-info">  اللإسم:</span> {{ $report->name }}</p>
    <p class="card-text text-success"><span class="text-info">السن:</span> {{ $report->age }}</p>
    <p class="card-text text-success"><span class="text-info">فقد منذ: </span>{{ $report->lost_since }}</p>
    <p class="card-text text-success"><span class="text-info">شوهد اخر مرة في:</span> {{ $report->last_seen_at }}</p>
    <p class="card-text text-success"><span class="text-info">الطول: </span>{{ $report->height }}</p>
    <p class="card-text text-success"><span class="text-info">الوزن:</span> {{ $report->weight }}</p>
    <p class="card-text text-success"><span class="text-info">لون العين:</span> {{ $report->eye_color }}</p>
    <p class="card-text text-success"><span class="text-info">لون الشعر:</span> {{ $report->hair_color }}</p>
    <p class="card-text text-success"><span class="text-info">مواصفات المفقود:</span> {{ $report->special_sign }}</p>

      <div class="align-btn-parent">
          <h2> <span id="foundspan" style="color: $primary ; display:none" > هذا الطفل وجد  </span></h2>
      </div>

      @if($report->is_found == 1)
      <div class="align-btn-parent">
         <h2> <span id="foundspan" style="color: $primary;"> هذا الطفل وجد </span></h2>
      </div>
      @endif

     

      @if($report->is_found == 0 && $report->user_id == Auth::user()->id)
      <div class="align-btn-parent">
          <a  reportID="{{$report->id}}" id="markfound" class="btn btn-secondary">لقيته</a>
      </div>

          @endif
    </div>
   
  </div>
  </div>
  </div>
</div>
    </div>
</div>
</div>

    <script>
        
    // $("#contact").on("click", function(){
    //     $("#report-contact-info").toggle();
    // });

    function toggleInfo() {
        var x = document.getElementById("report-contact-info");
        if(x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }



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