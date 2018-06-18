@extends('frontend.layouts.app')

@section('content')
<div class="row justify-content-center align-items-center mb-3">
        <div class="col col-sm-10 align-self-center">
            <div class="card">
                <div class="card-header font-weight-bold">
                @include('frontend.user.account')
                </div>

                <div class="card-body px-5">
                

                 <div class="col-md-6 order-2 order-sm-1">
                           
                           
                               <div class="col">
                               @foreach ($reports as $report)
                                  
                               <div class="card mb-4">
                                        <div class="card-header">
                                        {{ $report->name }}
                                        </div><!--card-header-->
                                        <div class="card-body">
                                            <img src="{{ $report->photo }}" alt="Avatar" style="height:200px">
                                            <br>
                                            <b>بتاريخ :{{ $report-> created_at}}</b>
                                            <br>

                                           <div class="d-flex"> 
                                            <div class="col-lg-6">   
                                            <a href="/reports/{{ $report->id }}" class="btn btn-outline-secondary  font-weight-bold" > قراءة المزيد </a></div>
                                            <div class="col-lg-6">   
                                            <a href="/report/{{ $report->id }}/edit" class="btn  btn-outline-secondary font-weight-bold"> تعديل البلاغ </a></div>
                                            </div>   

                                        </div><!--card-body-->
                                    </div><!--card-->
                               @endforeach
                               
                               </div><!--col-md-4-->
                               
                           


                </div><!--card body-->
            </div><!-- card -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->

@endsection