
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.calendar'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/filepond/filepond.min.css')); ?>" type="text/css" />
    <link rel="stylesheet"
        href="<?php echo e(URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>">
    <style>
        .upcoming-event-card {
            cursor: pointer;
        } 

        @media (min-width: 1024px) {
            .offcanvas-end {
                width: 40% !important;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Apps
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Calendar
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <button class="btn btn-primary w-100" id="btn-new-event" data-bs-toggle="modal"
                                data-bs-target="#addEventModal"><i class="mdi mdi-plus"></i> Create New
                                Event</button>

                        </div>
                    </div>
                    <div>
                        <h5 class="mb-1">Upcoming Events</h5>
                        <p class="text-muted">Don't miss scheduled events</p>
                        <div class="pe-2 me-n1 mb-3" data-simplebar style="height: 400px">
                            <div id="upcoming-event-list"></div>
                        </div>
                    </div>
                    <!--end card-->
                </div> <!-- end col-->

                <div class="col-xl-9">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!--end row-->

            <div style='clear:both'></div>

            <!-- Add New Event MODAL -->
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="modal-title">Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body p-4">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                <?php echo csrf_field(); ?>
                                <div class="text-end">
                                    <a href="#" class="btn btn-sm btn-soft-primary" id="edit-event-btn"
                                        data-id="edit-event" onclick="editEvent(this)" role="button">Edit</a>
                                    <button class="btn btn-info btn-sm" id="attendances-btn" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Attendance</button>
                                </div>
                                <div class="event-details">
                                    <div class="d-flex mb-2">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <i class="ri-calendar-event-line text-muted fs-16"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="d-block fw-semibold mb-0" id="event-start-date-tag"></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="ri-time-line text-muted fs-16"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="d-block fw-semibold mb-0"><span id="event-timepicker1-tag"></span> -
                                                <span id="event-timepicker2-tag"></span>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="ri-map-pin-line text-muted fs-16"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="d-block fw-semibold mb-0"> <span id="event-location-tag"></span></h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="ri-money-dollar-box-line text-muted fs-16"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="d-block fw-semibold mb-0" id="event-registrationfee-tag"></p>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="ri-discuss-line text-muted fs-16"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="d-block text-muted mb-0" id="event-description-tag"></p>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary" id="register-event-btn">Register Now
                                    </button>
                                </div>
                                <div class="row event-form">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <select class="form-select d-none" name="category" id="event-category" required>
                                                <option value="bg-danger-subtle">Danger</option>
                                                <option value="bg-success-subtle">Success</option>
                                                <option value="bg-primary-subtle">Primary</option>
                                                <option value="bg-info-subtle">Info</option>
                                                <option value="bg-dark-subtle">Dark</option>
                                                <option value="bg-warning-subtle">Warning</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a valid event category</div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Event Name</label>
                                            <input class="form-control d-none" placeholder="Enter event name"
                                                type="text" name="title" id="event-title" required
                                                value="" />
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label>Event Date</label>
                                            <div class="input-group d-none">
                                                <input type="text" id="event-start-date"
                                                    class="form-control flatpickr flatpickr-input"
                                                    placeholder="Select date" readonly required>
                                                <span class="input-group-text"><i
                                                        class="ri-calendar-event-line"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-12" id="event-time">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Start Time</label>
                                                    <div class="input-group d-none">
                                                        <input id="timepicker1" type="text"
                                                            class="form-control flatpickr flatpickr-input"
                                                            placeholder="Select start time" readonly>
                                                        <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">End Time</label>
                                                    <div class="input-group d-none">
                                                        <input id="timepicker2" type="text"
                                                            class="form-control flatpickr flatpickr-input"
                                                            placeholder="Select end time" readonly>
                                                        <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="event-location">Location</label>
                                            <div>
                                                <input type="text" class="form-control d-none" name="event-location"
                                                    id="event-location" placeholder="Event location">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <input type="hidden" id="eventid" name="eventid" value="" />
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control d-none" id="event-description" placeholder="Enter a description" rows="3"
                                                spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <div class="hstack gap-2 justify-content-end">
                                    <?php if(auth()->user()->can('delete-event')): ?>
                                        <button type="button" class="btn btn-soft-danger" id="btn-delete-event"><i
                                                class="ri-close-line align-bottom"></i> Delete</button>
                                    <?php endif; ?>
                                    <button type="submit" class="btn btn-success" id="btn-save-event">Add Event</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end modal-content-->
                </div> <!-- end modal dialog-->
            </div> <!-- end modal-->
            <!-- end modal-->

            <!-- right offcanvas -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Event Attendance</h5>
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                    </div>
                </div>
                <div class="attendance-container offcanvas-body" style="flex-grow: 0 !important; padding: 0 20px !important;">
                    <div class="border-bottom p-2">
                        <h4>Event Details</h4>
                    </div>
                    <div class="event-details-container py-2">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-file-text-line text-muted fs-16"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="d-block fw-semibold mb-0" id="event-attendance-title">
                                   
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <i class="ri-calendar-event-line text-muted fs-16"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="d-block fw-semibold mb-0" id="event-attendance-date">
                                       
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-time-line text-muted fs-16"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="d-block fw-semibold mb-0" id="event-attendance-time">
                                   
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-map-pin-line text-muted fs-16"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="d-block fw-semibold mb-0">
                                    <span id="event-attendance-location">
                                        
                                    </span>
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-money-dollar-box-line text-muted fs-16"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="d-block fw-semibold mb-0" id="event-attendance-registrationfee">
                                    ₱ 
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm">List of Attendees</button>
                    </div>
                    <div class="border-bottom p-2 d-flex justify-content-between align-items-center gap-5">
                        <h4>Users</h4>
                        <div class="input-group">
                            <input type="search" class="form-control" id="attendance-user-search-field"
                                    aria-label="Example text with two button addons" placeholder="Search user...">
                            <button class="btn btn-primary" id="search-event-user-btn">Search <i class="ri-search-2-line"></i></button>
                        </div>
                        <button id="attendance-report-btn" class="btn btn-primary btn-block">Report</button>
                    </div>
                    <div class="noresult">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" id="search-icon"
                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                            </lord-icon>
                            <h5 class="mt-2">Search user first</h5>
                        </div>
                    </div>
                    <div class="users-list d-flex flex-wrap gap-3 py-3" id="attendeesDiv">
                    </div>
                </div>
            </div>
            <!-- end right offcanvas -->
        </div>
    </div> <!-- end row-->

    
    <!-- Create Modal -->
    <?php $__env->startComponent('components.new_events_modal'); ?>
        <?php $__env->slot('route'); ?>
            <?php echo e(route('events.store')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/fullcalendar/index.global.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/calendar.init.js')); ?>"></script>
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
    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

    <script>
        $("#attendances-btn").click((e) => {
            let event_id = e.target.getAttribute('data-event-id');
            $('#event-modal').modal('hide');

            // CLear event details for fresh event details ui
            clearEventAttendanceDetails();

            $.ajax({
                method: "GET",
                url: `/events/show/${event_id}`,
                success: function (response) {
                    dispayEventAttendanceDetails(response.event);
                }
            });
        });

        $("#search-event-user-btn").click((e) => {
            let event_id = e.target.getAttribute('data-event-id');
            let search_query = document.querySelector('#attendance-user-search-field').value;
            let attendeesDiv = document.getElementById('attendeesDiv');

            if(!search_query) {
                attendeesDiv.innerHTML = '';
                $('.noresult').show();  
                return toastr.warning("Please filled the search input.");
            }
            
            // First, Remove the attendance div for fresh ui
            attendeesDiv.innerHTML = ''; // Clear previous content

            $.ajax({
                url: `/dashboard/attendances/events/${event_id}/users?search=${search_query}`,
                method: "GET",
                success: function (response) {
                    if(response.users.length <= 0) return toastr.error("No users found");
                    dispayUsersChecklist(response.users, attendeesDiv, event_id);
                }
            }).done(data => {
                $('.noresult').hide();
            })

        })

        function dispayEventAttendanceDetails(event) {
            document.querySelector('#event-attendance-title').innerHTML = event.title;
            document.querySelector('#event-attendance-date').innerHTML = event.start_date + " to " + event.end_date;
            document.querySelector('#event-attendance-time').innerHTML = event.time;
            document.querySelector('#event-attendance-location').innerHTML = event.location;
            document.querySelector('#event-attendance-registrationfee').innerHTML = parseInt(event.reg_fee).toFixed(2);
        }

        // Display users checkbox
        function dispayUsersChecklist(users, attendeesDiv, event_id) {
            users.forEach(user => {
                let container = document.createElement('div');
                container.style.width = "45%";
                container.style.cursor = 'pointer';
                container.classList.add('p-2', 'shadow', 'bg-white');
                container.innerHTML = `<input class="form-check-input user-attendance-checkbox" style="margin-right: 10px;" type="checkbox" 
                                            id="${user.id}" data-event-id="${event_id}" ${user.checked ? 'checked' : ''}>
                                        <label class="form-check-label" for="${user.id}">
                                            ${user.first_name} ${user.last_name} <br>
                                            <div class="text-muted">${user?.section?.name}</div>
                                        </label>`;
                attendeesDiv.appendChild(container);
            });

            // Attach event listeners to the dynamically added checkboxes
            let userAttendanceCheckboxes = document.querySelectorAll(".user-attendance-checkbox");
            userAttendanceCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', handleUserAttendance);
            });

            function handleUserAttendance(e) {
                let event_id = e.target.getAttribute('data-event-id');
                let checked = e.target.checked ? 1 : 0;
                let token = "<?php echo e(csrf_token()); ?>";

                $.ajax({
                    method: "POST",
                    url: "<?php echo e(route('attendances.save')); ?>",
                    data: {
                        _token: token,
                        event_id: event_id,
                        user_id: e.target.id,
                        checked: checked,
                    },
                    success: function (response) {
                        toastr.success(response.message, "Success");
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("some error");
                    }
                })
            }
        }

        function clearEventAttendanceDetails() {
            document.querySelector('#event-attendance-title').innerHTML = "";
            document.querySelector('#event-attendance-date').innerHTML = "";
            document.querySelector('#event-attendance-time').innerHTML = "";
            document.querySelector('#event-attendance-location').innerHTML = "";
            document.querySelector('#event-attendance-registrationfee').innerHTML = "";
        }

        $('#attendance-report-btn').click(e => {
            let event_id = e.target.getAttribute('data-event-id');
            location.href = `/dashboard/attendances/report/${event_id}`;
        })
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MFC_Portal_V2\resources\views/apps-calendar.blade.php ENDPATH**/ ?>