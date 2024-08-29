
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

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid my-3">
                            <div class="mb-3 border-bottom">
                                <h3>User Details</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="firstname">First Name</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->user->first_name); ?></h5>
                                </div>
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="lastname">Last Name</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->user->last_name); ?></h5>
                                </div>
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="middlename">Middle Name</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->user->middle_name ?? 'N/A'); ?></h5>
                                </div>
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="username">Username</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->user->username ?? 'N/A'); ?></h5>
                                </div>
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="email">Email</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->user->email); ?></h5>
                                </div>
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="contact_number">Contact Number</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->user->contact_number ?? 'N/A'); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid my-3">
                            <div class="mb-3 border-bottom">
                                <h3>Transaction Details</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="firstname">Transaction Code</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->transaction->transaction_code); ?></h5>
                                </div>
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="lastname">Reference Code</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->transaction->reference_code); ?></h5>
                                </div>
                                <div class="col-lg-4 my-2">
                                    <label class="text-primary" for="middlename">Checkout ID</label>
                                    <h5 class="font-bold fs-13 text-black"><?php echo e($tithe->transaction->checkout_id); ?></h5>
                                </div>
                                <div class="col-lg-12 my-2">
                                    <label class="text-primary" for="middlename">Payment Link</label> <br>
                                    <a href="<?php echo e($tithe->transaction->payment_link); ?>" class="text-black"><?php echo e($tithe->transaction->payment_link); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 border-bottom">
                            <h3>Tithe Summary</h3>
                        </div>
                        <div class="row my-2">
                            <div class="col-xl-6">
                                <h6 class="text-primary">Sub Amount</h6>
                            </div>
                            <div class="col-xl-6">
                                <h6 id="sub_amount_text">₱ <?php echo e(number_format($tithe->transaction->sub_amount, 2)); ?></h6>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-xl-6">
                                <h6 class="text-primary">Total Amount</h6>
                            </div>
                            <div class="col-xl-6">
                                <h6 id="total_amount_text">₱ <?php echo e(number_format($tithe->transaction->total_amount, 2)); ?></h6>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-xl-6">
                                <h6 class="text-primary">Status</h6>
                            </div>
                            <div class="col-xl-6">
                                <?php if($tithe->status == 'paid'): ?>
                                    <div class="badge bg-success">Paid</div>
                                <?php elseif($tithe->status == 'unpaid'): ?>
                                    <div class="badge bg-warning">Unpaid</div>
                                <?php else: ?>
                                    <div class="badge bg-info"><?php echo e($tithe->status); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                        <?php if($tithe->status == 'unpaid'): ?>
                            <a href="<?php echo e($tithe->transaction->payment_link); ?>" class="btn btn-primary" style="width: 100%;">Pay</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GodesQ\MFC_Portal_V2\resources\views/pages/tithes/show.blade.php ENDPATH**/ ?>