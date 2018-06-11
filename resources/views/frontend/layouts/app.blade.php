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
        
       <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>   
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
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.3/dist/instantsearch.min.js"></script>
    <script type="text/html" id="hit-template">
        
          

        <div class="hit">
                <div class="hit-image">
                  <img src="@{{{photo}}}" alt="@{{{name}}}">
                </div>
                <div class="hit-content">
                  <h3 class="hit-age">@{{{age}}}</h3>
                  <h2 class="hit-name">@{{{_highlightResult.name.value}}}</h2>
                  <p class="hit-area">@{{{_highlightResult.area.value}}}</p>
                </div>
              </div>

       
      </script>
    <script>
        var search = instantsearch({
       
        appId: 'N02M6ZG9Q3',
        apiKey: '32b6ab474f65d442d7ec4242d1ef410d',
        indexName: 'reports',
        urlSync: true,
        searchParameters: {
            hitsPerPage: 10
        }
        });

         search.addWidget(
        instantsearch.widgets.searchBox({
            container: '#search-input',
           magnifier: false,
           reset: false
        })
        );

        search.addWidget(
        instantsearch.widgets.hits({
            container: '#hits',
            templates: {
            item: document.getElementById('hit-template').innerHTML,
            empty: "We didn't find any results for the search "
            }
        })
        );
        search.addWidget(
  instantsearch.widgets.pagination({
    container: '#pagination'
  })
);
search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#gender',
    attributeName: 'gender',
    operator: 'or',
    limit: 10,
    templates: {
      header: 'Gender',
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
      header: 'City',
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
      header: 'Area',
    }
  })
);
search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#calendar',
    attributeName: 'lost_since',
    templates: {
      header: 'Lost Since'
    }
  })
);
search.start();
    </script>
   
    <script type="text/javascript">

      @auth

        var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notificationsCount = {{ $notificationsCount }};
        var notifications          = notificationsWrapper.find('ul.dropdown-menu');

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

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

        
        $.each( {!! json_encode(Auth::user()->notification->toArray()) !!}, function(i,data) {
            DrawHtml(data);
        }); 
            
        commentChannel.bind('App\\Events\\CommentsonReport', function(data) {
            DrawHtml(data);
            notificationsCount += 1;
            updateNotificationCount();
        });

        sameAreaChannel.bind('App\\Events\\SameAreaReport', function(data) {
            DrawHtml(data);
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
                notificationsCount=0;
                updateNotificationCount();
			}
        });
       } 

        function DrawHtml(data) {
            // Bind a function to a Event (the full Laravel class)
            var existingNotifications = notifications.html();
            var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
           // console.log(data)
            var newNotificationHtml = `<a href="/reports/`+data.report_id+`">
          <li class="notification active">

              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="`+data.photo+`" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">`+data.message+`</strong>
                  <div class="notification-meta">
                    <small class="timestamp">`+data.created_at+`</small>
                  </div>
                </div>
              </div>
          </li></a>
        `;
            notifications.html(newNotificationHtml + existingNotifications);

        }
        @endauth

    </script>

    <script type="text/javascript" src="{{ URL::asset('js/location-spinner.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOukh8jofbCBMBKRE6XhSKwTUtmgF7Wp0&libraries=places&callback=initAutocomplete"
            async defer></script>

    <link rel="stylesheet" href="{{ URL::asset('css/loading-spinner.css') }}" />
    
    </body>
    </html>