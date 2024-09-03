
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.tithes'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Tithes
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e($endPoint); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row mt-3">
        <div class="col-xl-4">

        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('tithes.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php $__env->startComponent('components.input_fields.basic'); ?>
                                    <?php $__env->slot('id'); ?>
                                        mfc_user_id
                                    <?php $__env->endSlot(); ?>
                                    <?php $__env->slot('name'); ?>
                                        mfc_user_id
                                    <?php $__env->endSlot(); ?>
                                    <?php $__env->slot('label'); ?>
                                        MFC User ID
                                    <?php $__env->endSlot(); ?>
                                    <?php $__env->slot('placeholder'); ?>
                                        MFC User ID
                                    <?php $__env->endSlot(); ?>
                                    <?php $__env->slot('feedback'); ?>
                                        Invalid input. Minimum of 3 characters!
                                    <?php $__env->endSlot(); ?>
                                    <?php $__env->slot('value'); ?>
                                        <?php echo e(auth()->user()->mfc_id_number); ?>

                                    <?php $__env->endSlot(); ?>
                                <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Registration Fee</label>
                                    <div class="form-icon">
                                        <input type="text" oninput="validateDigit(this)" id="amount"
                                            class="form-control form-control-icon" name="amount"
                                            placeholder="" value="50" min="50">
                                        <i class="fst-normal">₱</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" style="width: 100%">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GodesQ\MFC_Portal_V2\resources\views/pages/tithes/create.blade.php ENDPATH**/ ?>