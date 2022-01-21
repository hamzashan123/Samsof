<?php $__env->startSection('content'); ?>
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                Dashboard
            </h1>
        </div>
    </div>
</section>
<div class="section">
    <div class="columns">
        <div class="column">
            <div class="card">
                <header class="card-header has-background-light">
                    <div class="card-header-icon">
                        <span class="icon">
                            <fa icon="calendar-day"></fa>
                        </span>
                    </div>
                    <p class="card-header-title">
                        Upcoming Events
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="columns">
                                <div class="column">
                                    <?php echo e($event->title); ?> <span class="tag"><?php echo e($event->starts_at); ?></span>
                                </div>
                                <div class="column is-one-fifth">
                                    <a class="button is-success is-outlined is-pulled-right">
                                        <span class="icon">
                                            <fa icon="edit"></fa>
                                        </span>
                                        <span>
                                            Edit
                                        </span>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if($ongoingEvents->count()): ?>
                    <header class="card-header has-background-light">
                        <div class="card-header-icon">
                            <span class="icon">
                                <fa icon="calendar-week"></fa>
                            </span>
                        </div>
                        <p class="card-header-title">
                            Ongoing Events
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <?php $__currentLoopData = $ongoingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="columns">
                                    <div class="column">
                                        <?php echo e($event->title); ?> <span class="tag"><?php echo e($event->starts_at); ?></span>
                                    </div>
                                    <div class="column is-one-fifth">
                                        <a class="button is-success is-outlined is-pulled-right">
                                            <span class="icon">
                                                <fa icon="edit"></fa>
                                            </span>
                                            <span>
                                                Edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <footer class="card-footer">
                    <a class="card-footer-item" href="<?php echo e(route('admin.calendar')); ?>">
                        <span class="icon">
                            <fa icon="calendar-day"></fa>
                        </span>
                        <span>
                            View Calendar
                        </span>
                    </a>
                    <a class="card-footer-item" href="<?php echo e(route('admin.events.create')); ?>">
                        <span class="icon">
                            <fa icon="plus"></fa>
                        </span>
                        <span>
                            Create Event
                        </span>
                    </a>
                </footer>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', ['active' => 'dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>