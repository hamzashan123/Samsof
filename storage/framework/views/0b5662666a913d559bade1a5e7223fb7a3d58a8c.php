<?php $__env->startSection('content'); ?>
    <navigator active="members"></navigator>
    <page-banner src="<?php echo e(asset('images/banners/find-an-mfo-surgeon.jpg')); ?>" :breadcrumb="['Home']">
        <template v-slot:title>
            Find an <span>MFO Surgeon</span>
        </template>
    </page-banner>

    <floating-image src="<?php echo e(asset('images/tools.jpg')); ?>" alt="Tools" distance="650px"></floating-image>

    <div class="container">
        <div class="columns" id="code-of-conduct">
            <div class="column is-5 is-offset-1">
                <div class="notice-card">
                    <div class="notice-card-heading">
                        <div class="notice-card-icon">
                            <img src="<?php echo e(asset('svg/balance-scale.svg')); ?>" alt="Balance Scale">
                        </div>
                        <h3 class="title">CODE OF CONDUCT</h3>
                    </div>
                    <div class="notice-card-body">
                        SASMFOS strives to uphold its vision, mission and values. These include care, respect, integrity,
                        transparency and innovation. To ensure quality of services and a significant value-add to the South African
                        healthcare and dental value chain, our members agree to our professional Code of Conduct.
                    </div>

                </div>
            </div>
        </div>

        <section class="page-section" id="value">
            <div class="columns">
                <div class="column is-7 is-offset-1">
                    <header class="page-section-header">
                        <div class="icon">
                            <img src="<?php echo e(asset('svg/stethascope-hand.svg')); ?>" alt="Value of using an MFO specialist surgeon">
                        </div>
                        <h3 class="title">Value of using an MFO specialist surgeon</h3>
                    </header>

                    <div class="page-section-body">
                        <p>
                            Patients often assume the only difference between the oral procedures dental practitioners
                            perform and those that maxillofacial and oral surgeons do, is that MFO surgeons charge more
                            than the former. This can’t be further from the truth and could cost a patient dearly
                            especially with regard to particular oral or facial procedures.
                        </p>

                        <h3><strong>Academic expertise in medical, dental and surgery</strong></h3>

                        <p>
                            As a minimum requirement, a South African MFO surgeon must complete a five-year dentistry
                            degree followed by a five-year postgraduate hospital-based residency training programme. Not
                            all candidates follow the same route to becoming an MFO surgeon. Some candidates enter the
                            residency programme with a medical degree and need to still complete a three-year dentistry
                            degree, other candidates may enter the programme with both the dentistry and medical
                            qualifications in hand.
                        </p>

                        <p>
                            The postgraduate training programme includes rotations in general surgery, intensive care,
                            trauma, plastic and reconstructive surgery, ophthalmology, ear, nose, and throat surgery,
                            paediatric surgery and oral pathology, with dedicated clinics in orthognathic surgery,
                            implantology, oncology, temporomandibular joint surgery, pre-prosthetic surgery and oral
                            pathology, implantology, craniofacial surgery and facial clefts including cleft lip and
                            palate. <a class="has-text-info" href="<?php echo e(route('ask')); ?>#procedures">Click here</a> for a full list of procedures.
                        </p>

                        <h3><strong>Dental practitioner or MFO surgeon?</strong></h3>

                        <p>
                            Dental practitioners are skilled and knowledgeable about overall oral health and are trained
                            for correcting a variety of dental issues, like dental restorations and associated ailments,
                            root canals, dental crowns or denture fitting issues.
                        </p>

                        <p>
                            Although MFO surgeons also perform some of these procedures, they have undergone specialist
                            training to address more complex dental and medical issues associated with the head, mouth,
                            jaws, and neck, and can perform more extensive surgeries in both hard and soft tissue
                            regions, correcting a range of minor and major skeletal and dental deformities, including
                            the misalignment of facial structures and teeth. This also includes correcting trauma of the
                            face, facial cleft deformities, orthognathic deformities, doing reconstruction, and treating
                            tumours and cancers, temporomandibular joint problems and facial pain.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section" id="directory">
            <div class="columns">
                <div class="column is-7 is-offset-1">
                    <header class="page-section-header">
                        <div class="icon">
                            <img src="<?php echo e(asset('svg/surgeon.svg')); ?>" alt="Find an MFO surgeon">
                        </div>
                        <h3 class="title">Find an MFO surgeon</h3>
                    </header>
                </div>
                <div class="column-4 is-hidden-mobile" style="margin-top: -300px;">
                    <img src="<?php echo e(asset('images/kidney-bowl-tools.jpg')); ?>" alt="Kidney Bowl and Tools">
                </div>
            </div>
        </section>
    </div>

    <member-search :specialities="<?php echo e($specialities); ?>"
                   :cities="<?php echo e($cities); ?>"
                   :hospitals="<?php echo e($hospitals); ?>" here-token="<?php echo e(config('services.here.key')); ?>"
                   :total-members="<?php echo e($totalMembers); ?>"></member-search>
    <div class="mb-4"></div>
    <ask-sasmfos></ask-sasmfos>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('services.google.cloud.key')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', ['footerSidebar' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Fundile\Documents\GitHub\sasmfos-website\resources\views/members.blade.php ENDPATH**/ ?>