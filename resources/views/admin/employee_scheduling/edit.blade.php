@extends('admin.layouts.master')
@section('style')
    <title>{{ $title }} | Swimming Pool Management System</title>
@stop
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Employees Scheduling</h3>
                            <div class="nk-block-des text-soft">
                                <p>You are setting schedule </p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <!-- <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a> -->
                                            <!-- <a href="html/add-new-member.html" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Staff</span></a> -->
                                            <!-- <a href="html/add-new-member.html" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Staff</span></a> -->
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
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-des">
                                        <p>All fields are requried.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->

                            <div class="nk-block">
                                <form id="add-schedule">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Start Date</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" id="event-end-date"
                                                                value="{{ $record->start_date }}" name="start_date"
                                                                class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">End Date</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" id="event-end-date"
                                                                value="{{ $record->end_date }}" name="end_date"
                                                                class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Employee</label>
                                                <div class="form-control-wrap">
                                                    <select name="employee_id" class="select2 form-control"
                                                        data-search="on">
                                                        <option value="">select employee</option>
                                                        @foreach ($employees as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($record->employee_id == $item->id) selected @endif>
                                                                {{ $item->first_name . ' ' . $item->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Select Venue</label>
                                                <div class="form-control-wrap">
                                                    <select name="venue_id" class="select2 form-control" data-search="on">
                                                        <option value="">select venue</option>
                                                        @foreach ($venues as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($record->venue_id == $item->id) selected @endif>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Select Days</label>
                                                <div class="form-control-wrap">
                                                    <select name="day_id[]" class="select2 form-control" data-search="on"
                                                        multiple>
                                                        <option value="">select day</option>
                                                        @foreach ($days as $day)
                                                            <option value="{{ $day->id }}"
                                                                @foreach ($record->employeeDays as $record_day)
                                                                    @if($record_day->day_id == $day->id) selected @endif @endforeach>
                                                                {{ $day->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Start Time</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <input type="time" value="{{ $record->start_time }}"
                                                                name="start_time" required id="edit-event-end-time"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">End Time</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <input type="time" value="{{ $record->end_time }}"
                                                                name="end_time" required id="edit-event-end-time"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('admin/employee-schedulings/' . $record->id) }}','{{ url('admin/employee-schedulings') }}','add-schedule')"
                                                class="btn btn-primary"><em
                                                    class="icon ni ni-edit"></em><span>Update</span></button>
                                            <button type="button"
                                                onclick="window.location='{{ url('admin/employee-schedulings') }}'"
                                                class="btn btn-warning"><em
                                                    class="icon ni ni-cross"></em><span>Cancel</span></button>
                                        </div>
                                    </div>
                                </form>

                            </div><!-- .nk-block -->

                        </div><!-- .card-preview -->
                    </div>
                </div> <!-- nk-block -->


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
@stop
