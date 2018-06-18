@extends('frontend.layouts.app')

@section('content')

    
<!-- form   -->
<div class="row justify-content-center align-items-center mb-3">
        <div class="col col-lg-8 align-self-center">
            <div class="card">
                <div class="card-header font-weight-bold mb-5 bg-white">
                @include('frontend.user.account')
                </div>    
    
    @foreach ($reports as $report)
    <form class="w-100 m-auto  p-4 bg-light mb-3" >
       <b class="float-right mb-0">بتاريخ :{{ $report-> created_at}}</b>
        <br>
<div class="row mt-3">  
 <div class="col-lg-12 float-right">
     
     <div class="bg-white p-4">
         
     <div class="media align-items-center">
        <img class="ml-3 float-right " src="{{ $report->photo }}" alt="Avatar" style="width:70px;height:70px"> 
      <div class="media-body">
        <h5 class="mt-0  float-right mt-3"> {{ $report->name }}</h5><br><br>
        <a href="/report/{{ $report->id }}/edit" class="btn  btn-primary font-weight-bold mt-2  float-right"> تعديل البلاغ </a> 
      </div>
        
        <a href="/reports/{{ $report->id }}" class="text-warning  mt-auto font-weight-bold">  قراءة المزيد</a>
         
    </div>
    </div>
     
 </div>
    
    
</div> 
    <div style="clear:both"></div>
</form>

@endforeach  
                
    </div><!-- card -->
  </div><!-- col-xs-12 -->
</div><!-- row -->   
@endsection    