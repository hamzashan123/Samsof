<!doctype html>
<html class="no-js" lang="en">

<head>
<?php if(app()->environment('production')): ?>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WMP5QX3');</script>
<!-- End Google Tag Manager -->
<?php endif; ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <meta property="og:image:height" content="519">
    <meta property="og:image:width" content="991">
    <meta property="og:title" content="SASMFOS">
    <meta property="og:description" content="South African Society of Maxillofacial and Oral Surgeons">
    <meta property="og:url" content="https://sasmfos.org/">
    <meta property="og:image" content="https://sasmfos.org/images/og-image.jpg">

    <title>SASMFOS • <?php echo $__env->yieldContent('title'); ?></title>

    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#21c5e5">
    <meta name="msapplication-TileColor" content="#21c5e5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="<?php echo e(secure_asset('css/public.css')); ?>">

    <?php if(app()->isLocal()): ?>
        <script src="http://localhost:8098"></script>
    <?php endif; ?>

    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
</head>

<body>
<?php if(app()->environment('production')): ?>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMP5QX3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php endif; ?>
    <div id="app" class="<?php echo e(isset($rightGap) ? 'right-gap' : null); ?>">
        <div class="columns is-gapless">
            <div class="column is-narrow is-hidden-mobile">
                <div class="sidebar-left is-flex flex-column has-space-between has-text-centered">
                    <?php echo $__env->make('home.partials.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="column">
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo $__env->make('footer.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <cookie-monster :cookie="<?php echo e($cookiePolicy ? 'true' : 'false'); ?>"></cookie-monster>
        <scroll-top-button></scroll-top-button>
    </div>

    <?php echo $__env->yieldContent('scripts'); ?>
    <script src="<?php echo e(secure_asset('js/manifest.js')); ?>"></script>
    <script src="<?php echo e(secure_asset('js/vendor.js')); ?>"></script>
    <script src="<?php echo e(secure_asset('js/app.js')); ?>"></script>

    <?php if(app()->isLocal()): ?>
        <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
    <?php endif; ?>

    <?php if(app()->environment('production')): ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146799199-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-146799199-1');
        </script>
    <?php endif; ?>
</body>

</html>
<?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/layouts/master.blade.php ENDPATH**/ ?>