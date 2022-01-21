<?php $__env->startSection('content'); ?>
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-account-card-details"></span>
                </span>
                <span>
                    Members
                </span>
            </h1>
        </div>
    </div>
</section>
<div class="section">
    <div class="columns">
        <div class="column">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Members</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <?php if(session()->has('success')): ?>
        <div class="columns">
            <div class="column">
                <success-notification message="<?php echo e(session()->get('success')); ?>"></success-notification>
            </div>
        </div>
    <?php endif; ?>
    <div class="columns">
        <div class="column">
            <form method="get" action="<?php echo e(route('admin.members.index')); ?>">
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input type="text" class="input" name="search" placeholder="search..." value="<?php echo e($search ?: null); ?>">
                    </div>
                    <?php if($search): ?>
                        <div class="control">
                            <a href="<?php echo e(route('admin.members.index')); ?>" class="button is-danger">
                                <fa icon="times"></fa>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="control">
                        <button class="button is-success">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="column">
            <b-button type="is-success" tag="a" href="<?php echo e(route('admin.members.create')); ?>" icon-left="plus">Register a New Member</b-button>
            <b-button type="is-success" tag="a" href="<?php echo e(route('admin.members.export')); ?>" icon-left="download">Export</b-button>
        </div>
    </div>
    <table class="table is-fullwidth">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>Last Login</th>
            <th>Membership</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($member->name); ?>

                    <?php if(!$member->approved): ?>
                        <div class="has-text-danger">
                            Has not been approved. <a href="<?php echo e(route('admin.members.approve', [$member])); ?>">Approve now</a>
                        </div>
                    <?php endif; ?>
                </td>
                <td><a href="<?php echo e($member->email); ?>"><?php echo e($member->email); ?></a></td>
                <td><?php echo e($member->presentable_last_login_at); ?></td>
                <td>
                    <?php if($member->payable): ?>
                        <?php if(!$member->last_payment_at || $member->last_payment_at->lt(now())): ?>
                            <div class="has-text-danger">
                                Expired <?php echo e($member->next_payment_at ? 'at '.$member->presentable_next_payment_at : ''); ?>

                            </div>
                        <?php else: ?>
                            <div class="has-text-danger">Expires <?php echo e($member->presentable_next_payment_at); ?></div>
                        <?php endif; ?>
                    <?php else: ?>
                        Until <?php echo e($member->presentable_next_payment_at); ?>

                    <?php endif; ?>

                    <?php if($member->pop_uploaded_at && !$member->pop_approved): ?>
                        <div>
                            <strong>Proof of payment uploaded on:</strong>
                            <a href="<?php echo e(route('admin.members.pop.download', [$member])); ?>">
                                <?php echo e($member->presentable_pop_uploaded_at); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                </td>
                <td>



                    <?php if($member->published): ?>
                        <div class="tag is-info" title="<?php echo e($member->name); ?> is published to the SASMFOS website"><fa icon="address-card"></fa></div>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button is-success is-outlined is-pulled-left is-small" href="<?php echo e(route('admin.members.edit', $member->id)); ?>">
                                <span class="icon">
                                    <fa icon="edit"></fa>
                                </span>
                                <span>Edit</span>
                            </a>
                        </p>
                        <p class="control">
                            <delete-button title="Member" action="<?php echo e(route('admin.members.destroy', $member->id)); ?>"></delete-button>
                        </p>
                    </div>
                    <div>
                        <?php if($member->pop_uploaded_at && !$member->pop_approved): ?>
                            <approve-pop :member="<?php echo e($member); ?>"></approve-pop>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="columns">
        <div class="column">
            <?php echo e($members->appends(request()->only('search'))->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', ['active' => 'members'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/admin/members/index.blade.php ENDPATH**/ ?>