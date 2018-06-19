@extends('frontend.layouts.app')


@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')

<div class="container-fluid">
    <div class="row">
        <header>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent" >
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
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="div-text">
                <h1>هنساعدك تلاقي المفقود</h1>
                <h2>لو فقدت حد عزيز عليك ابدأ بنشر بلاغ دلوقتي <br> و هنساعدك تلاقيه</h2>
                <a href="/reports/create/quick"><button type="button" class="btn btn-primary main-btn"><p>بلاغ سريع</p>
            </button></a>
            </div>
                </div>
            </div>
        </div>
        </header>


    </div>
</div>

<section id="sec1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="div-text">
            <h1>كيفية المساعدة؟</h1>
            <h2>لو شفت طفل شكله تايه أو شخص مشرد شكله في <br> غير وعيه, التقط صورة للشخص ده و إنشر بلاغ عنه <br> من هنا.</h2>
            <a href="/reports/create/found"><button type="button" class="btn btn-primary main-btn"><p>وجدت مفقود</p>
        </button></a>
        </div>
            </div>
        </div>
    </div>
</section>

<section id="sec2">
    <div class="container">
        
    <h1>المفقودين بالقرب منك</h1>
        <div class="row">
            @if (is_array($reports) || is_object($reports))
        @foreach ($reports as $report)
            <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
                        <div class="card">
                          <div class="card-img-top" style="background-image:url('{{ $report->photo }}')"></div>
                          <div class="card-body">
                          <a href="/reports/{{ $report->id }}"><p class="card-text">{{ $report->name }} </p></a>
                          </div>
                        </div>
            </div>
        @endforeach
       @endif
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="card">
                          <div class="card-img-top" style="background-image: url('/img/frontend/boy.jpg')"></div>
                            <div class="card-body">
                                <a href="#"><p class="card-text"> أحمد محمد </p></a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="card">
                          <div class="card-img-top" style="background-image: url('/img/frontend/boy.jpg')"></div>
                            <div class="card-body">
                                <a href="#"><p class="card-text"> أحمد محمد </p></a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="card">
                          <div class="card-img-top" style="background-image: url('/img/frontend/boy.jpg')"></div>
                            <div class="card-body">
                                <a href="#"><p class="card-text"> أحمد محمد </p></a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="card">
                          <div class="card-img-top" style="background-image: url('/img/frontend/boy.jpg')"></div>
                            <div class="card-body">
                                <a href="#"><p class="card-text"> أحمد محمد </p></a>
                            </div>
                            </div>
                        </div>




                        </div>
                        <a href="/reports"><button type="button" class="btn btn-primary main-btn"><p>كل المفقودين</p>
            </button></a>
                        </div>
                        
                        </div>
</section>

<section id="sec3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="div-text">
            <h1>خدمة التعرف على الوجه</h1>
            <h2>لو شفت طفل شكله تايه أو شخص مشرد شكله في <br> غير وعيه, التقط صورة للشخص ده و إنشر بلاغ عنه <br> من هنا.</h2>
            <a href="/reports/create/found"><button type="button" class="btn btn-primary main-btn"><p>البحث بالصورة</p>
            </button></a>
        </div>
            </div>
        </div>
    </div>
</section>

<section id="sec4">
    <div class="container">
        <h1>خريطة المفقودين</h1>
    <div class="row">
    <div class="col-12">
        <div style="margin: auto; width: auto; height: 500px;">
            {!! Mapper::render() !!}
        </div>
    </div>
</div>
    </div>
</section>

<section id="sec5">
    <div class="container">
        <h1 id="social-h1">مواقع التواصل الاجتماعي</h1>
        <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="div-text">
            <h2>لو شفت طفل شكله تايه أو شخص مشرد شكله في <br> غير وعيه, التقط صورة للشخص ده و إنشر بلاغ عنه <br> من هنا.</h2>
            <a href="/reports/create/found"><button type="button" class="btn btn-primary main-btn"><p>تابعنا على فيسبوك</p>
            </button></a>
        </div>
            </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
        <div class="card-header">
            من على تويتر
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
        </div>

        </div>
    </div>
</section>

<section id="sec6">
    <div class="container">
        <h1>قصص نجاح</h1>
        <div class="row">
        <div class="col-sm-12 success-stories">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/slider.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/slider.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/slider.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
        </div>
    </div>
</section>
@endsection
