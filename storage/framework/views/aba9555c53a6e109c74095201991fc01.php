

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
                    <img src="<?php echo e(URL::asset('uploads/' . $event->poster)); ?>" alt="" class="rounded mb-2"
                        style="width: 100%; max-height: 200px; object-fit: cover;">
                    <h3><?php echo e($event->title); ?></h3>
                    <div class="flex gap-2">
                        <span class="bg-primary badge text-uppercase">Worldwide</span>
                        <span class="badge bg-primary text-uppercase"><?php echo e($event->section->name); ?></span>
                    </div>
                    <div class="my-2">
                        <?php echo $event->description; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-xxl-6 col-md-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Attendance Report</h4>
                                    <div class="flex-shrink-0">
                                        
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body pb-0">
                                    <div id="sales-forecast-chart"
                                        data-colors='["--vz-primary", "--vz-success", "--vz-warning"]'
                                        data-colors-minimal='["--vz-primary-rgb, 0.75", "--vz-primary", "--vz-primary-rgb, 0.55"]'
                                        data-colors-creative='["--vz-primary", "--vz-secondary", "--vz-info"]'
                                        data-colors-corporate='["--vz-primary", "--vz-success", "--vz-secondary"]'
                                        data-colors-galaxy='["--vz-primary", "--vz-secondary", "--vz-info"]'
                                        data-colors-classic='["--vz-primary", "--vz-warning", "--vz-secondary"]'
                                        class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-xxl-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">Total Users</h4>
                                        <button class="btn btn-primary btn-sm">Print List of Users <i class="ri-printer-line"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                            <tr>
                                                <?php $__currentLoopData = $event_attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th class="text-center"><?php echo e(Carbon::parse($attendance->attendance_date)->format('F d, Y')); ?></th>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php $__currentLoopData = $event_attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td class="text-center"><?php echo e($attendance->user_count); ?></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard-crm.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GodesQ\MFC_Portal_V2\resources\views/pages/reports/event-attendance-report.blade.php ENDPATH**/ ?>