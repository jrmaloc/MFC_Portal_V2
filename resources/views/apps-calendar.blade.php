@extends('layouts.master')
@section('title')
    @lang('translation.calendar')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}">
    <style>
        .upcoming-event-card {
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Apps
        @endslot
        @slot('title')
            Calendar
        @endslot
    @endcomponent
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
                                @csrf
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
                                    @if (auth()->user()->can('delete-event'))
                                        <button type="button" class="btn btn-soft-danger" id="btn-delete-event"><i
                                                class="ri-close-line align-bottom"></i> Delete</button>
                                    @endif
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
                    <h5 id="offcanvasRightLabel">Attendance</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="d-flex flex-wrap offcanvas-body gap-3" style="flex-grow: 0 !important;">
                    
                </div>
            </div>
            <!-- end right offcanvas -->
        </div>
    </div> <!-- end row-->

    {{-- <input type="text" id="event_location">
    <input type="text" id="latitude">
    <input type="text" id="longitude"> --}}
    <!-- Create Modal -->
    @component('components.new_events_modal')
        @slot('route')
            {{ route('events.store') }}
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/fullcalendar/index.global.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/calendar.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('build/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('build/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-file-upload.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        $("#attendances-btn").click((e) => {
            let event_id = e.target.getAttribute('data-event-id');
            const attendancesDiv = document.querySelector(".offcanvas-body");
    
            $('#event-modal').modal('hide');

            // First, Remove the attendance div for fresh ui
            while (attendancesDiv.lastElementChild) {
                attendancesDiv.removeChild(attendancesDiv.lastElementChild);
            }
    
            $.ajax({
                method: "GET",
                url: `/dashboard/attendances/events/${event_id}/users`,
                success: function (response) {
                    let users = response.users;
                    if (users.length <= 0) return;
    
                    let output = "";
                    users.forEach(user => {
                        output += `<div style="width: 45%;">
                                            <input class="form-check-input user-attendance-checkbox" type="checkbox" id="${user.id}" data-event-id="${event_id}" ${user.checked ? 'checked' : ''}>
                                            <label class="form-check-label" for="${user.id}">
                                                ${user.first_name} ${user.last_name}
                                            </label>
                                    </div>`;
                    });
                    attendancesDiv.innerHTML = output;
    
                    // Attach event listeners to the dynamically added checkboxes
                    let userAttendanceCheckboxes = document.querySelectorAll(".user-attendance-checkbox");
                    userAttendanceCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', handleUserAttendance);
                    });
                }
            });
    
            function handleUserAttendance(e) {
                let event_id = e.target.getAttribute('data-event-id');
                let checked = e.target.checked ? 1 : 0;
                let token = "{{ csrf_token() }}";

                $.ajax({
                    method: "POST",
                    url: "{{ route('attendances.save') }}",
                    data: {
                        _token: token,
                        event_id: event_id,
                        user_id: e.target.id,
                        checked: checked,
                    },
                    success: function (response) {
                        toastr.success(response.message, "Success");
                    }
                })
            }
        });
    </script>
    
@endsection
