<div class="box-shadow">
    <div class="has-text-white has-text-weight-bold has-background-warning p pl-1-5 top-left-border-radius">
        Important announcements
    </div>
    <div class="has-background-white-ter p-1-5">
        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->index === 1 | $loop->index === 2): ?>
                <div class="thicker-white-horizontal-line mb-1 mt-1"></div>
            <?php endif; ?>
            <a class="is-size-6 subtitle has-text-weight-medium" href="<?php echo e($announcement->link); ?>"><?php echo e($announcement->title); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="mt-2 box-shadow">
    <div class="has-text-white has-text-weight-bold has-background-success p pl-1-5 top-left-border-radius">
        Thought leadership & opinions
    </div>
    <div class="has-background-white-ter p-1-5">
        <?php $__currentLoopData = $opinions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $opinion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->index === 1 | $loop->index === 2): ?>
                <div class="thicker-white-horizontal-line mb-1 mt-1"></div>
            <?php endif; ?>
            <?php if($opinion->content): ?>
                <a class="is-size-6 subtitle has-text-weight-medium" href="<?php echo e(route('media')); ?>#opinions"><?php echo e($opinion->title); ?></a>
            <?php else: ?>
                <a class="is-size-6 subtitle has-text-weight-medium" href="<?php echo e(route('media')); ?>#opinions"><?php echo e($opinion->title); ?></a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="mt-2 box-shadow">
    <div class="has-text-white has-text-weight-bold has-background-primary p pl-1-5 top-left-border-radius">
        Member’s Only
    </div>
    <div class="has-background-white-ter p-1-5">
        <p class="is-size-6 subtitle has-text-weight-medium">This area contains links to resources on the website that are only available to members of SASMFOS.</p>
        <div class="thicker-white-horizontal-line"></div>
        <div class="has-text-centered mt-2 mb-1">
            <a class="button is-small is-warning is-rounded is-uppercase" href="<?php echo e(route('members.login')); ?>">Member Access</a>
            <a class="button is-small is-primary is-rounded is-uppercase" href="<?php echo e(route('members.register')); ?>">Join</a>
        </div>
    </div>
</div>
<?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/home/features/achievements/announcements.blade.php ENDPATH**/ ?>