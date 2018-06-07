<!DOCTYPE html>
<?php if (\Illuminate\Support\Facades\Blade::check('langrtl')): ?>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="rtl">
<?php else: ?>
    <html lang="<?php echo e(app()->getLocale()); ?>">
    <?php endif; ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo $__env->yieldContent('title', app_name()); ?></title>
        <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Laravel 5 Boilerplate'); ?>">
        <meta name="author" content="<?php echo $__env->yieldContent('meta_author', 'Anthony Rappa'); ?>">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-notifications.min.css">

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <?php echo $__env->yieldContent('meta'); ?>

    
    <?php echo $__env->yieldPushContent('before-styles'); ?>

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        <?php echo e(style(mix('css/frontend.css'))); ?>


        <?php echo $__env->yieldPushContent('after-styles'); ?>
    </head>
    <body>
    <div id="app">
        <?php echo $__env->make('includes.partials.logged-in-as', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('frontend.includes.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="container">
            <?php echo $__env->make('includes.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div><!-- container -->
    </div><!-- #app -->

    <!-- Scripts -->
    <?php echo $__env->yieldPushContent('before-scripts'); ?>
    <?php echo script(mix('js/frontend.js')); ?>

    <?php echo $__env->yieldPushContent('after-scripts'); ?>

    <?php echo $__env->make('includes.partials.ga', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notificationsCount     = parseInt(notificationsCountElem.data('count'));
        var notifications          = notificationsWrapper.find('ul.dropdown-menu');



        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('aacacc0492d009aa482e', {
            authTransport: 'ajax',
            cluster: 'eu',
            encrypted: false,
        });
        <?php if(auth()->guard()->check()): ?>
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('report_<?php echo e(Auth::user()->id); ?>');

        $.each( <?php echo json_encode(Auth::user()->notification->toArray()); ?>, function(i,data) {
            DrawHtml(data);
        });

        console.log(<?php echo json_encode(Auth::user()->notification->toArray()); ?>);

        channel.bind('App\\Events\\CommentsonReport', function(data) {
            DrawHtml(data);
        });
        function DrawHtml(data) {
            // Bind a function to a Event (the full Laravel class)
            var existingNotifications = notifications.html();
            var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
            var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">`+data.message+`</strong>
                  <!--p class="notification-desc">Extra description can go here</p-->
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
            notifications.html(newNotificationHtml + existingNotifications);
            notificationsCount += 1;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.notif-count').text(notificationsCount);
            notificationsWrapper.show();

        }

        <?php endif; ?>
    </script>
    </body>
    </html>
