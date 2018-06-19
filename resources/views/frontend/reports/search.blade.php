@extends('frontend.layouts.app')


@section('content')
    <div id="loading" style="display: none" ></div>
    <meta name="csrf-token" content="{{ csrf_token() }}">


<div class="container" id="cont">

    <form method="post" enctype="multipart/form-data" id="upload_form"  role="form">
     <div class="d-flex justify-content-center mb-5">   
        <div class=" custInputfield border p-3 w-50" style="height:40px">
        <p class="float-right">ابحث بالصورة</p>
        <input type="hidden" name="_token" value="{{ csrf_token()}}" >
         <i class="fas fa-camera" style="font-size:20px"></i>
        <input type="file" name="photo" id="photo" required  class="form-control h-100 border-0" onchange="readURL(this);">
        </div> 
        

       <button class=" btn btn-secondary m-0 mr-2 text-white font-weight-bold form-text"  type="submit" id="serach" style="margin-top:20px;height:40px;width:90px"  onclick="displayloading()"  >بحث</button>

       </div>
       
       <div class="m-auto" style="width:635px">
          <h5 class="text-muted float-right"> نتيجة البحث: 0</h5><br><br>
          <img src="http://placehold.it/100x100" class="float-right"> 
          <div style="height:500px">
          {{--<div class="form-control" style="height:200px ; margin-top: 20px">--}}
            {{--<img src="{{asset('img/frontend/profileImage.png')}}" id="image" class="h-100 d-block mx-auto">--}}
  

        {{--</div>--}}
        </div>
       </div>
        


    </form>




</div>

    <div class="col-lg-12 all-missing">
        <div class="row" id="row">


        </div>
    </div>






    <script>

        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#upload_form').on('submit',function(e){

                e.preventDefault(e);
                var image = $('#photo')[0].files[0];
                 form = new FormData();
                form.append('photo', image);


                $.ajax({

                    type:"POST",
                    url:'/report/children/searchfound',
                    data:new FormData($(this)[0]),
                    processData: false ,
                    contentType:false ,
                    cache: false,
                    success: function(data){
                        $("#row").html("");

                        if(data !=0 && data !=1  ) {

                            for (i = 0; i < data.length; i++) {

                                var parentdev = "<div class='col-lg-4 col-md-12 col-sm-6 mb-5' style='width:300px' id='parentdev'></div>";
                                $("#row").append(parentdev);
                                var cart = "<div class='card' id='cart'></div>";
                                $('.col-lg-4:last').prepend(cart);

                               var linkimage = "<a href=''  id='linkimage' class='linkimage'></a>";
                                $('.cart:last').prepend(linkimage);
                                $('.linkimage:last').attr("href", '/reports/' + data[i].id);
                                var image = "<img  class='card-img-top' width='200' height='200' id='img'>";
                                $('.card:last').prepend(image);

                                $('.card-img-top:last').attr('src', data[i].photo);


                                var cartbody = "<div class='card-body' id='body'></div>";
                                $('.card:last').append(cartbody);

                                var name = "<p class='card-text name' ></p>";
                                var phone = "<p class='card-text phone' ></p>";
                              var btn = "<a class= 'btn btn-secondary'  >المزيد</a>";

                                $(".card-body:last").append(name);
                                $(".card-body:last").append(phone);
                               $(".card-body:last").append(btn);
                                $('.name:last').html(data[i].name + " الاسم : ");
                                $('.phone:last').html(data[i].reporter_phone_number + " : رقم تليفون المبلغ  ");
                               $('.btn:last').attr('href', '/reports/' + data[i].id);


                            }
                        }

                        else
                        {
                            $("#row").html("");
                            if(data ==0)
                            {
                                $("#row").html("");
                                $("#row").html("<h1 style=' color:red ; margin-left: 30px'>هذه الصوره لا تحتوي علي اشخاص</h1>");

                            }
                            else
                            {
                                $("#row").html("");
                                $("#row").html("<center><h1 style=' color:red ; margin-left: 30px'>لا يوجد تطابق لهذه الصوره </h1>");

                            }
                        }

                        document.getElementById('loading').style.display = "none";

                        $("#serach").attr("disabled", false);
                    },
                    error: function(data){
                        document.getElementById('loading').style.display = "none";

                        $("#serach").attr("disabled", false);

                    }
                })
            });
        });

      </script>


    <link rel="stylesheet" href="{{ URL::asset('css/loading-spinner.css') }}" />
    <script type="text/javascript" src="{{ URL::asset('js/photo-spinner.js') }}"></script>


@endsection