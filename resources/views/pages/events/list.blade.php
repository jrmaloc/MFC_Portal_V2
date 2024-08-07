@extends('layouts.master')
@section('title')
    @lang('translation.starter')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Events
        @endslot
        @slot('title')
            {{ $endPoint }}
        @endslot
    @endcomponent

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card-header border-0 mb-3">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="flex-shrink-0">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary add-btn text-capitalize" data-bs-toggle="modal"
                                data-bs-target="#addEventModal">
                                <i class="ri-add-line align-bottom me-1"></i>add new event</button>
                            <button class="btn btn-soft-danger" id="remove-actions"><i
                                    class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="ticketsList">
                <div class="card-body">
                    <table id="users_datatables" class="table nowrap align-middle table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="" data-sort="id">ID</th>
                                <th class="" data-sort="title">Title</th>
                                <th class="" data-sort="gender">Date</th>
                                <th class="" data-sort="status">Section</th>
                                <th class="" data-sort="status">Status</th>
                                <th class="" data-sort="action">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>

    <!-- Create Modal -->
    @component('components.new_events_modal')
        @slot('route')
            {{ route('events.store') }}
        @endslot
    @endcomponent
@endsection
@section('script')
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            // make sure that the table is loaded correctly
            $('#users_datatables').on('draw.dt', function() {

                $('[data-bs-toggle="tooltip"]').tooltip();

                $('.remove-btn').click(function() {
                    var id = $(this).attr('id');

                    showDeleteMessage({
                        message: '<strong class="text-danger">Removing this user</strong> will remove all of the information from our database.',
                        deleteFunction: function() {
                            $.ajax({
                                url: '/kids/' + id,
                                type: 'DELETE',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(response) {
                                    showSuccessMessage(response.message);
                                },
                                error: function(xhr, response, error) {
                                    showErrorMessage(xhr.statusText);
                                }
                            });
                        }
                    });
                });
            });

            function initializeTables() {
                let columns = [{
                        data: "id",
                        name: "id",
                    },
                    {
                        data: "title",
                        name: "title",
                        render: function(data) {
                            if (data == null) {
                                return '<span class="text-capitalize">N/A</span>';
                            }

                            return '<span class="text-capitalize">' + data + '</span>';;
                        }
                    },
                    {
                        data: "date",
                        name: "date",
                        render: function(data) {
                            if (data == null) {
                                return '<span class="text-capitalize">N/A</span>';
                            }

                            return '<span class="text-capitalize">' + data + '</span>';;
                        }
                    },
                    {
                        data: "section",
                        name: "section",
                        render: function(data) {
                            if (data == null) {
                                return '<span class="text-capitalize">N/A</span>';
                            }

                            switch (data) {
                                case 'kids':
                                    return '<span class="text-capitalize badge bg-danger" style="font-size: 12px;">' +
                                        data + '</span>';
                                    break;
                                case 'youth':
                                    return '<span class="text-capitalize badge bg-primary" style="font-size: 12px;">' +
                                        data + '</span>';
                                    break;
                                case 'singles':
                                    return '<span class="text-capitalize badge bg-success" style="font-size: 12px;">' +
                                        data + '</span>';
                                    break;
                                case 'handmaids':
                                    return '<span class="text-capitalize badge bg-red" style="font-size: 12px;">' +
                                        data + '</span>';
                                    break;
                                case 'servants':
                                    return '<span class="text-capitalize badge bg-warning" style="font-size: 12px;">' +
                                        data + '</span>';
                                    break;
                                case 'couples':
                                    return '<span class="text-capitalize badge bg-info" style="font-size: 12px;">' +
                                        data + '</span>';
                                    break;
                            }

                            return '<span class="text-capitalize">' + data + '</span>';
                        }
                    },
                    {
                        data: "status",
                        name: "status",
                        render: function(data, type, row) {
                            if (data == 'Active') {
                                return '<span class="text-uppercase badge bg-success-subtle text-success">' +
                                    data + '</span>';
                            } else {
                                return '<span class="text-uppercase badge bg-warning-subtle text-warning">' +
                                    data + '</span>';
                            }
                        }
                    },
                    {
                        data: "actions",
                        name: "actions",
                        orderable: false,
                        searchable: false,
                    },
                ];

                let table = $("#users_datatables").DataTable({
                    processing: true,
                    pageLength: 10,
                    responsive: true,
                    serverSide: true,
                    ajax: {
                        url: "/dashboard/events/",
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    },
                    columns: columns,
                    language: {
                        emptyTable: `<div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" id="search-icon"
                                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Sorry! This table is empty</h5>
                                            <p class="text-muted mb-0">No data available in table. Please add some records.</p>
                                        </div>
                                    </div>`,
                        zeroRecords: `<div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" id="search-icon"
                                                colors="primary:#b4b4b4,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched all of our records, We did not find any data for you search.</p>
                                        </div>
                                    </div>`,
                    },
                    order: [
                        [0, "desc"],
                    ],
                });

                $('#addEventModal').on('hidden.bs.modal', function() {
                    if ($(this).attr('data-id') == 1) {
                        table.destroy();

                        initializeTables();

                        $(this).attr('data-id', 0);
                    }
                });
            }

            initializeTables();
        })
    </script>
@endsection
