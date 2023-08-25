@extends('admin.layouts.master')
@section('style')
    <title>{{ $title }} | Swimming Pool Management System</title>
    <style>
        .fc-timegrid-event-harness-inset {
            min-height: 70px !important
        }
    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="nk-content-wrap">
            <div class="nk-block-head nk-block-head-md">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Venue Calendar</h3>
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                                    class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="form-group">
                                            <label class="form-label">Venue</label>
                                            <div class="form-control-wrap" style='width: 200px !important;'>
                                                <select name="status" onchange="getVenue(event)" id="venue"
                                                    class=" select2 form-control" data-search="on">
                                                    <option value="">---- select venue -----</option>
                                                    @foreach ($venues as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if (request()->venue == $item->id) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label class="form-label">Term</label>
                                            <div class="form-control-wrap" style='width: 200px !important;'>
                                                <select name="status" onchange="getTerm(event)" id="term"
                                                    class=" select2 form-control" data-search="on">
                                                    <option value="">---- select term -----</option>
                                                    @foreach ($terms as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if (request()->term == $item->id) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->

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
                            <div class="col-sm-6" id="preview-event-end-check">
                                <h6 class="overline-title">Start Date</h6>
                                <p id="preview-event-s_date"></p>
                            </div>
                            <div class="col-sm-6" id="preview-event-end-check">
                                <h6 class="overline-title">End Date</h6>
                                <p id="preview-event-e_date"></p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="overline-title">Class</h6>
                                <p id="preview-event-class"></p>
                            </div>
                            <div class="col-sm-4" id="preview-event-end-check">
                                <h6 class="overline-title">Venue</h6>
                                <p id="preview-event-venue"></p>
                            </div>
                            <div class="col-sm-4" id="preview-event-end-check">
                                <h6 class="overline-title">Trainer</h6>
                                <p id="preview-event-trainer"></p>
                            </div>

                            {{-- <div class="col-sm-10" id="preview-event-description-check">
                                <h6 class="overline-title">Description</h6>
                                <p id="preview-event-description"></p>
                            </div> --}}
                        </div>
                        <ul class="d-flex justify-content-between gx-4 mt-3">
                            {{-- <li>
                                <button data-dismiss="modal" id="editEventPopup" class="btn btn-primary">Edit Event</button>
                            </li>
                            <li>
                                <button id="deleteEvent" class="btn btn-danger btn-dim">Delete</button>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('admin.venue.partial.calendar')
    <script src="{{ asset('admin-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    {{-- <script src="{{ asset('admin-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script> --}}
    <script>
        function getVenue(e) {
            let venue_id = e.target.value;
            window.location.href = "{{ url('admin/venue_calendar?venue=') }}" + venue_id + "&term=" +
                $('#term').val();;
        }

        function getTerm(e) {
            let term_id = e.target.value;
            window.location.href = "{{ url('admin/venue_calendar?venue=') }}" + $('#venue').val() + "&term=" +
                term_id;
        }
    </script>
@stop
