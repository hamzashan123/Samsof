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
                    <li><a href="<?php echo e(route('admin.members.index')); ?>">Members</a></li>
                    <li class="is-active"><a href="#" aria-current="page"><?php echo e(isset($member) ? 'Edit' : 'Create'); ?></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            <?php if($errors->count()): ?>
                <div class="notification is-danger">
                    <?php echo e($errors->first()); ?>

                </div>
            <?php endif; ?>
            <form method="post" action="<?php echo e(isset($member) ? route('admin.members.update', $member->id) : route('admin.members.store')); ?>" >
                <?php echo csrf_field(); ?>
                <?php echo method_field(isset($member) ? 'put' : 'post'); ?>
                <div class="columns">
                    <div class="column">
                        <label class="label">First Names</label>
                        <input class="input <?php echo e($errors->has('first_name') ? 'is-danger' : null); ?>" type="text"
                               name="first_name"  value="<?php echo e(old('first_name') ?: (isset($member) ? $member->first_name : '')); ?>">
                    </div>
                    <div class="column">
                        <label class="label">Last Name</label>
                        <input class="input <?php echo e($errors->has('last_name') ? 'is-danger' : null); ?>" type="text"
                               name="last_name"  value="<?php echo e(old('last_name') ?: (isset($member) ? $member->last_name : '')); ?>">
                    </div>
                    <div class="column">
                        <label class="label">Date of birth</label>
                        <input class="input <?php echo e($errors->has('id_number') ? 'is-danger' : null); ?>" type="text"
                               name="id_number" value="<?php echo e(old('id_number') ?: (isset($member) ? $member->id_number : '')); ?>">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <list-editor :items="<?php echo e(isset($member) ? json_encode($member->qualifications) : '[]'); ?>"
                                label="Qualification"
                                name="qualifications"
                                :error="<?php echo e($errors->has('qualifications') ? 'true' : 'false'); ?>"></list-editor>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <city-selector
                            :countries="<?php echo e($countries); ?>"
                            :member="<?php echo e($member ?: 'null'); ?>"
                            :old-country="<?php echo e(old('country_id') ?: 'null'); ?>"
                            :old-city="<?php echo e(old('city_id') ?: 'null'); ?>"
                            :old-hospital="<?php echo e(old('hospital_id') ?: 'null'); ?>"
                            country-selector-name="country_id"
                            city-select-name="city_id"
                        >
                        </city-selector>
                        <address-editor name="coordinates"
                                        value="<?php echo e(old('address') ?: (isset($member) ? $member->address : null)); ?>"></address-editor>

                        <div class="field">
                            <label class="label">Alternate Practice Address</label>
                            <textarea class="textarea" name="alt_address"><?php echo e(old('alt_address') ?: (isset($member) ? $member->alt_address : null)); ?></textarea>
                        </div>
                        <hr>
                        <hospitals-editor
                            name="hospitals"
                            :hospitals="<?php echo e($hospitals); ?>"
                            :member="<?php echo e(isset($member) ? $member : 'null'); ?>"
                            :countries="<?php echo e($countries); ?>"
                            :cities="<?php echo e($cities); ?>"
                        ></hospitals-editor>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label class="label">Primary Email</label>
                        <input class="input <?php echo e($errors->has('email') ? 'is-danger' : null); ?>" type="email" name="email"  value="<?php echo e(old('email') ?: (isset($member) ? $member->email : '')); ?>">
                    </div>
                    <div class="column">
                        <label class="label">Practice Email</label>
                        <input class="input <?php echo e($errors->has('practice_email') ? 'is-danger' : null); ?>" type="email" name="practice_email"  value="<?php echo e(old('practice_email') ?: (isset($member) ? $member->practice_email : '')); ?>">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label class="label">Practice Telephone</label>
                        <input class="input <?php echo e($errors->has('telephone') ? 'is-danger' : null); ?>" type="text" name="telephone"  value="<?php echo e(old('telephone') ?: (isset($member) ? $member->telephone : '')); ?>">
                    </div>
                    <div class="column">
                        <label class="label">Alternate Practice Telephone</label>
                        <input class="input <?php echo e($errors->has('alt_telephone') ? 'is-danger' : null); ?>" type="text" name="alt_telephone"  value="<?php echo e(old('alt_telephone') ?: (isset($member) ? $member->alt_telephone : '')); ?>">
                    </div>
                    <div class="column">
                        <label class="label">Mobile</label>
                        <input class="input <?php echo e($errors->has('mobile') ? 'is-danger' : null); ?>" type="text" name="mobile"  value="<?php echo e(old('mobile') ?: (isset($member) ? $member->mobile : '')); ?>">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div>
                            <label class="checkbox">
                                <input type="checkbox" name="active" :checked="<?php echo e(isset($member) && !$member->active ? 'false' : 'true'); ?>">
                                Member is active
                            </label>
                        </div>
                        <div>
                            <label class="checkbox">
                                <input type="checkbox" name="published" :checked="<?php echo e(isset($member) && !$member->published ? 'false' : 'true'); ?>">
                                Member is published
                            </label>
                        </div>
                    </div>
                    <div class="column">
                        <b-field label="Membership Type">
                            <b-select placeholder="Membership Type" name="membership_type" value="<?php echo e(old('membership_type') ?: (isset($member) ? $member->membership_type : null)); ?>">
                                <?php $__currentLoopData = config('sasmfos.membership.types'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" key="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </b-select>
                        </b-field>
                    </div>
                    <div class="column">
                        <label class="label">Nominated By</label>
                        <input class="input <?php echo e($errors->has('nominated_by') ? 'is-danger' : null); ?>" type="text" name="nominated_by"  value="<?php echo e(old('nominated_by') ?: (isset($member) ? $member->nominated_by : '')); ?>">
                    </div>
                    <div class="column">
                        <label class="label">Seconded By</label>
                        <input class="input <?php echo e($errors->has('seconded_by') ? 'is-danger' : null); ?>" type="text" name="seconded_by"  value="<?php echo e(old('fax') ?: (isset($member) ? $member->seconded_by : '')); ?>">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label class="label">Membership Payment Date</label>
                        <?php if($member): ?>
                            <date-time-picker selected-date="<?php echo e($member->payment_at ? date($member->payment_at) : $date); ?>"
                                field-name="payment_at"
                                :time-active="false"></date-time-picker>
                        <?php else: ?>
                            <date-time-picker selected-date="<?php echo e($date); ?>"
                                field-name="payment_at"
                                :time-active="false"></date-time-picker>
                        <?php endif; ?>
                    </div>
                    <div class="column">
                        <label class="label">Membership Expiry Date</label>
                        <?php if($member->expires_at): ?>
                            <date-time-picker selected-date="<?php echo e(date($member->expires_at)); ?>"
                                field-name="expires_at"
                                :time-active="false"></date-time-picker>
                        <?php else: ?>
                            <date-time-picker selected-date="<?php echo e($date); ?>"
                                field-name="expires_at"
                                :time-active="false"></date-time-picker>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <object-list-editor :label-items="<?php echo e(isset($member) ? json_encode($member->interests) : '[]'); ?>"
                                label="Interests"
                                name="interests"
                                :error="<?php echo e($errors->has('interests') ? 'true' : 'false'); ?>"></object-list-editor>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-header-title">Password</strong>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            Enter a new password to reset. Leave blank to leave the password unaltered.
                        </div>
                        <password-editor name="password"></password-editor>
                    </div>
                </div>
                <div class="columns pt-2 pb-2">
                    <div class="column">
                        <div class="card mt-2 mb-2">
                            <div class="card-header">
                                <strong class="card-header-title">Member Certificate</strong>
                            </div>
                            <div class="card-content">
                                <file-uploader name="certificate"
                                    endpoint="<?php echo e(route('admin.pdf.upload')); ?>"></file-uploader>  
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card mt-2 mb-2">
                            <div class="card-header">
                                <strong class="card-header-title">AO CMF Voucher</strong>
                            </div>
                            <div class="card-content">
                                <file-uploader name="voucher"
                                    endpoint="<?php echo e(route('admin.pdf.upload')); ?>"></file-uploader>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="<?php echo e(isset($member) ? 'edit' : 'plus'); ?>"></fa>
                            </span>
                            <span>
                                <?php echo e(isset($member) ? 'Update Member' : 'Add Member'); ?>

                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('services.google.cloud.key')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', ['active' => 'members'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\All about Laravel\sasmfos-website-main\sasmfos-website-main\resources\views/admin/members/edit.blade.php ENDPATH**/ ?>