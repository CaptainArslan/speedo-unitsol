@extends('admin.layouts.master')
@section('style')
    <title>{{$title}} | Swimming Pool Management System</title>
@stop
@section('content')

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Events</h3>
                            <div class="nk-block-des text-soft">
                                <p>You can create events with students.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <!-- <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                                                            <a href="html/add-new-member.html" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Staff</span></a> -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->

                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered">
                        <div class="card-inner">

                            <div class="nk-block">
                                <div class="row g-3">
                                    <form id="add-event">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Event Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" required class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Start Date & Time</label>
                                                    <div class="row gx-2">
                                                        <div class="w-55">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" name="start_date"
                                                                    id="edit-event-start-date"
                                                                    class="form-control date-picker"
                                                                    data-date-format="yyyy-mm-dd" required>
                                                            </div>
                                                        </div>
                                                        <div class="w-45">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-clock"></em>
                                                                </div>
                                                                <input type="time" name="start_time"
                                                                    id="edit-event-start-time" data-time-format="HH:mm:ss"
                                                                    class="form-control time-picker" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">End Date & Time</label>
                                                    <div class="row gx-2">
                                                        <div class="w-55">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" name="end_date"
                                                                    id="edit-event-end-date"
                                                                    class="form-control date-picker"
                                                                    data-date-format="yyyy-mm-dd" required>
                                                            </div>
                                                        </div>
                                                        <div class="w-45">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-clock"></em>
                                                                </div>
                                                                <input type="time" name="end_time"
                                                                    id="edit-event-end-time" data-time-format="HH:mm:ss"
                                                                    class="form-control time-picker" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Select Venue</label>
                                                    <div class="form-control-wrap">
                                                        <select id="event-theme" name="venue_id" required
                                                            class="select-calendar-theme form-control" data-search="on">
                                                            <option value="">select venue</option>
                                                            @foreach ($venues as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Google Map Link</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="google_map_location"
                                                            class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label" for="product-title">Select Students</label>
                                                <div class="card card-preview">
                                                    <div class="card-inner">
                                                        <select id="basic-listbox" name="students[]"
                                                            class="dual-listbox" multiple>
                                                            @foreach ($students as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div><!-- .card-preview -->

                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-06">Default File Upload</label>
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" name="images[]" multiple
                                                                class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="summernote-basic"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/events') }}','{{ url('admin/events') }}','add-event')"
                                                    class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Create
                                                        New
                                                        Event</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .nk-block -->

                        </div>
                        <!-- .card-preview -->
                    </div>
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{ asset('admin-assets/assets/js/libs/dual-listbox.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/example-listbox.js?ver=2.9.0') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/editors/summernote.css?ver=2.9.0') }}">
    <script src="{{ asset('admin-assets/assets/js/libs/editors/summernote.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/editors.js?ver=2.9.0') }}"></script>
@stop
