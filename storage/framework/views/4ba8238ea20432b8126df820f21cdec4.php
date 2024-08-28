

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.attendance_report'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Attendance
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e($endPoint); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Event Details</h3>
                </div>
                <div class="card-body">
                    <img src="<?php echo e(URL::asset('uploads/' . $event->poster)); ?>" alt="" class="rounded"
                                style="width: 100%; max-height: 200px; object-fit: cover;">
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">  
                <div class="card-header">
                    <h3>
                        
                    </h3>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MFC_Portal_V2\resources\views/pages/reports/event-attendance-report.blade.php ENDPATH**/ ?>