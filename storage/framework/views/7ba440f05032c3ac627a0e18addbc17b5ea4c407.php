<div class="columns is-gapless is-hidden-mobile">
    <div class="column">
        <div class="columns is-gapless is-mobile">
            <div class="column is-5 join-us-background">
            </div>
            <div class="column is-4 red-bg has-text-white">
                <div class="p-2 has-text-centered-touch">
                    <h1 class="title is-3 is-uppercase has-text-white">Private Public Initiatives</h1>
                    <p class="is-size-6">SASMFOS puts patients first. We assist patients in the public sector and those who are economically challenged to access first-class specialist medical services. </p>
                </div>
            </div>
            <div class="column dark-red-bg is-flex">
                <div class="p-2 align-bottom">
                    <a href="<?php echo e(route('cares')); ?>" class="button is-danger is-rounded is-uppercase"><strong>SASMFOS Cares</strong></a>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('home.partials.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="columns is-gapless is-hidden-tablet">
    <div class="column">
        <div class="columns is-gapless">
            <div class="column is-5 join-us-background is-hidden-mobile">
            </div>
            <div class="column red-bg has-text-white">
                <div class="p-2 has-text-centered-touch">
                    <h1 class="title is-3 is-uppercase has-text-white">Private Public Initiatives</h1>
                    <p class="is-size-6">SASMFOS puts patients first. We assist patients in the public sector and those who are economically challenged to access first-class specialist medical services. </p>
                </div>
            </div>
            <div class="column dark-red-bg has-text-white pb-2 has-text-centered-touch">
                <a href="<?php echo e(route('cares')); ?>" class="button is-danger is-rounded is-uppercase mt-3 mb-3"><strong>SASMFOS Cares</strong></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Fundile\Documents\GitHub\sasmfos-website\resources\views/home/features/join-us.blade.php ENDPATH**/ ?>