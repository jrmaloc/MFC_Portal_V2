<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.starter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <a href="<?php echo e(route('announcements.index')); ?>"><?php echo app('translator')->get('translation.announcements'); ?></a>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e($title); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="flex"></div>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class=" mb-5">
                        <h6 class="mb-3 fw-semibold text-uppercase"><?php echo e($title); ?></h6>
                        <?php echo $content; ?>

                    </div>

                    <div class="text-muted">
                        <span>Send to:</span>
                        <div class="row">
                            <span class="col"><?php echo e($send_to); ?></span>
                        </div>
                    </div>

                    <div class="mt-5 card-footer">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="<?php echo e(route('announcements.edit', ['announcement' => $announcement->id])); ?>"
                                class="btn btn-success"><i class="ri-pencil-line"></i> <?php echo app('translator')->get('translation.edit'); ?></a>
                            <button type="button" class="btn btn-danger del-btn" id="<?php echo e($announcement->id); ?>"><i
                                    class="ri-delete-bin-line"></i>
                                <?php echo app('translator')->get('translation.delete'); ?></button>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row text-muted">
                        <span>Created at: <?php echo e($created_at); ?></span>
                        <span>Last Updated at: <?php echo e($updated_at); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            $('.del-btn').click(function() {
                var id = $(this).attr('id');
                showDeleteMessage({
                    message: 'Are you sure you want to Delete this Announcement?',
                    deleteFunction: function() {
                        // some function
                        $.ajax({
                            url: '/announcement/' + id,
                            type: 'DELETE',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                showSuccessMessage(response.message);
                            },
                            error: function(xhr, response) {
                                showErrorMessage(response.message);
                            }
                        });
                    }
                })
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GoDesQ3\Downloads\MFC_Portal_V2\resources\views/pages/announcements/show.blade.php ENDPATH**/ ?>