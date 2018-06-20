@extends('frontend.layouts.app')


@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')

<div class="container-fluid">
    <div class="row">
        <header class="main-header">
        
        
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="div-text">
                <h1>هنساعدك تلاقي المفقود</h1>
                <h2>لو فقدت حد عزيز عليك ابدأ بنشر بلاغ دلوقتي <br> و هنساعدك تلاقيه</h2>
                @auth
                <a href="/reports/create/quick"><button type="button" class="btn btn-primary main-btn"><p>بلاغ سريع</p>
            </button></a>
            @else
            <a href="register/urgent"><button type="button" class="btn btn-primary main-btn"><p>بلاغ سريع</p>
            </button></a>
            @endauth
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

@auth
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
        </div>
        @endforeach
       @endif
                  
                        </div>
                        <a href="/reports" style="display:block; margin: 0 auto;" ><button type="button" class="btn btn-primary main-btn"><p>كل المفقودين</p>
            </button></a>
                        </div>
                        
                        </div>
</section>
@endauth

<section id="sec3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="div-text">
            <h1>خدمة التعرف على الوجه</h1>
            <h2>تقدر دلوقتي تدور على الأطفال المفقودين بخدمة البحث بالصورة اللي بتستخدم تقنية التعرف على الوجه و بتجيبلك أقرب النتائج المتواجدة هنا لصورة الطفل المفقود</h2>
            <a href="/report/children/search"><button type="button" class="btn btn-primary main-btn"><p>البحث بالصورة</p>
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
            {!! $map !!}
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
            <h2>تواصل معانا على فيسبوك و استخدم هاشتاج #ايجاد أو #ejad على تويتر عشان عشان نقدر نساعد أكبر عدد من الناس</h2>
            <a href="http://www.facebook.com/ejad.charity/"><button type="button" class="btn btn-primary main-btn"><p>تابعنا على فيسبوك</p>
            </button></a>
        </div>
            </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
        <div class="card-header">
            من على تويتر
        </div>
        <div class="card-body">
        @if(!empty($tweets1['statuses']) && !empty($tweets2['statuses']))
            @foreach($tweets1['statuses'] as $tweet)
            <div class="new-tweet">
            @if(!empty($tweet['extended_entities']['media']))
                            @foreach($tweet['extended_entities']['media'] as $v)
                                <div class="tweet-img" style="background-image: url('{{ $v['media_url_https'] }}');"></div>
                            @endforeach
                @endif
                <div class="tweet-text">
                    <h6>{{ $tweet['created_at'] }}</h6>
                    <h1>{{ $tweet['text'] }}</h1>
                </div>

            </div>
            @endforeach
            @foreach($tweets2['statuses'] as $tweet)
            <div class="new-tweet">
            @if(!empty($tweet['extended_entities']['media']))
                            @foreach($tweet['extended_entities']['media'] as $v)
                                <div class="tweet-img" style="background-image: url('{{ $v['media_url_https'] }}');"></div>
                            @endforeach
                @endif
                <div class="tweet-text">
                    <h6>{{ $tweet['created_at'] }}</h6>
                    <h1>{{ $tweet['text'] }}</h1>
                </div>

            </div>
            @endforeach
            @foreach($tweets3['statuses'] as $tweet)
            <div class="new-tweet">
            @if(!empty($tweet['extended_entities']['media']))
                            @foreach($tweet['extended_entities']['media'] as $v)
                                <div class="tweet-img" style="background-image: url('{{ $v['media_url_https'] }}');"></div>
                            @endforeach
                @endif
                <div class="tweet-text">
                    <h6>{{ $tweet['created_at'] }}</h6>
                    <h1>{{ $tweet['text'] }}</h1>
                </div>

            </div>
            @endforeach
            @else
                <span>There are no data.</span>
        @endif

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

<section id="sec7">
    <div class="container">
        <h1>ساهم في دعم إيجاد</h1>
        <div class="row">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSeBrI-uYjGDkX_z0t8EHXthbSfLETysdW66tdv6w67LKncGIQ/viewform?usp=sf_link" style="display:block; margin: 0 auto;" ><button type="button" class="btn btn-primary main-btn"><p>تبرع الان</p>
            </button></a>
        </div>                       
    </div>
</section>
@endsection
