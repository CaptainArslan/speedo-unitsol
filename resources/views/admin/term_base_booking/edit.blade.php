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
                            <h3 class="nk-block-title page-title">Term Base Booking</h3>
                            <div class="nk-block-des text-soft">
                                <p>You are setting term base.</p>
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
                            <div class="nk-block">
                                <form id="add-schedule">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Terms</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <select name="term_id" id="Term"
                                                                class="select2 form-control" data-search="on"
                                                                onchange="selectTerm(event,'{{ url('admin/select_term') }}')">
                                                                <option value="">select term</option>
                                                                @foreach ($define_terms as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        @if ($item->id == $term_base_booking->term_id) selected @endif>
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="termDetail" class="col-12  mt-2">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Duration (Start Date -- End Date)</label>
                                                    <div class="row gx-2">
                                                        <div class="w-50">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" id="start_date" readonly
                                                                    value="{{ $term_base_booking->term->start_date }}"
                                                                    name="start_date" class="form-control "
                                                                    data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
                                                        <div class="w-50">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" readonly id="end_date"
                                                                    value="{{ $term_base_booking->term->end_date }}"
                                                                    name="end_date" class="form-control "
                                                                    data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-12" id="blackout">
                                                <div class="form-group">
                                                    <label class="form-label">Blackout Periods (Start Date -- End
                                                        Date)</label>
                                                    @foreach ($term_base_booking->term->termBalackouts as $item)
                                                        <div class="row gx-2">
                                                            <div class="w-50">
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-left">
                                                                        <em class="icon ni ni-calendar"></em>
                                                                    </div>
                                                                    <input type="text" id="blackout_start_date" readonly
                                                                        value="{{ $item->start_date }}"
                                                                        name="blackout_start_date[]"
                                                                        class="form-control "
                                                                        data-date-format="yyyy-mm-dd">
                                                                </div>
                                                            </div>
                                                            <div class="w-50">
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-left">
                                                                        <em class="icon ni ni-calendar"></em>
                                                                    </div>
                                                                    <input type="text" id="blackout_end_date" readonly
                                                                        value="{{ $item->end_date }}"
                                                                        name="blackout_end_date[]"
                                                                        class="form-control "
                                                                        data-date-format="yyyy-mm-dd">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 border-top mt-2">
                                            <div class="form-group">
                                                <label class="form-label">Select Term Class Days ...</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Select Class</label>
                                                <div class="form-control-wrap">
                                                    <select name="class_id" id="classPrice" class="select2 form-control"
                                                        data-search="on">
                                                        <option value="">select class</option>
                                                        @foreach ($classes as $item)
                                                            <option value="{{ $item->id }}"
                                                                data-price="{{ $item->price }}"
                                                                data-no-of-student="{{ $item->no_of_student }}"
                                                                @if ($term_base_booking->swimming_class_id == $item->id) selected @endif>
                                                                {{ $item->name . '- AED ' . $item->price }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Class Type</label>
                                                <div class="form-control-wrap">
                                                    <select name="class_type_id" id="classType"
                                                        class="select2 form-control" data-search="on">
                                                        <option value="">select calss type</option>
                                                        @foreach ($class_types as $item)
                                                            <option value="{{ $item->id }}"
                                                                class_occurrence="{{ $item->class_occurrence }}"
                                                                @if ($term_base_booking->class_type_id == $item->id) selected @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">

                                            <div class="form-group">
                                                <label class="form-label">Days</label>
                                                <select name="day_id[]" multiple id="days"
                                                    class="select2 form-control" data-search="on">
                                                    {{-- <option value="">select days</option> --}}
                                                    @foreach ($days as $item)
                                                        <option value="{{ $item->name }}"
                                                            data-days="{{ $item->name }}"
                                                            @foreach ($term_base_booking->termBaseBookingDays as $termBaseBookingDay) @if ($termBaseBookingDay->day_id == $item->id)
                                                            selected 
                                                           @endif @endforeach>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label class="form-label">No of Classes</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">

                                                            <input type="number" readonly name="no_of_class"
                                                                id="term_no_of_class"
                                                                value="{{ $term_base_booking->no_of_class }}"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label">No of Students</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <input type="number"
                                                                value="{{ $term_base_booking->no_of_student }}"
                                                                name="no_of_student" readonly id="no_of_student"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label">Discount%</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">

                                                            <input type="number" id="discount"
                                                                value="{{ $term_base_booking->discount }}"
                                                                name="discount" class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label class="form-label">Total</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <input type="number" readonly
                                                                value="{{ $term_base_booking->total }}" id="term_total"
                                                                name="total" class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 border-top mt-2">
                                            <div class="form-group">
                                                <label class="form-label">Term Trainer Venue Timings</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <table class="table table-striped table-bordered "
                                                            id="dynamicTable2">
                                                            <thead>
                                                                <tr>
                                                                    <th>Venue</th>
                                                                    <th>Trainer</th>
                                                                    <th>Timing</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $i2 = 0;
                                                                $total = 0;
                                                                ?>
                                                                @foreach ($term_base_booking->tranierDetails as $record)
                                                                    {{-- <input type="number" hidden
                                                                id="term_base_booking_id-{{ $i2 }}"
                                                                name="trianer_detail[{{ $i2 }}][term_base_booking_id]"
                                                                value="{{ $record->id }}"
                                                                class="form-control"> --}}

                                                                    <tr>

                                                                        <td>
                                                                            <input type="number" hidden
                                                                                id="term_base_booking_id-{{ $i2 }}"
                                                                                name="trianer_detail[{{ $i2 }}][term_base_booking_id]"
                                                                                value="{{ $record->id }}"
                                                                                class="form-control">
                                                                            <select id="venue_id-{{ $i2 }}"
                                                                                name="trianer_detail[{{ $i2 }}][venue_id]"
                                                                                class="form-control">
                                                                                <option value="">select venue
                                                                                </option>
                                                                                @foreach ($venues as $item)
                                                                                    <option value="{{ $item->id }}"
                                                                                        @if ($record->venue_id == $item->id) selected @endif>
                                                                                        {{ $item->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select id="trainer_id-{{ $i2 }}"
                                                                                name="trianer_detail[{{ $i2 }}][trainer_id]"
                                                                                class="form-control">
                                                                                <option value="">select trainer
                                                                                </option>
                                                                                @foreach ($trainers as $item)
                                                                                    <option value="{{ $item->id }}"
                                                                                        @if ($record->trainer_id == $item->id) selected @endif>
                                                                                        {{ $item->first_name . ' ' . $item->last_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select id="timing_id-{{ $i2 }}"
                                                                                name="trianer_detail[{{ $i2 }}][timing_id]"
                                                                                class="form-control">
                                                                                <option value="">select timing
                                                                                </option>
                                                                                @foreach ($timings as $item)
                                                                                    <option value="{{ $item->id }}"
                                                                                        @if ($record->timing_id == $item->id) selected @endif>
                                                                                        {{ $item->getName() }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td><button type="button"
                                                                                class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr"><em
                                                                                    class="icon ni ni-cross"></em></button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $i2++;
                                                                    ?>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <button type="button" name="add2"
                                                                            id="add2"
                                                                            class="btn btn-sm btn-success  d-none d-md-inline-flex"><em
                                                                                class="icon ni ni-plus"></em>Add
                                                                            More</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Term Packages</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <table class="table table-striped table-bordered "
                                                            id="dynamicTable1">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Start Date</th>
                                                                    <th>End Date</th>
                                                                    <th>No of class</th>
                                                                    <th>Price</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $i = 0;
                                                                $total = 0;
                                                                ?>

                                                                @foreach ($records as $detail)
                                                                    <?php
                                                                    $total += $detail->price * $detail->no_of_class;
                                                                    ?>

                                                                    <tr>

                                                                        <td>
                                                                            <input type="number" hidden
                                                                                id="term_base_package_id-{{ $i }}"
                                                                                name="addmore1[{{ $i }}][term_base_package_id]"
                                                                                value="{{ $detail->id }}"
                                                                                class="form-control">
                                                                            <input type="text"
                                                                                id="name-{{ $i }}"
                                                                                name="addmore1[{{ $i }}][name]"
                                                                                class="form-control"
                                                                                value="{{ $detail->name }}" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="date"
                                                                                id="start_date-{{ $i }}"
                                                                                name="addmore1[{{ $i }}][start_date]"
                                                                                value="{{ $detail->start_date }}"
                                                                                onchange="validateDate(event)"
                                                                                class="form-control">
                                                                        </td>
                                                                        <td>
                                                                            <input type="date"
                                                                                id="end_date-{{ $i }}"
                                                                                name="addmore1[{{ $i }}][end_date]"
                                                                                value="{{ $detail->end_date }}"
                                                                                onchange="validateEndDate(event)"
                                                                                class="form-control ">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" readonly
                                                                                id="no_of_class-{{ $i }}"
                                                                                name="addmore1[{{ $i }}][no_of_class]"
                                                                                class="form-control defualt_no_of_class"
                                                                                value="{{ $detail->no_of_class }}" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" readonly
                                                                                id="price-{{ $i }}"
                                                                                name="addmore1[{{ $i }}][price]"
                                                                                class="form-control defualt_price"
                                                                                value="{{ $detail->price }}" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" readonly
                                                                                id="total-{{ $i }}"
                                                                                name="addmore1[{{ $i }}][total]"
                                                                                class="form-control total"
                                                                                value="{{ $detail->total }}" />
                                                                        </td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr"><em
                                                                                    class="icon ni ni-cross"></em></button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $i++;
                                                                    ?>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th id="totalPrice">{{ $total }}</th>
                                                                    <th></th>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6">
                                                                        <button type="button" name="add1"
                                                                            id="add1"
                                                                            class="btn btn-sm btn-success  d-none d-md-inline-flex"><em
                                                                                class="icon ni ni-plus"></em>Add
                                                                            More</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('admin/term-base-bookings/' . $term_base_booking->id) }}','{{ url('admin/term-base-bookings') }}','add-schedule')"
                                                class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Update
                                                    Terms</span></button>
                                            <button type="button"
                                                onclick="window.location='{{ url('admin/term-base-bookings') }}'"
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
    <script>
        var i = parseInt('{{ $i }}');
        $("#add1").click(function() {
            $("#dynamicTable1").append('<tr>' +
                '<td><input type="text"  id="name-' + i + '" name="addmore1[' + i +
                '][name]" class="form-control" /></td>' +
                '<td><input type="date" id="start_date-' + i + '" name="addmore1[' + i +
                '][start_date]" onchange="validateDate(event)" class = "form-control date-picker" data-date-format="yyyy-mm-dd" ></td>' +
                '<td><input type="date" id="end_date-' + i + '" name="addmore1[' + i +
                '][end_date]" onchange="validateEndDate(event)" class = "form-control date-picker"   data-date-format = "yyyy-mm-dd" ></td>' +
                '<td><input type="text" readonly id="no_of_class-' + i + '" name="addmore1[' + i +
                '][no_of_class]" class="form-control" /></td>' +
                '<td><input type="text" readonly id="price-' + i + '" name="addmore1[' + i +
                '][price]" class="form-control defualt_price" /></td>' +
                '<td><input type="text" readonly id="total-' + i + '" name="addmore1[' + i +
                '][total]" class="form-control total" /></td>' +
                '<td><button  type="button"   class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr"><em class="icon ni ni-cross"></em></button></td>' +
                '</tr>');
            ++i;
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
        var classStudent;
        var classPrice = $('#classPrice').find(':selected').attr('data-price');
        var days = [];
        var totalDays = [];
        var blackoutDays = [];
        var selectedDays = $('#days').val();
        var classOccurrence = $('#classType').find(':selected').attr('class_occurrence');
        $('#classType').on('change', function(e) {
            window.classOccurrence = 0;
            window.classOccurrence = $(this).find(':selected').attr('class_occurrence');
             $("#term_no_of_class").val(0);
            $('#discount').val(0);
            $('#term_total').val(0);
            $('#days').val('').change();
            days = [];
            totalDays = [];
            blackoutDays = [];
            e.preventDefault();
        });
        console.log(window.days)
        console.log(window.classOccurrence)
        
        $('#days').on('change', function(e) {
            if ($(this).find(':selected').val() != undefined) {
                if ($(this).find(':selected').val() == undefined) {
                    window.days = [];
                } else {
                    // window.days=[];
                    window.days = $('#days').val();
                }
                totalDays = [];
                blackoutDays = [];
                var termDays = $('#days').val();
                var start_date = $("#start_date").val();
                var end_date = $("#end_date").val();
                let termSelectedDateDays = [];
                const dates = getDates(new Date(start_date), new Date(end_date))
                dates.forEach(function(date) {
                    let day = date.toLocaleString('en-us', {
                        weekday: 'long'
                    });
                    termSelectedDateDays.push(day);
                })
                // end
                // fillter package days and termdays
                var filtered = termSelectedDateDays.filter(
                    function(element) {
                        $.each(termDays, function(i, v) {
                            if (v === element) {
                                totalDays.push(v);
                            }
                        })
                    },

                );
                //end
                /// blackout calculation
                var blackout_start_date_collection = [...$("input[name='blackout_start_date[]']")];
                var blackout_end_date_collection = [...$("input[name='blackout_end_date[]']")];
                var date_collection = []
                $.each(blackout_start_date_collection, function(i, v) {
                    const new_obj = {
                        startDate: $(v).val(),
                        endDate: $(blackout_end_date_collection[i]).val(),
                    }
                    if (date_collection.includes(new_obj)) return;
                    date_collection.push(new_obj)
                });

                date_collection.forEach(function(object) {
                    let termSelectedBlackoutDateDays = [];
                    const dates = getDates(new Date(object.startDate), new Date(object.endDate))
                    dates.forEach(function(date) {
                        let day = date.toLocaleString('en-us', {
                            weekday: 'long'
                        });
                        termSelectedBlackoutDateDays.push(day);
                    })
                    // end
                    // fillter package days and termdays
                    var filtered = termSelectedBlackoutDateDays.filter(
                        function(element) {
                            $.each(termDays, function(i, v) {
                                if (v === element) {
                                    blackoutDays.push(v);
                                }
                            })
                        },
                    );

                });
                console.log(date_collection, blackoutDays)
                /// blackout calculation
                //append value in no of class and total
                let totalDaysAfterBlackout = totalDays.length - blackoutDays.length;
                var noOfClasses = $("#term_no_of_class").val(0);
                var noOfClasses = $("#term_no_of_class").val(totalDaysAfterBlackout);
                var term_no_class = $('#term_no_of_class').val()
                var termDiscount = $('#discount').val()
                var termPrice = term_no_class * classPrice;

                var discount = (termPrice * termDiscount) / 100;
                var termTotal = termPrice - discount;
                // console.log(term_no_class, termDiscount, termPrice, discount, termTotal)
                $('#term_total').val(termTotal.toFixed(2))
            }
            if (window.days.length > window.classOccurrence) {
                window.days = [];
                $("#days").val([]).change();
                var term_no_class = $('#term_no_of_class').val('')
                var termDiscount = $('#discount').val('')
                $('#term_total').val('')
                showWarn("Please select " + window.classOccurrence + " day");
            }
            e.preventDefault();
        });
        $('#classPrice').on('change', function(e) {
            window.classPrice = 0;
            window.classPrice = $(this).find(':selected').attr('data-price');
            window.classStudent = $(this).find(':selected').attr('data-no-of-student');
            $('#no_of_student').val(window.classStudent);
            // on change class price changing value of packages price &&  total && grand total which show from database
            $('.defualt_price').each(function() {
                this.value = window.classPrice;
            });
            $('.defualt_no_of_class').each(function() {
                var val = this.value
                var defaultToalPrice = 0;
                $('.total').each(function() {
                    this.value = 0;
                    this.value = window.classPrice * val;
                    defaultToalPrice += parseFloat(this.value);

                });
                $('#totalPrice').text(0)
                $('#totalPrice').text(defaultToalPrice.toFixed(2))
            });
            // end
            // change term total
            var term_no_class = $('#term_no_of_class').val()
            var termDiscount = $('#discount').val()
            var termPrice = term_no_class * window.classPrice;
            var discount = (termPrice * termDiscount) / 100;
            var termTotal = termPrice - discount;
            console.log(term_no_class, termDiscount, termPrice, discount, termTotal)
            $('#term_total').val(termTotal.toFixed(2))
            e.preventDefault();
        });



        function validateDate(e) {
            var to = $("#end_date").val();
            var from = $("#start_date").val();
            var ck = e.target.value
            if (dateCheck(from, to, ck, null)) {

                showSuccess("Availed");
            } else {
                e.target.value = "";
                showWarn("Not Availed");
            }
        }

        function validateEndDate(e) {

            totalDays = [];
            var termDays = $('#days').val();
            var to = $("#end_date").val();
            var from = $("#start_date").val();
            // split get index of array
            id = e.target.getAttribute('id')
            var data = id.split('-');
            //get start date
            var ck1 = $("#start_date-" + data[1]).val();
            //get end date
            var ck2 = e.target.value;
            console.log(ck2, ck1);

            if (dateCheck(from, to, ck1, ck2)) {
                var pr = window.classPrice;
                // console.log(pr)
                var price = $("#price-" + data[1]).val(pr);
                // get package days in 
                let packageDays = [];
                const dates = getDates(new Date(ck1), new Date(ck2))
                dates.forEach(function(date) {
                    let day = date.toLocaleString('en-us', {
                        weekday: 'long'
                    });
                    packageDays.push(day);
                })
                // end
                // fillter package days and termdays
                var filtered = packageDays.filter(
                    function(element) {
                        $.each(termDays, function(i, v) {
                            if (v === element) {
                                totalDays.push(v);
                            }
                        })
                    },

                );
                //end
                //append value in no of class and total

                var blackout_start_date = $("#blackout_start_date").val();
                var blackout_end_date = $("#blackout_end_date").val();
                if (blackoutDays.length > 0 && blackoutDateCheck(blackout_start_date, blackout_end_date, ck1, ck2)) {
                    var noOfClasses = $("#no_of_class-" + data[1]).val(0);
                    var noOfClasses = $("#no_of_class-" + data[1]).val(totalDays.length - blackoutDays.length);
                    var total = $("#total-" + data[1]).val(pr * (totalDays.length - blackoutDays.length));

                    var totalPrice = 0;
                    $('.total').each(function() {
                        totalPrice += parseFloat(this.value);
                    });
                    $('#totalPrice').text(0)
                    $('#totalPrice').text(totalPrice.toFixed(2))
                    // end
                } else {

                    var noOfClasses = $("#no_of_class-" + data[1]).val(0);
                    var noOfClasses = $("#no_of_class-" + data[1]).val(totalDays.length);
                    var total = $("#total-" + data[1]).val(pr * totalDays.length);

                    var totalPrice = 0;
                    $('.total').each(function() {
                        totalPrice += parseFloat(this.value);
                    });
                    $('#totalPrice').text(0)
                    $('#totalPrice').text(totalPrice.toFixed(2))
                }

                showSuccess("Availed");
            } else {
                e.target.value = "";
                showWarn("Not Availed");
            }

        }

        function termValidateEndDate(e) {
            totalDays = [];
            //get start date
            var start_date = $("#start_date").val();
            //get end date
            var end_date = e.target.value;
            // get package days in 
            // append price
            if (termDateCheck(start_date, end_date)) {
                showSuccess("Availed");
            } else {
                e.target.value = "";
                showWarn("Not Availed");
            }
        }
        $('#discount').on('keyup', function() {
            var term_no_class = $('#term_no_of_class').val()
            var termDiscount = $(this).val()
            var termPrice = term_no_class * classPrice;

            var discount = (termPrice * termDiscount) / 100;
            var termTotal = termPrice - discount;
            console.log(term_no_class, termDiscount, termPrice, discount, termTotal)
            $('#term_total').val(0)
            $('#term_total').val(termTotal)
        })

        function blackoutValidateEndDate(e) {
            $("#term_no_of_class").val(@json($term_base_booking->no_of_class))
            blackoutDays = [];
            var termDays = $('#days').val();
            console.log(termDays.length)
            //get start date
            var start_date = $("#blackout_start_date").val();
            //get end date
            var end_date = e.target.value;
            // get package days in 
            // append price
            var term_start_date = $("#start_date").val();
            var term_end_date = $("#end_date").val();

            if (dateCheck(term_start_date, term_end_date, start_date, end_date)) {
                let termSelectedDateDays = [];
                const dates = getDates(new Date(start_date), new Date(end_date))
                dates.forEach(function(date) {
                    let day = date.toLocaleString('en-us', {
                        weekday: 'long'
                    });
                    termSelectedDateDays.push(day);
                })
                // end
                // fillter package days and termdays
                var filtered = termSelectedDateDays.filter(
                    function(element) {
                        $.each(termDays, function(i, v) {
                            if (v === element) {
                                blackoutDays.push(v);
                            }
                        })
                    },

                );
                //end
                //append value in no of class and total
                var noOfClasses = $("#term_no_of_class").val();
                var total = noOfClasses - blackoutDays.length;
                var noOfClasses = $("#term_no_of_class").val(0);
                var noOfClasses = $("#term_no_of_class").val(total);
                var term_no_class = $('#term_no_of_class').val()
                var termDiscount = $('#discount').val()
                var termPrice = term_no_class * classPrice;

                var discount = (termPrice * termDiscount) / 100;
                var termTotal = termPrice - discount;
                console.log(term_no_class, termDiscount, termPrice, discount, termTotal)
                $('#term_total').val(termTotal)

                showSuccess("Availed");
            } else {
                e.target.value = "";
                showWarn("Not Availed");
            }
        }

        function getDates(startDate, endDate) {
            const dates = []
            let currentDate = startDate
            const addDays = function(days) {
                const date = new Date(this.valueOf())
                date.setDate(date.getDate() + days)
                return date
            }
            while (currentDate <= endDate) {
                dates.push(currentDate)
                currentDate = addDays.call(currentDate, 1)
            }
            return dates
        }


        function dateCheck(from, to, check, check2) {
            var fDate, lDate, cDate;
            fDate = Date.parse(from);
            lDate = Date.parse(to);
            cDate1 = Date.parse(check); // start_date
            if (check2 != null) {
                cDate2 = Date.parse(check2); // end_date
                if ((cDate2 <= lDate && cDate2 >= cDate1)) {
                    return true;
                }
                return false;

            } else {

                if ((cDate1 <= lDate && cDate1 >= fDate)) {
                    return true;
                }
                return false;
            }

        }

        function blackoutDateCheck(blackout_start_date, blackout_end_date, check, check2) {
            var fDate, lDate, cDate;
            bfDate = Date.parse(blackout_start_date); // blackout start date
            blDate = Date.parse(blackout_end_date); // blackout end date
            cDate1 = Date.parse(check); // start_date
            // console.log(blackout_start_date,blackout_end_date,check,check2)
            cDate2 = Date.parse(check2); // end_date
            if ((blackout_start_date <= check2 && blackout_end_date >= check)) {
                return true;
            }
            return false;
        }

        function termDateCheck(from, to) {
            var fDate, lDate;
            fDate = Date.parse(from);
            lDate = Date.parse(to);
            if ((fDate <= lDate && lDate >= fDate)) {
                return true;
            }
            return false;
        }
    </script>
    <script>
        var i2 = parseInt('{{ $i2 }}');
        $("#add2").click(function() {
            $("#dynamicTable2").append('<tr>' +
                '<td> <select id="venue_id-' + i2 + '" name="trianer_detail[' + i2 +
                '][venue_id]" class="select2 form-control" data-search="on"> ' +
                '<option value = "" > select venue </option>' +
                '@foreach ($venues as $item)' +
                '<option value = "{{ $item->id }}" > {{ $item->name }} </option>' +
                '@endforeach' +
                '</select></td>' +
                '<td> <select id="trainer_id-' + i2 + '" name="trianer_detail[' + i2 +
                '][trainer_id]" class="select2 form-control" data-search="on"> ' +
                '<option value = "" > select trainer </option>' +
                '@foreach ($trainers as $item)' +
                '<option value = "{{ $item->id }}" > {{ $item->first_name . ' ' . $item->last_name }} </option>' +
                '@endforeach' +
                '</select></td>' +
                '<td> <select id="timing_id-' + i2 + '" name="trianer_detail[' + i2 +
                '][timing_id]" class="select2 form-control" data-search="on"> ' +
                '<option value = "" > select timing </option>' +
                '@foreach ($timings as $item)' +
                '<option value = "{{ $item->id }}" > {{ $item->getName() }} </option>' +
                '@endforeach' +
                '</select></td>' +
                '<td><button  type="button"   class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr"><em class="icon ni ni-cross"></em></button></td>' +
                '</tr>');
            ++i2
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

        function showBlackout(e) {
            if ($('#check').is(':checked') == true) {
                $('#blackout').show();
            } else {
                $('#blackout').hide();
                $("#blackout_start_date").val('');
                $("#blackout_end_date").val('');
                if (totalDays.length > 0) {
                    var termDiscount = $('#discount').val()
                    var term_no_class = $('#term_no_of_class').val(totalDays.length)
                    var term_no_class = $('#term_no_of_class').val()
                    var termPrice = term_no_class * classPrice;
                    var discount = (termPrice * termDiscount) / 100;
                    var termTotal = termPrice - discount;
                    $('#term_total').val(termTotal)
                }


            }
        }
    </script>
@stop
