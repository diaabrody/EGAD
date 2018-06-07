<?php $__env->startSection('title', app_name() . ' | '.__('navs.general.home')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-4 col-md-12 col-sm-12 report-fast mb-3">
            <div class="card">
                <div class="card-title">
                    هل فقدت شخص مقرب لك؟
                  </div>
              
              <img src="images/question.svg">
              <div class="card-body">
                <a href="#" class="btn btn-secondary">بلاغ سريع</a>
              </div>
            </div>
    </div>
    <div class="col-lg-8 col-md-12 col-s-12 missing-now">
        <h1>المفقودين حالياً</h1>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-6 mb-5">
                        <div class="card">
                          <img class="card-img-top" src="images/missing-girl.jpg" alt="Card image cap">
                          <div class="card-body">
                            <p class="card-text">الاسم: منى علاء الدين</p>
                            <p class="card-text">السن: عشر سنوات</p>
                            <a href="#" class="btn btn-secondary">المزيد</a>
                          </div>
                        </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-6 mb-5">
                        <div class="card">
                          <img class="card-img-top" src="images/missing-girl.jpg" alt="Card image cap">
                          <div class="card-body">
                            <p class="card-text">الاسم: منى علاء الدين</p>
                            <p class="card-text">السن: عشر سنوات</p>
                            <a href="#" class="btn btn-secondary">المزيد</a>
                          </div>
                        </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-5">
                        <div class="card">
                          <img class="card-img-top" src="images/missing-girl.jpg" alt="Card image cap">
                          <div class="card-body">
                            <p class="card-text">الاسم: منى علاء الدين</p>
                            <p class="card-text">السن: عشر سنوات</p>
                            <a href="#" class="btn btn-secondary">المزيد</a>
                          </div>
                        </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 how-to-help">
        <div class="card">
          <div class="card-body">
            <p class="card-title">كيف تستطيع المساعدة؟</p>
            <p class="card-text">اذا وجدت طفل تاءه خلال سيرك ف الطريق يمكنك المساعدة عن طريق الابلاغ من هنا </p>
            <a href="#" class="btn btn-secondary">وجدت مفقود</a>
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <?php echo $__env->yieldContent('my-map'); ?>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <?php echo $__env->yieldContent('socialmedia-field'); ?>
    </div>
</div>
<div class="row ">
    
    <div class="col-lg-8 success-stories">
        <h1>قصص نجاح</h1>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>