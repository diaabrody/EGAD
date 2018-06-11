<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5" style="height: 120px;">
    <a href="{{ route('frontend.index') }}" class="navbar-brand"><img id="nav-logo" style="width: 90px; margin-top: -55px;" src="{{asset('img/frontend/logo1.png')}}" alt="logo"></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('labels.general.toggle_navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
         @auth
         @if(Auth::user()->email!="guest@ejad.com")
            <li class="nav-item"><a href="/report/create/normal" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">إنشر بلاغ</a></li>
            <li class="nav-item"><a href="/report/create/found" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">وجدت مفقود</a></li>
            <li class="nav-item"><a href="/reports" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">كل المفقودين</a></li>
            <li class="nav-item"><a href="" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">قصص النجاح</a></li>

            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">إتصل بنا</a></li>
       
            <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">{{ __('navs.frontend.dashboard') }}</a></li>
            @endif
            @endauth
                @auth
    @if(Auth::user()->email!="guest@ejad.com")
  <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav"> 
            <li class="nav-item dropdown dropdown-notifications" >
              <a href="#notifications-panel" onclick="myFunction()" class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                <i data-count="{{ $notificationsCount }}" class="glyphicon glyphicon-bell notification-icon"></i>
              </a>

              <div class="dropdown-container">
                <div class="dropdown-toolbar">
                  <h3 class="dropdown-toolbar-title" >Notifications (<span id='number' class="notif-count">{{ $notificationsCount }}</span>)</h3>
                </div>
                <ul class="dropdown-menu ">
                </ul>
              </div>
            </li>
              
              <br>
              
           <li class="nav-item">
            {{-- <ais-index app-id="N02M6ZG9Q3"
                api-key="32b6ab474f65d442d7ec4242d1ef410d"
                 index-name="reports"
                    :auto-search="false">

    <ais-search-box style="color:red;" placeholder="Find reports..."></ais-search-box> --}}

{{-- <ais-results >
<template slot-scope="{ result }">
<div v-cloak>
        <h2>
                <ais-highlight :result="result" attribute-name="name"></ais-highlight>
         </h2>
  <h4>@{{ result.age }} - @{{ result.type }}</h4>
</div>
</template>
</ais-results> --}}
{{-- <my-results>
    <template slot-scope="{ result }">
        <div>
            <a :href="'/reports/'+ result.id">
                <ais-highlight :result="result" attribute-name="name"></ais-highlight>
            </a>            
                <h4>@{{ result.last_seen_at }}</h4>
                
        </div>
    </template>
</my-results>
<ais-no-results></ais-no-results>


</ais-index> --}}
            
           </li>
          </ul>
        </div>
        @endif
        @endauth
            
            @guest
                <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">{{ __('navs.frontend.login') }}</a></li>

                @if (config('access.registration'))
                    <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">{{ __('navs.frontend.register') }}</a></li>
                    <li class="nav-item"><a href="{{route('frontend.auth.urgentregister')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">{{ __('Report Now') }}</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        @can('view backend')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">{{ __('navs.frontend.user.administration') }}</a>
                        @endcan

                        <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">{{ __('navs.frontend.user.account') }}</a>
                        <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">{{ __('navs.general.logout') }}</a>
                    </div>
                </li>
            @endguest

            @if (config('locale.status') && count(config('locale.languages')) > 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ __('menus.language-picker.language') }} ({{ strtoupper(app()->getLocale()) }})</a>

                    @include('includes.partials.lang')
                </li>
            @endif
        </ul>
    </div>
</nav>
