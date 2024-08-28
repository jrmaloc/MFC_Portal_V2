@extends('layouts.master')

@section('title')
    @lang('translation.attendance_report')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Attendance
        @endslot
        @slot('title')
            {{ $endPoint }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Event Details</h3>
                </div>
                <div class="card-body">
                    <img src="{{ URL::asset('uploads/' . $event->poster) }}" alt="" class="rounded"
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

@endsection