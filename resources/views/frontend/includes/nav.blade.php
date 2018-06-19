<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5" style="height: 120px;">
    <a href="{{ route('frontend.index') }}" class="navbar-brand"><img id="nav-logo" style="width: 90px; margin-top: -55px;" src="{{asset('img/frontend/logo.png')}}" alt="logo"></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('labels.general.toggle_navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
         @auth
            <li class="nav-item"><a href="/reports/create/normal" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">إنشر بلاغ</a></li>
            <li class="nav-item"><a href="/reports/create/found" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">وجدت مفقود</a></li>
            <li class="nav-item"><a href="/reports" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">كل المفقودين</a></li>
            <li class="nav-item"><a href="" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">قصص النجاح</a></li>
            @endauth
            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">إتصل بنا</a></li>
       
            
            
                @auth
    
  <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav"> 
            <li class="nav-item dropdown dropdown-notifications" >
              <a href="#notifications-panel" onclick="myFunction()" class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                <i data-count="{{ $notificationsCount }}" class="glyphicon glyphicon-bell notification-icon">
                </i>
              </a>
                
              <div class="dropdown-container dropdown-notifications ">
                <ul class="dropdown-menu ">
                </ul>
              </div>
            </li>
              
              <br>

          </ul>
        </div>
       
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
</nav> -->


<nav class="navbar navbar-expand-lg navbar-dark bg-info" >
    <a href="{{ route('frontend.index') }}" class="navbar-brand"><img id="nav-logo" style="width: 110px;" src="{{asset('img/frontend/logo.png')}}" alt="logo"></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('labels.general.toggle_navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
        @auth
    
    <div class="collapse navbar-collapse"  style="padding:0;">
            <ul class="nav navbar-nav"> 
              <li class="nav-item dropdown dropdown-notifications" >
                <a href="#notifications-panel" onclick="myFunction()" class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                  <i data-count="{{ $notificationsCount }}" class="glyphicon glyphicon-bell notification-icon">
                  </i>
                </a>
                  
                <div class="dropdown-container dropdown-notifications ">
                  <ul class="dropdown-menu ">
                  </ul>
                </div>
              </li>
                
                <br>
  
            </ul>
          </div>
         
          @endauth
         @auth
            <li class="nav-item"><a href="/reports/create/normal" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">إنشر بلاغ</a></li>
            <li class="nav-item"><a href="/reports/create/found" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">وجدت مفقود</a></li>
            <li class="nav-item"><a href="/reports" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">كل المفقودين</a></li>
            <li class="nav-item"><a href="/reports" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">البحث بالصورة</a></li>
            <li class="nav-item"><a href="/reports" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">من نحن</a></li>
            <li class="nav-item"><a href="" class="nav-link {{ active_class(Active::checkRoute('frontend.report.index')) }}">قصص النجاح</a></li>
            @endauth
            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">تواصل معنا</a></li>
       
            
            

            
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
 