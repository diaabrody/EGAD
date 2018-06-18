<!DOCTYPE html>
@langrtl
<html lang="{{ app()->getLocale() }}" dir="rtl">
    @else
    <html lang="{{ app()->getLocale() }}">
        @endlangrtl
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>@yield('title', app_name())</title>
            <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
            <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="/css/bootstrap-notifications.min.css">
            <link rel="stylesheet" href="{{ URL::asset('css/loading-spinner.css') }}" />
            <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
            <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
            <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
            <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
            <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

            @yield('meta')


            {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
            @stack('before-styles')

            <!-- Check if the language is set to RTL, so apply the RTL layouts -->
            <!-- Otherwise apply the normal LTR layouts -->
            {{ style(mix('css/frontend.css')) }}

            @stack('after-styles')
        </head>
        <body>


            <div id="app">
                @include('includes.partials.logged-in-as')
                @include('frontend.includes.nav')

                <div class="container">
                    @include('includes.partials.messages')
                    @yield('content')
                </div><!-- container -->

                
                </div><!-- #app -->
                @include('frontend.includes.footer')
          

               
                <!-- Scripts -->
                @stack('before-scripts')
                {!! script(mix('js/frontend.js')) !!}
                @stack('after-scripts')

                 @include('includes.partials.ga')
                
                <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>
                <script type="text/html" id="hit-template">


                        <div class="col-lg-4 col-md-4 col-sm-6 mb-5">
                            <div class="card" style="height: 380px !important;">
                            <img  class="card-img-top img-thumbnail" src="@{{{photo}}}" alt="@{{{name}}}">
                        
                            <div class="card-body">
                                <h2 class="card-text ">
                                    <i class="fas fa-user ml-2"></i>

                                    @{{{_highlightResult.name.value}}}

                                   </h2>
                                <div class="card-text">

                                      <b style="font-size: 28px;">  <sup style="font-size: 12px">العمر  </sup>   @{{{age}}}  </b>


                                    </div>
                                <a href="/reports/@{{{id}}}" class="btn btn-primary btn-block">المزيد</a>
                        </div>
                    </div>
                        </div>



                </script>
                <script type="text/html" id="no-results-template">
                        <div id="no-results-message">
                          <p>لم نجد اي نتائج لهذا البحث <em>"@{{{query}}}"</em>.</p>
                          <a href="/reports" class='clear-all'>Clear search</a>
                        </div>
                      </script>
                <script>
            var search = instantsearch({

            appId: 'N02M6ZG9Q3',
                    apiKey: '32b6ab474f65d442d7ec4242d1ef410d',
                    indexName: 'reports',
                    urlSync: true,
                    searchParameters: {
                    hitsPerPage: 9
                    }
            });
            search.addWidget(
                    instantsearch.widgets.searchBox({
                        container: '#search-input',
                        placeholder: ' ابحث عن الاطفال عن طريق الاسم او المنطقة ',
                        magnifier: false,
                        reset: false
                    })
                    );
            search.addWidget(
                    instantsearch.widgets.hits({
                    container: '#hits',
                            templates: {
                            item: document.getElementById('hit-template').innerHTML,
                            empty: document.getElementById('no-results-template').innerHTML,
                            }
                    })
                    );

            search.addWidget(
                    instantsearch.widgets.pagination({
                    container: '#pagination',
                    scrollTo: '#search-input',
                    })
                    );
            search.addWidget(
                    instantsearch.widgets.refinementList({
                    container: '#gender',
                            attributeName: 'gender',
                            operator: 'or',
                            limit: 10,
                            templates: {
                            header: '<h5>النوع</h5>',
                            }
                    })
                    );
            search.addWidget(
                    instantsearch.widgets.refinementList({
                    container: '#city',
                            attributeName: 'city',
                            operator: 'or',
                            limit: 10,
                            templates: {
                            header: '<h5>المدينة</h5>',
                            }
                    })
                    );
            search.addWidget(
                    instantsearch.widgets.refinementList({
                    container: '#area',
                            attributeName: 'area',
                            operator: 'or',
                            limit: 10,
                            templates: {
                            header: '<h5>المنطقة</h5>',
                            }
                    })
                    );
            search.addWidget(
                    instantsearch.widgets.refinementList({
                    container: '#calendar',
                            attributeName: 'lost_since',
                            templates: {
                            header: '<h5>مفقود منذ</h5>'
                            }
                    })
                    );
                        search.addWidget(
                        instantsearch.widgets.stats({
                        container: '#stats',
                        })
                        );
            search.start();

                </script>

                <script type="text/javascript">

                    @auth

                            var notificationsWrapper = $('.dropdown-notifications');
                    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
                    var notificationsCountElem = notificationsToggle.find('i[data-count]');
                    var notificationsCount = {{ $notificationsCount }};
                    var notifications = notificationsWrapper.find('ul.dropdown-menu');
                    var pusher = new Pusher('aacacc0492d009aa482e', {
                    authTransport: 'ajax',
                            cluster: 'eu',
                            encrypted: false,
                    });
                    function updateNotificationCount(){
                    notificationsCountElem.attr('data-count', notificationsCount);
                    notificationsWrapper.find('.notif-count').text(notificationsCount);
                    notificationsWrapper.show();
                    }




                    // Subscribe to the channel we specified in our Laravel Event
                    var commentChannel = pusher.subscribe('report_{{ Auth::user()->id }}');
                    var sameAreaChannel = pusher.subscribe('users.{{ Auth::user()->id }}');
                    $.each({!! json_encode(Auth::user() -> notification -> toArray()) !!}, function(i, data) {
                    DrawHtml(data,1);
                    });
                    commentChannel.bind('App\\Events\\CommentsonReport', function(data) {
                    DrawHtml(data,1);
                    notificationsCount += 1;
                    updateNotificationCount();
                    });
                    sameAreaChannel.bind('App\\Events\\SameAreaReport', function(data) {
                    DrawHtml(data,1);
                    notificationsCount += 1;
                    updateNotificationCount();
                    });
                    function myFunction(data){
                    $.ajax({
                    type: 'post',
                            url: '/notifications/edit',
                            data:{
                            '_token':'{{csrf_token()}}',
                            },
                            success:function(resp){
                            notificationsCount = 0;
                            updateNotificationCount();
                            }
                    });
                    }

                    function DrawHtml(data,realNotificaion) {
                    // Bind a function to a Event (the full Laravel class)
                    var existingNotifications = notifications.html();
                    var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
                    if(realNotificaion)
                    {
                            data=data.notify;
                    }

                    var newNotificationHtml = `<a href="/reports/` + data.report_id + `">
                      <li class="notification active">

                          <div class="media">
                            <div class="media-left">
                              <div class="media-object">
                                <img src="` + data.photo + `" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                              </div>
                            </div>
                            <div class="media-body">
                              <strong class="notification-title">` + data.message + `</strong>
                              <div class="notification-meta">
                                <small class="timestamp">` + data.created_at + `</small>
                              </div>
                            </div>
                          </div>
                      </li></a>
                    `;
                    notifications.html(newNotificationHtml + existingNotifications);
                    }
                    @endauth

                </script>

<script>
  // Get the container element
var ulContainer = document.getElementById("myUl");

// Get all buttons with class="btn" inside the container
var anchors = ulContainer.getElementsByClassName("nav-link");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < anchors.length; i++) {
  anchors[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}            
</script>
       


            <script type="text/javascript">
                        $('#city').on('change',function(){
                        var cityName = $(this).val();    
                        if(cityName){
                                $.ajax({
                                type:"GET",
                                url:"{{url('getregionlist')}}?city_name="+cityName,
                                success:function(res){               
                                if(res){
                                        $("#region").empty();
                                        $.each(res,function(key,value){
                                                $("#region").append('<option value="'+value.name+'">'+value.name+'</option>');
                                        });
                                
                                }else{
                                $("#region").empty();
                                }
                                }
                                });
                        }else{
                                $("#city").empty();
                        }
                                
                        });
                </script>
                


              
        </body>
    </html>