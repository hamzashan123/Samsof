<section class="footer-social-container">
    <div class="container content-container">
        <div class="columns align-center">
            <div class="column">
                <div class="columns align-center has-text-centered-touch">
                    <div class="column is-3">
                        <a href="https://www.sada.co.za"><img class="logo" src="/images/logos/SADA.jpg" alt="SADA"></a>
                    </div>
                    <div class="column">
                        <a href="https://www.iaoms.org"><img class="logo" src="/images/logos/MSF.jpg" alt="MSF"></a>
                    </div>
                    <div class="column ml-1">
                        <a href="https://www.hpcsa.co.za"><img class="logo" src="/images/logos/HPCSA.jpg" alt="HPCSA"></a>
                    </div>
                </div>
            </div>
            <div class="column is-3">
                <form method="get" action="<?php echo e(route('search')); ?>">
                    <div class="control has-icons-right">
                        <input name="q" class="input is-rounded is-small" type="text" placeholder="" value="<?php echo e(request('q')); ?>">
                        <span class="icon is-small is-right">
                            <fa icon="search"></fa>
                        </span>
                    </div>
                </form>
            </div>
            <div class="column has-text-primary has-text-right has-text-centered-touch is-2">
                <a href="<?php echo e(config('sasmfos.social.linkedin')); ?>" class="footer-btns">
                    <img src="/images/icons/footer/linkedin.svg" alt="" class="fit-image">
                </a>
                <a href="<?php echo e(config('sasmfos.social.twitter')); ?>" class="footer-btns">
                    <img src="/images/icons/footer/twitter.svg" alt="" class="fit-image">
                </a>
                <a href="<?php echo e(config('sasmfos.social.facebook')); ?>" class="footer-btns">
                    <img src="/images/icons/footer/facebook.svg" alt="" class="fit-image">
                </a>
                <a href="<?php echo e(config('sasmfos.social.youtube')); ?>" class="footer-btns">
                    <img src="/images/icons/footer/youtube.svg" alt="" class="fit-image">
                </a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/footer/social.blade.php ENDPATH**/ ?>