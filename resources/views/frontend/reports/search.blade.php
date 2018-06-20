@extends('frontend.layouts.app')


@section('content')
    <div id="loading" style="display: none" ></div>
    <meta name="csrf-token" content="{{ csrf_token() }}">


<div class="container pt-5 pb-5" id="cont">

    <form method="post" enctype="multipart/form-data" id="upload_form"  role="form">
        <input type="hidden" name="_token" value="{{ csrf_token()}}" >
     <div class="d-flex justify-content-center mb-5">   
        <div class=" custInputfield border p-3 w-50" style="height:40px">
        <label for="photo">
            <i class="fas fa-camera text-secondary" style="font-size:20px"></i>
        </label>
        <input type="file" name="photo" id="photo" required  class="form-control h-100 border-0" onchange="readURL(this);">
        </div> 
        

       <button class=" btn btn-primary m-0 mr-2 text-white font-weight-bold form-header"  type="submit" id="serach" style="margin-top:20px;height:35px;width:90px"  onclick="displayloading()"  >بحث</button>

       </div>
       
       <div class="m-auto" style="width:635px">
          <h3 class="text-success float-right"> نتيجة البحث : 0</h3><br><br>

       </div>

        <div class="col-lg-8 col-md-12 col-s-12 all-missing">
            <div class="row" id="row">


            </div>
        </div>

    </form>






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

                        $(".text-muted").html('نتيجة البحث: '+data.length);
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