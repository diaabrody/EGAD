@extends('frontend.layouts.app')

@section('content')
<div class="row justify-content-center align-items-center mb-3">
        <div class="col col-sm-10 align-self-center">
            <div class="card">
                <div class="card-header font-weight-bold">
                @include('frontend.user.account')
                    <strong class="float-right">
                       بياناتى
                    </strong>
                </div>

                <div class="card-body px-5">
                
                  
    
 <div class="col-lg-4">
    <div class="form-control mb-3" style="height:200px">
        <img src="{ $logged_in_user->picture)}}" id="image"  class="user-profile-image" class="h-100 d-block mx-auto img-fluid">
    </div>
    <div class="form-group text-center">
           <p>{{ $logged_in_user->name }}</p>
           <p>{{ $logged_in_user->email }}</p>
           <p>{{ $logged_in_user->phone_no }}</p>
           <p>{{ $logged_in_user->date_of_birth }}</p>
           <p>{{ $logged_in_user->city}}</p>
           <p>{{ $logged_in_user->region}}</p>
            

    </div>

  </div>     
</div> 
                </div><!--card body-->
            </div><!-- card -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->

@endsection

  
 
   
    