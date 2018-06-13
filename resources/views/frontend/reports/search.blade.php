@extends('frontend.layouts.app')


@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


<div class="container">

    <form method="post" enctype="multipart/form-data" id="upload_form"  role="form">

        <input type="hidden" name="_token" value="{{ csrf_token()}}">

        <input type="file" name="photo" id="photo">
        <button class="btn btn-success"  type="submit" id="serach" >Search</button>


    </form>

    <div class="row">
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
                    url:'/report/childs/searchfound',
                    data:new FormData($(this)[0]),
                    processData: false ,
                    contentType:false ,
                    cache: false,
                    success: function(data){
                        console.log(data);

                        for (i = 0; i < data.length; i++) {
                   var div=$("<div class='col-lg-4 col-md-6 col-sm-6 mb-5' id='div1'></div>");
                     $(".row").prepend(div);
                    var div2=$("<div class='card'></div>");
                    $("#div1").prepend(div2);
                    var imag =  "<img class='card-img-top'>";
                    $('.card-img-top').attr("src",data[i].photo);
                    $(div2).prepend(imag);
                    var div3 =  "<div class='card-body'></div>";
                   $(".card").prepend(div3);
                     var div4= "<p class='card-text' id='card1'></p>";
                      var div5= "<p class='card-text' id='card2'></p>";
                     $("#card1").html(data[i].name + "الاسم :");
                      $("#card2").html(data[i].reporter_phone_number + "الاسم :");
                       $(".card-body").prepend(div4);
                       $(".card-body").prepend(div5);







                        }












                        $("#serach").attr("disabled", false);
                    },
                    error: function(data){
                        $("#serach").attr("disabled", false);
                    }
                })
            });
        });

      </script>




@endsection