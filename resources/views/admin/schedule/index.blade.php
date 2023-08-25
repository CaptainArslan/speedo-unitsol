@extends('admin.layouts.master')
@section('style')
    <title>{{ $title }} | Swimming Pool Management System</title>
@stop
@section('content')
    <div class="container-fluid">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-md">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Calendar</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                                    class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    @can('add_term_base_booking')
                                    <li class="nk-block-tools-opt">
                                        <!-- <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a> -->
                                        <a href="{{url( 'admin/term-base-bookings/create') }}"
                                            class="btn btn-primary d-none d-md-inline-flex"><em
                                                class="icon ni ni-plus"></em><span>Add New
                                                Session</span></a>
                                        <!-- <a href="html/add-new-member.html" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Staff</span></a> -->
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div id="calendar" class="nk-calendar"></div>
                    </div>
                </div>
            </div>

            {{-- @include('admin.schedule.create') --}}
        </div>
        <div class="modal fade" id="previewEventPopup">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div id="preview-event-header" class="modal-header">
                        <h5 id="preview-event-title" class="modal-title">Placeholder Title</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="row gy-3 py-1">
                            <div class="col-sm-6">
                                <h6 class="overline-title">Start Time</h6>
                                <p id="preview-event-start"></p>
                            </div>
                            <div class="col-sm-6" id="preview-event-end-check">
                                <h6 class="overline-title">End Time</h6>
                                <p id="preview-event-end"></p>
                            </div>
                            <div class="col-sm-10" id="preview-event-description-check">
                                <h6 class="overline-title">Description</h6>
                                <p id="preview-event-description"></p>
                            </div>
                        </div>
                        <ul class="d-flex justify-content-between gx-4 mt-3">
                            <li>
                                <button data-dismiss="modal" id="editEventPopup" class="btn btn-primary">Edit Event</button>
                            </li>
                            <li>
                                <button id="deleteEvent" class="btn btn-danger btn-dim">Delete</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    @include('admin.schedule.partial.schedule_calendar')
    <script src="{{ asset('admin-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    {{-- <script src="{{ asset('admin-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script> --}}
@stop
