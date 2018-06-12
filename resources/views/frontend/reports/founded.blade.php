@extends('frontend.layouts.app')
@section('content')
    <div class="alert alert-success">
        هولاء الاطفال يشبهونك طفلك
    </div>
    <div class="row">




        @foreach ($childs as $clid)
            <div class="card" style="width:300px">
                <a href="{{route('frontend.report.show' , [$clid->id] )}}"><img src="{{$clid->photo}}" alt="Avatar" style="height:200px"> </a>
                <div class="container">
                    <h3>{{$clid->name}}</h3>
                    <br>

                    <span class="card-footer">{{$clid->reporter_phone_number}}  رقم المبلغ </span>

                </div>

            </div>
        @endforeach
    </div>
@endsection

