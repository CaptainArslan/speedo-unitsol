@extends('trainer.layouts.master')
@section('content')
<div class="nk-content-wrap">
    <div class="nk-block-head nk-block-head-md">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Schedule Class</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <a href="#" class="btn btn-primary" data-toggle="modal"
                    data-target="#addEventPopup"><em
                        class="icon ni ni-plus"></em><span>Add New Slot</span></a>
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
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Schedule Classes</h4>
                <p>All classes schedule on selected date.</p>
            </div>
        </div>
        <div class="row g-gs">
            <div class="col-sm-6 col-xl-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="team">
                            <div class="user-card user-card-s2">
                                <div class="user-avatar lg bg-primary">
                                    <span>BD</span>
                                    <div class="status dot dot-lg dot-success"></div>
                                </div>
                                <div class="user-info">
                                    <h6>Baby Ducks</h6>
                                    <span class="sub-text">10 June 2022</span>
                                </div>
                            </div>
                            <ul class="team-info">
                                <li><span>Students</span><span>23</span></li>
                            </ul>
                            <div class="team-view">
                                <a href="html/user-details-regular.html"
                                    class="btn btn-block btn-dim btn-primary"><span>Student
                                        List</span></a>
                            </div>
                        </div><!-- .team -->
                    </div><!-- .card-inner -->
                </div><!-- .card -->
            </div><!-- .col -->

        </div>
    </div>
</div>
    <div class="modal fade" id="addEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Session Slot</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="#" id="addEventForm" class="form-validate is-alter">
                        <div class="row gx-4 gy-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-title">Session Slot Title</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="event-title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Start Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" id="event-start-date" class="form-control date-picker"
                                                    data-date-format="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="event-start-time" data-time-format="HH:mm:ss"
                                                    class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">End Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" id="event-end-date" class="form-control date-picker"
                                                    data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="event-end-time" data-time-format="HH:mm:ss"
                                                    class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-description">Session
                                        Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" id="event-description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Session Level</label>
                                    <div class="form-control-wrap">
                                        <select id="event-theme" class="select-calendar-theme form-control"
                                            data-search="on">
                                            <option value="event-primary">Baby Ducks</option>
                                            <option value="event-success">Ducklings</option>
                                            <option value="event-info">Doplphin</option>
                                            <option value="event-warning">Improver</option>
                                            <option value="event-danger">Bronze</option>
                                            <option value="event-pink">Silver</option>
                                            <option value="event-primary-dim">Gold</option>
                                            <option value="event-success-dim">Platinum</option>
                                            <option value="event-info-dim">Development</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button id="addEvent" type="submit" class="btn btn-primary">Add
                                            Event</button>
                                    </li>
                                    <li>
                                        <button id="resetEvent" data-dismiss="modal"
                                            class="btn btn-danger btn-dim">Discard</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                            <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup"
                                class="btn btn-primary">Edit Event</button>
                        </li>
                        <li>
                            <button data-dismiss="modal" data-toggle="modal" data-target="#deleteEventPopup"
                                class="btn btn-danger btn-dim">Delete</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteEventPopup">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal py-4">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Are You Sure ?</h4>
                        <div class="nk-modal-text mt-n2">
                            <p class="text-soft">This event data will be removed permanently.</p>
                        </div>
                        <ul class="d-flex justify-content-center gx-4 mt-4">
                            <li>
                                <button data-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes,
                                    Delete it</button>
                            </li>
                            <li>
                                <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup"
                                    class="btn btn-danger btn-dim">Cancel</button>
                            </li>
                        </ul>
                    </div>
                </div><!-- .modal-body -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('trainer-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('trainer-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
@endsection
