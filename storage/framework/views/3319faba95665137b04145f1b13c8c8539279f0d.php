<?php $__env->startSection('content'); ?>
    <page-banner src="<?php echo e(asset('images/banners/who-we-are.jpg')); ?>">
        <template v-slot:title>
            <span>SASMFOS</span> Members
        </template>
    </page-banner>
    <div class="member-login">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h1 class="title has-text-primary has-text-weight-normal has-text-grey">Members Login</h1>
                    <hr>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third mb-5">
                    <?php if($errors->count()): ?>
                        <div class="notification is-danger">
                            <?php echo e($errors->first()); ?>

                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('members.login')); ?>">
                        <?php echo csrf_field(); ?>

                        <b-field label="Email Address">
                            <b-input type="email" name="email" value="<?php echo e(old('email')); ?>"></b-input>
                        </b-field>
                        <b-field label="Password">
                            <b-input type="password" name="password"></b-input>
                        </b-field>

                        <b-button type="is-primary" native-type="submit">LOGIN</b-button>
                        <a href="<?php echo e(route('members.register')); ?>" class="button is-secondary is-uppercase">REGISTER</a>

                    </form>
                    <hr>
                    Having trouble logging in? <a href="<?php echo e(route('password.request')); ?>">Reset your password</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/auth/login.blade.php ENDPATH**/ ?>