<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'color' => '',
    'route' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'color' => '',
    'route' => '',
]); ?>
<?php foreach (array_filter(([
    'color' => '',
    'route' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<head>

    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/filepond/filepond.min.css')); ?>" type="text/css" />
    <link rel="stylesheet"
        href="<?php echo e(URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')); ?>">
</head>

<div class="modal fade" id="addEventModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content border-0">
            <div class="modal-body">
                <form autocomplete="off" id="createEvent-form" class="needs-validation" novalidate
                    action="<?php echo e($route); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="px-1 pt-1 mb-3">
                                <div
                                    class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                    <img src="<?php echo e(URL::asset('build/images/small/img-8.jpg')); ?>" alt=""
                                        id="cover-img" class="img-fluid">

                                    <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                                        <div class="flex-grow-1">
                                            <h5 class="modal-title text-white" id="createMemberLabel">Add
                                                New Event</h5>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="d-flex gap-3 align-items-center">
                                                <button type="button" class="btn-close btn-close-white"
                                                    id="createMemberBtn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $__env->startComponent('components.input_fields.basic'); ?>
                                <?php $__env->slot('id'); ?>
                                    event_title
                                <?php $__env->endSlot(); ?>
                                <?php $__env->slot('name'); ?>
                                    event_title
                                <?php $__env->endSlot(); ?>
                                <?php $__env->slot('label'); ?>
                                    Title
                                <?php $__env->endSlot(); ?>
                                <?php $__env->slot('placeholder'); ?>
                                    Event Title
                                <?php $__env->endSlot(); ?>
                                <?php $__env->slot('feedback'); ?>
                                    Invalid input. Minimum of 3 characters!
                                <?php $__env->endSlot(); ?>
                            <?php echo $__env->renderComponent(); ?>

                            <div class="row">
                                <div class="col-6">
                                    <?php $__env->startComponent('components.input_fields.choices'); ?>
                                        <?php $__env->slot('label'); ?>
                                            Event Type
                                        <?php $__env->endSlot(); ?>
                                        <?php $__env->slot('id'); ?>
                                            event_type
                                        <?php $__env->endSlot(); ?>
                                        <?php $__env->slot('formId'); ?>
                                            createEvent-form
                                        <?php $__env->endSlot(); ?>
                                        <?php $__env->slot('name'); ?>
                                            event_type
                                        <?php $__env->endSlot(); ?>

                                        <option value="1">Worldwide</option>
                                        <option value="2">National</option>
                                        <option value="3">Regional</option>
                                        <option value="4">NCR</option>
                                        <option value="5">Area</option>
                                        <option value="6">Chapter</option>
                                        <option value="7">Unit</option>
                                        <option value="8">Household</option>
                                    <?php echo $__env->renderComponent(); ?>
                                </div>

                                <div class="col-6">
                                    <?php $__env->startComponent('components.input_fields.choices'); ?>
                                        <?php $__env->slot('label'); ?>
                                            Event Section
                                        <?php $__env->endSlot(); ?>
                                        <?php $__env->slot('id'); ?>
                                            event_section
                                        <?php $__env->endSlot(); ?>
                                        <?php $__env->slot('formId'); ?>
                                            createEvent-form
                                        <?php $__env->endSlot(); ?>
                                        <?php $__env->slot('name'); ?>
                                            event_section
                                        <?php $__env->endSlot(); ?>

                                        <option value="1">Kids</option>
                                        <option value="2">Youth</option>
                                        <option value="3">Singles</option>
                                        <option value="4">Handmaids</option>
                                        <option value="5">Servants</option>
                                        <option value="6">Couples</option>
                                    <?php echo $__env->renderComponent(); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="event_date">Event Date <span
                                                class="text-danger">*</span></label>
                                        <div class="form-icon right">
                                            <input class="form-control" type="text" name="event_date" id="event_date"
                                                data-provider="flatpickr" data-date-format="Y-m-d"
                                                data-range-date="true" data-altFormat="F j, Y"
                                                placeholder="Select Date..." data-minDate="">
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="event_time" class="form-label">Event Time</label>
                                        <div class="form-icon right">
                                            <input type="text" name="event_time" id="event_time" class="form-control"
                                                placeholder="Select Time..." data-provider="timepickr"
                                                data-time-basic="true">
                                            <i class="ri-time-line"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="event_location" class="form-label">Location <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Event Location..." required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="event_location" class="form-label">Registration Fee</label>
                                        <div class="form-icon">
                                            <input type="text" oninput="validateDigit(this)" id="event_location"
                                                class="form-control form-control-icon"
                                                placeholder="Leave blank if free...">
                                            <i class="fst-normal">₱</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Category <span
                                            class="text-danger">*</span></label>
                                    <div class="d-flex gap-5 mt-2">
                                        <div class="form-check form-radio-primary">
                                            <input type="radio" class="form-check-input" name="category"
                                                id="open">
                                            <label for="open" class="form-check-label">Open for
                                                Non-Community</label>
                                        </div>
                                        <div class="form-check form-radio-secondary">
                                            <input type="radio" class="form-check-input" name="category"
                                                id="enable">
                                            <label for="enable" class="form-check-label">Enable Event
                                                Registration</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="event_poster" class="form-label">Poster <span class="text-danger">*</span></label>
                                    <input type="file" class="filepond filepond-input-multiple" id="event_poster" name="event_poster"
                                        data-allow-reorder="true" data-max-file-size="3MB" required>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="event_description" class="form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <input name="event_description" id="event_description"
                                        class="form-control" type="file" accept="image/png, image/gif, image/jpeg" hidden>
                                    <div class="snow-editor" style="height: 300px;"></div> <!-- end Snow-editor-->
                                </div>
                            </div>



                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="addNewMember">Create
                                    Event</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>

<script src="<?php echo e(URL::asset('build/libs/filepond/filepond.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')); ?>">
</script>
<script
    src="<?php echo e(URL::asset('build/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')); ?>">
</script>
<script
    src="<?php echo e(URL::asset('build/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')); ?>">
</script>
<script src="<?php echo e(URL::asset('build/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/form-file-upload.init.js')); ?>"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let tomorrow = moment().add(1, 'days').format('YYYY-MM-DD');

        var dateInput = document.getElementById('event_date');
        var timeInput = document.getElementById('event_time');

        flatpickr(dateInput, {
            minDate: tomorrow,
        })

        flatpickr(timeInput, {
            noCalendar: true,
            enableTime: true,
            minuteIncrements: 5,
            dateFormat: "h:i K"
        })




    });
</script>
<?php /**PATH C:\Users\GoDesQ3\Downloads\MFC_Portal_V2\resources\views/components/new_events_modal.blade.php ENDPATH**/ ?>