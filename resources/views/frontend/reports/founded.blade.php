@extends('frontend.layouts.app')
@section('content')
    <div class="alert alert-success">
        هولاء الاطفال يشبهونك طفلك
    </div>
    <div class="row">




        @foreach ($childs as $clid)
            {{--<div class="card" style="width:300px">--}}
                {{--<a href="{{route('frontend.report.show' , [$clid->id] )}}"><img src="{{$clid->photo}}" alt="Avatar" style="height:200px"> </a>--}}
                {{--<div class="container">--}}
                    {{--<h3>{{$clid->name}}</h3>--}}
                    {{--<br>--}}

                    {{--<span class="card-footer">{{$clid->reporter_phone_number}}  رقم المبلغ </span>--}}

                {{--</div>--}}

            {{--</div>--}}




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
@endsection

