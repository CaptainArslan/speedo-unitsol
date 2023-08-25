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
                            <h3 class="nk-block-title page-title"> Edit Term</h3>
                            <p>You can edit term as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-class">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Name<sup class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" required
                                                            value="{{ $record->name }}" class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Duration (Start Date -- End Date)</label>
                                                    <div class="row gx-2">
                                                        <div class="w-50">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" id="start_date" name="start_date"
                                                                    value="{{ $record->start_date }}"
                                                                    class="form-control date-picker"
                                                                    data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
                                                        <div class="w-50">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" id="end_date"
                                                                    onchange="termValidateEndDate(event)" name="end_date"
                                                                    value="{{ $record->end_date }}"
                                                                    class="form-control date-picker"
                                                                    data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Blackout Periods</label>
                                                <div class="form-group">
                                                    <table class="table table-striped table-bordered " id="dynamicTable2">
                                                        <thead>
                                                            <tr>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            ?>
                                                            @foreach ($record->termBalackouts as $item)
                                                                <tr>
                                                                    <td>
                                                                        <input type="text"
                                                                            id="blackout_start_date-{{ $i }}"
                                                                            name="blackout[{{ $i }}][blackout_start_date]"
                                                                            value="{{ $item->start_date }}" required
                                                                            class="form-control date-picker"
                                                                            data-date-format="yyyy-mm-dd"
                                                                            id="product-title">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text"
                                                                            id="blackout_end_date-{{ $i }}"
                                                                            name="blackout[{{ $i }}][blackout_end_date]"
                                                                            value="{{ $item->end_date }}" required
                                                                            class="form-control date-picker"
                                                                            onchange="blackoutValidateEndDate(event)"
                                                                            data-date-format="yyyy-mm-dd"
                                                                            id="product-title">
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr">
                                                                            <em class="icon ni ni-cross"></em></button>
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
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <button type="button" name="addMore1" id="addMore1"
                                                                        class="btn btn-sm btn-success  d-none d-md-inline-flex"><em
                                                                            class="icon ni ni-plus"></em>Add
                                                                        More</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/terms/' . $record->id) }}','{{ url('admin/terms') }}','edit-class')"
                                                    class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Update
                                                        Term</span></button>
                                                <button type="button" onclick="window.location='{{ url('admin/terms') }}'"
                                                    class="btn btn-warning"><em
                                                        class="icon ni ni-cross"></em><span>Cancel</span></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div><!-- .card-preview -->
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        var i = parseInt('{{ $i }}');
        $("#addMore1").click(function() {
            ++i;
            $("#dynamicTable2").append('<tr>' +
                '<td><input type="date" id="blackout_start_date-' + i + '" name="blackout[' + i +
                '][blackout_start_date]"  class = "form-control date-picker" data-date-format="yyyy-mm-dd" ></td>' +
                '<td><input type="date" id="blackout_end_date-' + i + '" name="blackout[' + i +
                '][blackout_end_date]" onchange="blackoutValidateEndDate(event)" class = "form-control date-picker"   data-date-format = "yyyy-mm-dd" ></td>' +
                '<td><button  type="button"   class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr"><em class="icon ni ni-cross"></em></button></td>' +
                '</tr>');
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

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

        function blackoutValidateEndDate(e) {
            id = e.target.getAttribute('id')
            var data = id.split('-');
            //get start date
            var start_date = $("#blackout_start_date-" + data[1]).val();
            //get end date
            var end_date = e.target.value;

            var term_start_date = $("#start_date").val();
            var term_end_date = $("#end_date").val();
            // get package days in 
            // append price
            if (dateCheck(term_start_date, term_end_date, start_date, end_date)) {
                showSuccess("Availed");
            } else {
                e.target.value = "";
                showWarn("Date Not Between Term Dates");
            }
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
    </script>
@stop
