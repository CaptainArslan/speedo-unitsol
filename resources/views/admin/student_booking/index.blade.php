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
                        <h3 class="nk-block-title page-title"> Manage Booking </h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"> Cart
                            <div class="count"> &nbsp; ({{ Cart::count() }})</div>
                        </a>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->

            <div class="nk-block nk-block-lg">
                <div class="card card-preview">
                    <form id="filter-form">
                        {{-- input type="hidden" name="student_id[]" value="{{ $id }}"> --}}
                        <div class="nk-block">
                            <div class="card-inner">
                                <div class="row g-3">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">Filter By Location</label>
                                            <div class="form-control-wrap">
                                                <select name="venue_id" id="venue_select2" onchange="filterTerms(event,'post','{{ url('admin/filter-terms') }}','filter-form')" class="select2 form-control">
                                                    <option value="">- Select Location -</option>
                                                    @foreach ($venues as $item)
                                                    <option value="{{ $item->id }}" location="{{ $item->name }}" @if (request()->location == $item->id) selected @endif>
                                                        {{ $item->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">Filter By Term</label>
                                            <div class="form-control-wrap">
                                                <select name="term_id" id="term_select2" onchange="filterTerms(event,'post','{{ url('admin/filter-terms') }}','filter-form')" class="select2 form-control">
                                                    <option value="">- Select term -</option>
                                                    @foreach ($filter_terms as $record)
                                                    <option value="{{ $record->id }}" @if (request()->term == $record->id) selected @endif>{{ $record->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">Filter Class Type</label>
                                            <div class="form-control-wrap">
                                                <select name="class_type_id[]" id="venue" multiple onchange="filterTerms(event,'post','{{ url('admin/filter-terms') }}','filter-form')" class="class_type_select2 form-control">
                                                    <option value="">- Select Class Type -</option>

                                                    @foreach ($class_types as $class_type)
                                                    <option value="{{ $class_type->id }}" class="{{ $class_type->id }}">
                                                        {{ $class_type->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="regular-price">Filter Days</label>
                                            <div class="form-control-wrap">
                                                <select name="day_id[]" id="day" multiple onchange="filterTerms(event,'post','{{ url('admin/filter-terms') }}','filter-form')" class="day_select2 form-control">
                                                    <option value="">- Select Class Type -</option>
                                                    @foreach ($days as $day)
                                                    <option value="{{ $day->id }}" class="{{ $day->id }}">{{ $day->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="regular-price">Student</label>
                                            <div class="form-control-wrap">
                                                <select name="student_id[]" id="student" onchange="filterTerms(event,'post','{{ url('admin/filter-terms') }}','filter-form')" class="student_select2 form-control">
                                                    <option value="">- Select Class Type -</option>
                                                    @foreach ($students as $student)
                                                    <option value="{{ $student->id }}" class="{{ $student->id }}">{{ $student->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="regular-price">.</label>
                                            <div class="form-control-wrap">
                                                <button type="reset" class="btn btn-primary">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card card-preview">
                    <div class="card-inner">
                        <div id="filter-term">
                            <!-- Filter date set in this -->
                        </div>
                    </div>
                </div><!-- .card-preview -->
            </div> <!-- nk-block -->
        </div>
    </div>
</div>
@include('admin.student_booking.partial.cart')
@endsection

@section('scripts')
<script src="{{ asset('admin-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
<script>
    $('.class_type_select2').select2();
    $('.day_select2').select2();
    $('.student_select2').select2();
    $('#venue_select2').select2();
    $('#term_select2').select2();

    function filterTerms(e, method, url, data) {
        loadingStart();
        let urlParam = new URLSearchParams(window.location.search);
        let query = urlParam.get('q');
        let from = document.getElementById(data);
        let record = new FormData(from);
        record.append('q', query)
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: method,
            url: url,
            data: record,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let data = [];
                let day = [];
                let timing = [];
                let class_type = [];
                // data=[];

                // $('.custom-checkbox  input:checked').each(function() {
                //     if($(this).attr('day') !=undefined){
                //         data.push($(this).attr('day'));
                //     }
                // });
                // $('.timings  input:checked').each(function() {
                //     if($(this).attr('timing') !=undefined){
                //         data.push($(this).attr('timing'));
                //     }
                // });
                // $('.class_types  input:checked').each(function() {
                //     if ($(this).attr('class_type') != undefined) {
                //         data.push($(this).attr('class_type'));
                //     }
                // });
                // $('.swimming_class  input:checked').each(function() {
                //     if($(this).attr('swimming_class') !=undefined){
                //         data.push($(this).attr('swimming_class'));
                //     }
                // });
                if (window.venue != undefined) {
                    data.push(window.venue);
                }
                // console.log(window.venue);
                // console.log('records', data);
                loadingStop();
                $("#badge").html('');
                $.each(data, function(key, value) {
                    $("#badge").append("<span id='span" + key + "' onclick='removeBage(" + key + ")' class='badge filter-badge px-2 rounded-pill py-1 mr-2 text-capitalize float-right badge-secondary'>" + value + "<i role='button' aria-hidden='true' class='fa fa-times'></i></span>");
                });
                $('#filter-term').html();
                $('#filter-term').html(response);
            },
            error: function(xhr) {
                alert('error');
                let data = '';
                $.each(xhr.responseJSON.errors, function(key, value) {
                    data += '</br>' + value;
                })
                showWarn(data);

            }
        });

    }
</script>
@stop