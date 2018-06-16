@extends('frontend.layouts.app')

@section('content')
<div class="row justify-content-center align-items-center mb-3">
        <div class="col col-sm-10 align-self-center">
            <div class="card">
                <div class="card-header font-weight-bold">
                @include('frontend.user.account')
                    <strong class="float-right">
                        {{ __('بلاغاتى') }}
                    </strong>
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
                                            
                                            <a href="/reports/{{ $report->id }}" class="btn btn-warning btn-lg btn-block text-white font-weight-bold" > قراءة المزيد </a>
                                            <a href="/report/{{ $report->id }}/edit" class="btn btn-warning btn-lg btn-block text-white font-weight-bold"> تعديل البلاغ </a>
                                        </div><!--card-body-->
                                    </div><!--card-->
                               @endforeach
                               
                               </div><!--col-md-4-->
                               
                           


                </div><!--card body-->
            </div><!-- card -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->

@endsection