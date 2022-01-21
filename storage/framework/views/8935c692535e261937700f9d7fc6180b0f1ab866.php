<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
    <div class="has-background-white">
        <covid-banner></covid-banner>
        <home-hero-banner :slider-images="<?php echo e(json_encode($sliderImages)); ?>"></home-hero-banner>
        <feature-grid></feature-grid>
    </div>

    <?php echo $__env->make('home.features.upcoming-events', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('home.features.join-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('home.features.breaking-the-myths', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('home.features.latest-achievements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div style="margin-top: -2em; position: relative">
        <ask-sasmfos :image="false" :home-page="true"></ask-sasmfos>
    </div>
    <?php echo $__env->make('home.features.quotations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', ['rightGap' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fundile\Documents\GitHub\sasmfos-website\resources\views/home.blade.php ENDPATH**/ ?>