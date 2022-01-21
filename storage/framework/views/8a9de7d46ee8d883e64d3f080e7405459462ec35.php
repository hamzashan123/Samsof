<div class="columns is-gapless">
    <div class="column">
        <section class="quotation-container">
            <div class="container content-container-less-right">
                <div class="columns align-center">
                    <div class="column is-4"></div>
                    <div class="column">
                        <div class="pl-3-desktop-up">
                            <h3 class="title is-3 is-uppercase has-text-white has-text-centered-touch">Value Quotations
                            </h3>
                        </div>
                    </div>
                    <div class="column">
                        <div class="columns align-center">
                            <div class="column is-3 pl-4">
                            </div>
                            <div class="column has-text-centered">
                                <div class="white-horizontal-line"></div>
                            </div>
                            <div class="column is-narrow has-text-right has-text-centered-touch pl-2-desktop-up">
                                <img src="/images/icons/quotations-icon.png" alt="Quotation Icon" class="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php echo $__env->make('home.features.quotes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('home.partials.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/home/features/quotations.blade.php ENDPATH**/ ?>