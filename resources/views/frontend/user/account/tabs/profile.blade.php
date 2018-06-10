<!--
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>{{ __('labels.frontend.user.profile.avatar') }}</th>
            <td><img src="{{ $logged_in_user->picture }}" class="user-profile-image" /></td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.name') }}</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.email') }}</th>
            <td>{{ $logged_in_user->email }}</td>
        </tr>

        <tr>
            <th>{{ __('Phone Number') }}</th>
            <td>{{ $logged_in_user->phone_no }}</td>
        </tr>

        <tr>
            <th>{{ __('Date Of Birth') }}</th>
            <td>{{ $logged_in_user->date_of_birth }}</td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.created_at') }}</th>
            <td>{{ $logged_in_user->created_at->timezone(get_user_timezone()) }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
        </tr>
        <tr>
            <th>{{ __('labels.frontend.user.profile.last_updated') }}</th>
            <td>{{ $logged_in_user->updated_at->timezone(get_user_timezone()) }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
        </tr>
    </table>
</div>-->
<form class="w-75 m-auto px-0 p-4 bg-light" >
   
<div class="row">    
 <div class="col-lg-8 float-right">
     
     <div class="bg-white mb-3" style="height:37px">
     <p class="float-right font-weight-bold mb-0 p-3" >بلاغاتي</p>
     </div>
     
     <div class="bg-white p-4">
         <p class="float-right mb-0">بتاريخ : </p>
<!--         <div style="clear-both"></div>-->
     <div class="media align-items-center">
        <img class="ml-3 float-right mt-3 " src="http://placehold.it/70x70" alt="Generic placeholder image"> 
      <div class="media-body">
        <h5 class="mt-0 mb-1 float-right mt-3">أحمد حسن</h5><br>
       
      </div>
        <a href="" class="text-warning float-right mt-3 mt-auto font-weight-bold">  قراءة المزيد</a>  
    </div>
    </div>
     
 </div>
    
 <div class="col-lg-4">
    <div class="form-control mb-3" style="height:200px">
        <img src="{{asset('img/frontend/profileImage.png')}}" id="image" class="h-100 d-block mx-auto img-fluid">
    </div>
    <div class="form-group text-center">
           <p>أحمد ابراهيم محي</p>
           <p>ahmed.mohey@gmail.com</p>
                <button type="button" class="btn btn-warning btn-lg btn-block text-white font-weight-bold">بياناتي</button>

    </div>

  </div>     
</div> 

  
 
   
    <div style="clear:both"></div>
</form>