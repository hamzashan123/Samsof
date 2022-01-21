<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">

        <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            
            $(document).ready(function() {
               
                alert('test');
            });
        </script>
        <?php if(app()->isLocal()): ?>
            <script src="http://localhost:8098"></script>
        <?php endif; ?>
    </head>
    <body>
        <div id="app">
            <?php if(Auth::check()): ?>
                <site-layout username="SASMFOS" active="<?php echo e($active); ?>">
                    <div slot="page">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </site-layout>
            <?php else: ?>
                <?php echo $__env->yieldContent('content'); ?>
            <?php endif; ?>
        </div>

        
        <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
        <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
        <?php echo $__env->yieldContent('scripts'); ?>

        <script src="<?php echo e(mix('js/manifest.js')); ?>"></script>
        <script src="<?php echo e(mix('js/vendor.js')); ?>"></script>
        <script src="<?php echo e(mix('js/app.js')); ?>"></script>

        <?php if(app()->isLocal()): ?>
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        <?php endif; ?>

    </body>
  
</html>
<?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/layouts/admin.blade.php ENDPATH**/ ?>