<?php $__env->startSection('title', 'Who We Are'); ?>
<?php $__env->startSection('content'); ?>
    <navigator active="who"></navigator>
    <page-banner src="<?php echo e(asset('images/banners/who-we-are.jpg')); ?>" :breadcrumb="['Home']" placement="top">
        <template v-slot:title>
            <span>Member</span> Registration
        </template>
    </page-banner>

    <registration-form :countries="<?php echo e($countries); ?>"
                       :cities="<?php echo e($cities); ?>"
                       :hospitals="<?php echo e($hospitals); ?>" :registered="<?php echo e(session()->has('registered') ? 'true' : 'false'); ?>"></registration-form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', ['footerSidebar' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fundile\Documents\GitHub\sasmfos-website\resources\views/auth/register.blade.php ENDPATH**/ ?>