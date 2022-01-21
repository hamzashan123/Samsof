<div class="columns is-gapless" id="events">
        <div class="column">
            <section class="events-container">
                <div class="container">
                    <div class="content-container-less-right">
                        <div class="columns align-center has-text-centered-touch">
                            <div class="column is-4"></div>
                            <div class="column">
                                <div class="">
                                    <h3 class="title is-3 is-uppercase has-text-white">Upcoming Events</h3>
                                </div>
                            </div>
                            <div class="column">
                                <div class="columns align-center">
                                    <div class="column is-3 pl-4">
                                    </div>
                                    <div class="column has-text-centered">
                                        <div class="white-horizontal-line"></div>
                                    </div>
                                    <div class="column is-narrow has-text-right pl-2-desktop-up has-text-centered-touch">
                                        <img src="/images/icons/calendar-icon.png" alt="Calendar Icon" class="icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <event-scroller :events="<?php echo e($events); ?>"></event-scroller>
                </div>
            </section>
        </div>
        <?php echo $__env->make('home.partials.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php /**PATH C:\Users\Fundile\Documents\GitHub\sasmfos-website\resources\views/home/features/upcoming-events.blade.php ENDPATH**/ ?>