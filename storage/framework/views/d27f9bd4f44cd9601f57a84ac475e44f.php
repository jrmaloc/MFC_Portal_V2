<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.announcements'); ?> Edit
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('translation.announcements'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e($title); ?> Edit
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <form class="announcements_tablelist_form" autocomplete="off"
        action="<?php echo e(route('announcements.update', ['announcement' => $announcement->id])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div>
                                        <label for="announcementTitle-field" class="form-label">What?</label>
                                        <input name="title" type="text" id="announcementTitle-field"
                                            class="form-control" placeholder="Title" required
                                            value="<?php echo e(old('title', $title)); ?>" />
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Content</label>
                                        <textarea name="content" class="ckeditor-classic"><?php echo $content; ?></textarea>
                                    </div>
                                </div>
                                <?php if(!$section && !$service): ?>
                                    <div class="col-lg-6 <?php echo e($send_to == 'Everyone' ? 'd-none' : ''); ?>" id="who_group">
                                        <label for="service" class="form-label">Who?</label>
                                        <select class="form-control" data-plugin="choices" name="service" id="service"
                                            data-choices data-choices-search-false data-choices-removeItem>
                                            <option value="">Service</option>
                                            <option value="1">Area Servants</option>
                                            <option value="2">Chapter Servants</option>
                                            <option value="3">Unit Servants</option>
                                            <option value="4">Household Servants</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 <?php echo e($send_to == 'Everyone' ? 'd-none' : ''); ?>" id="who_group">
                                        <label for="section" class="form-label" style="color: transparent;">x</label>
                                        <select class="form-control" data-plugin="choices" name="section" id="section"
                                            data-choices data-choices-search-false data-choices-removeItem>
                                            <option value="">Section</option>
                                            <option value="1">Kids</option>
                                            <option value="2">Youth</option>
                                            <option value="3">Singles</option>
                                            <option value="4">Handmaids</option>
                                            <option value="5">Servants</option>
                                            <option value="6">Couples</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if($section == null && $service): ?>
                                    <div class="col-lg-6 <?php echo e($send_to == 'Everyone' ? 'd-none' : ''); ?>" id="who_group">
                                        <label for="service" class="form-label">Who?</label>
                                        <select class="form-control" data-plugin="choices" name="service" id="service"
                                            data-choices data-choices-search-false data-choices-removeItem>
                                            <option value="">Service</option>
                                            <option value="1" <?php echo e($service->id == '1' ? 'selected' : ''); ?>>Area Servants
                                            </option>
                                            <option value="2" <?php echo e($service->id == '2' ? 'selected' : ''); ?>>Chapter
                                                Servants</option>
                                            <option value="3" <?php echo e($service->id == '3' ? 'selected' : ''); ?>>Unit Servants
                                            </option>
                                            <option value="4" <?php echo e($service->id == '4' ? 'selected' : ''); ?>>Household
                                                Servants</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 <?php echo e($send_to == 'Everyone' ? 'd-none' : ''); ?>" id="who_group">
                                        <label for="section" class="form-label" style="color: transparent;">x</label>
                                        <select class="form-control" data-plugin="choices" name="section" id="section"
                                            data-choices data-choices-search-false data-choices-removeItem>
                                            <option value="">Section</option>
                                            <option value="1">Kids</option>
                                            <option value="2">Youth</option>
                                            <option value="3">Singles</option>
                                            <option value="4">Handmaids</option>
                                            <option value="5">Servants</option>
                                            <option value="6">Couples</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if($section && $service == null): ?>
                                    <div class="col-lg-6 <?php echo e($send_to == 'Everyone' ? 'd-none' : ''); ?>" id="who_group">
                                        <label for="service" class="form-label">Who?</label>
                                        <select class="form-control" data-plugin="choices" name="service" id="service"
                                            data-choices data-choices-search-false data-choices-removeItem>
                                            <option value="">Service</option>
                                            <option value="1">Area Servants</option>
                                            <option value="2">Chapter Servants</option>
                                            <option value="3">Unit Servants</option>
                                            <option value="4">Household Servants</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 <?php echo e($send_to == 'Everyone' ? 'd-none' : ''); ?>" id="who_group">
                                        <label for="section" class="form-label" style="color: transparent;">x</label>
                                        <select class="form-control" data-plugin="choices" name="section" id="section"
                                            data-choices data-choices-search-false data-choices-removeItem>
                                            <option value="">Section</option>
                                            <option value="1" <?php echo e($section->id == '1' ? 'selected' : ''); ?>>Kids
                                            </option>
                                            <option value="2" <?php echo e($section->id == '2' ? 'selected' : ''); ?>>Youth
                                            </option>
                                            <option value="3" <?php echo e($section->id == '3' ? 'selected' : ''); ?>>Singles
                                            </option>
                                            <option value="4" <?php echo e($section->id == '4' ? 'selected' : ''); ?>>Handmaids
                                            </option>
                                            <option value="5" <?php echo e($section->id == '5' ? 'selected' : ''); ?>>Servants
                                            </option>
                                            <option value="6" <?php echo e($section->id == '6' ? 'selected' : ''); ?>>Couples
                                            </option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if($service && $section): ?>
                                    <div class="col-lg-6 <?php echo e($send_to == 'Everyone' ? 'd-none' : ''); ?>" id="who_group">
                                        <label for="service" class="form-label">Who?</label>
                                        <select class="form-control" data-plugin="choices" name="service" id="service"
                                            data-choices data-choices-search-false data-choices-removeItem>
                                            <option value="">Service</option>
                                            <option value="1" <?php echo e($service->id == '1' ? 'selected' : ''); ?>>Area
                                                Servants
                                            </option>
                                            <option value="2" <?php echo e($service->id == '2' ? 'selected' : ''); ?>>Chapter
                                                Servants</option>
                                            <option value="3" <?php echo e($service->id == '3' ? 'selected' : ''); ?>>Unit
                                                Servants
                                            </option>
                                            <option value="4" <?php echo e($service->id == '4' ? 'selected' : ''); ?>>Household
                                                Servants</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 <?php echo e($send_to == 'Everyone' ? 'd-none' : ''); ?>" id="who_group">
                                        <label for="section" class="form-label" style="color: transparent;">x</label>
                                        <select class="form-control" data-plugin="choices" name="section" id="section"
                                            data-choices data-choices-search-false data-choices-removeItem>
                                            <option value="">Section</option>
                                            <option value="1" <?php echo e($section->id == '1' ? 'selected' : ''); ?>>Kids
                                            </option>
                                            <option value="2" <?php echo e($section->id == '2' ? 'selected' : ''); ?>>Youth
                                            </option>
                                            <option value="3" <?php echo e($section->id == '3' ? 'selected' : ''); ?>>Singles
                                            </option>
                                            <option value="4" <?php echo e($section->id == '4' ? 'selected' : ''); ?>>Handmaids
                                            </option>
                                            <option value="5" <?php echo e($section->id == '5' ? 'selected' : ''); ?>>Servants
                                            </option>
                                            <option value="6" <?php echo e($section->id == '6' ? 'selected' : ''); ?>>Couples
                                            </option>
                                        </select>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-check form-check-success mt-4">
                                <input name="send_to_all" class="form-check-input" type="checkbox" id="send_to_all"
                                    <?php echo e($send_to == 'Everyone' ? 'checked=""' : ''); ?>>
                                <label class="form-check-label" for="send_to_all">
                                    Send to all?
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="card-title">
                                <?php echo app('translator')->get('translation.status'); ?>
                            </h5>
                            <p class="card-text">
                                <span>Created at: <?php echo e($created_at); ?></span>
                            </p>
                            <p class="card-text">
                                <span>Updated at: <?php echo e($updated_at); ?></span>
                            </p>
                        </div>

                        <div class="mb-5">
                            <label for="status" class="card-title">
                                <?php echo app('translator')->get('translation.status'); ?>
                            </label>
                            <select class="form-control" data-plugin="choices" name="status" id="status"
                                data-choices data-choices-search-false data-choices-removeItem>
                                <option value="">Status</option>
                                <option value="shown" <?php echo e($announcement->status == 'shown' ? 'selected' : ''); ?>>Shown
                                </option>
                                <option value="hidden" <?php echo e($announcement->status == 'hidden' ? 'selected' : ''); ?>>Hidden
                                </option>
                            </select>
                        </div>

                        <div class="">
                            <div class="hstack gap-2 justify-content-end">
                                <a href="<?php echo e(route('announcements.index')); ?>" class="btn btn-light"><?php echo app('translator')->get('translation.back'); ?></a>
                                <button type="submit" class="btn btn-success" id=""><i
                                        class="ri-save-line"></i> <?php echo app('translator')->get('translation.update'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

    

    <script>
        $(document).ready(function() {
            var successMessage = <?php echo json_encode(session('success'), 15, 512) ?>;
            var errorMessage = <?php echo json_encode(session('error'), 15, 512) ?>;

            if (successMessage) {
                showSuccessMessage(successMessage);
            }

            if (errorMessage) {
                showErrorMessage(errorMessage);
            }


            $('#send_to_all').on('change', function() {
                var group = $('div#who_group');
                if ($(this).is(':checked')) {
                    group.addClass('d-none');
                    $('#service').attr('required', false);
                } else {
                    group.removeClass('d-none');
                    $('#service').attr('required', true);
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GoDesQ3\Downloads\MFC_Portal_V2\resources\views/pages/announcements/edit.blade.php ENDPATH**/ ?>