@extends('frontend.layouts.app')
@section('content')
<div class="container pt-5 pb-5">
    <div class="alert alert-success">
       يوجد تطابق بين الشخص الذي ادخلته و هؤلاء الاشخاص
    </div>
    <div class="col-lg-8 col-md-12 col-s-12 all-missing">
    <div class="row">

        @foreach ($childs as $clid)


            <div class="col-lg-4 col-md-12 col-sm-6 mb-5">
                <div class="card">
                    <a href="{{route('frontend.report.show' , [$clid->id] )}}">  <img  class="card-img-top" src="{{$clid->photo}}" alt="" width="200" height="200"> </a>

                    <div class="card-body">
                        <p class="card-text">الإسم:{{$clid->name}} </p>
                      <p class="card-text"> رقم المبلغ:{{$clid->reporter_phone_number}}  </p>
                            <a href="{{route('frontend.report.show' , [$clid->id] )}}" class="btn btn-secondary">المزيد</a>
                    </div>
                </div>
            </div>



        @endforeach
    </div>
    </div>
</div>
@endsection

