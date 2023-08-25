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
                            <h3 class="nk-block-title page-title">Class Schedule</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{$records}} class schedule.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <form>
                                        {{-- @dd(request()) --}}
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-group">
                                                    <label class="form-label">Between Two Dates</label>
                                                    <div class="form-control-wrap">
                                                        <div class="input-daterange date-picker-range input-group">
                                                            {{-- @dd(isset(request()->start_date)) --}}
                                                            <input type="text" onchange="getStartDate(event)"
                                                                value="{{ request()->start_date }}" name="start_date"
                                                                id="start_date" class="form-control" />
                                                            <div class="input-group-addon">TO</div>
                                                            <input type="text" onchange="getEndDate(event)"
                                                                value="{{ request()->end_date }}" name="end_date"
                                                                id="end_date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label class="form-label">Venue</label>
                                                    <div class="form-control-wrap">
                                                        <select name="status" onchange="getVenue(event)"
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
                                            {{-- <li class="nk-block-tools-opt">
                                                <a href="#" class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-search"></em><span>Find Report</span></a>
                                            </li> --}}
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table id='myTable' class="nowrap table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Term Name</th>
                                        <th>Class</th>
                                        <th>Trainer</th>
                                        <th>Venue</th>
                                        <th>Timing</th>
                                        <th>Total Booked</th>
                                        <th>Duration</th>
                                        <th>Days</th>
                                        <th>No of Student</th>
                                        <th>Packages</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
    <script>
        $(function() {
            let urlParam = new URLSearchParams(window.location.search);
            let query_start_date = urlParam.get('start_date');
            let query_end_date = urlParam.get('end_date');
            let query_venue = urlParam.get('venue');
            let query_url = "{{ $url }}" + "?start_date=" + query_start_date + "&end_date=" +
                query_end_date +
                "&venue=" + query_venue;
            var auto_responsive = $(this).data('auto-responsive');
            var btn =
                '<"dt-export-buttons d-flex align-center"<"dt-export-title d-none d-md-inline-block">B>',
                btn_cls = 'with-export';
            var dom_normal = '<"row justify-between g-2' + btn_cls +
                '"<"col-7 col-sm-4 text-left"f><"col-5 col-sm-8 text-right"<"datatable-filter"<"d-flex justify-content-end g-2"' +
                btn +
                'l>>>><"datatable-wrap my-3"t><"row align-items-center"<"col-7 col-sm-12 col-md-9"p><"col-5 col-sm-12 col-md-3 text-left text-md-right"i>>';
            var dom_separate = '<"row justify-between g-2' + btn_cls +
                '"<"col-7 col-sm-4 text-left"f><"col-5 col-sm-8 text-right"<"datatable-filter"<"d-flex justify-content-end g-2"' +
                btn +
                'l>>>><"my-3"t><"row align-items-center"<"col-7 col-sm-12 col-md-9"p><"col-5 col-sm-12 col-md-3 text-left text-md-right"i>>';
            var dom = $(this).hasClass('is-separate') ? dom_separate : dom_normal;
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                dom: dom,
                language: {
                    search: "",
                    searchPlaceholder: "Type in to Search",
                    lengthMenu: "<span class='d-none d-sm-inline-block'>Show</span><div class='form-control-select'> _MENU_ </div>",
                    info: "_START_ -_END_ of _TOTAL_",
                    infoEmpty: "No records found",
                    infoFiltered: "( Total _MAX_  )",
                    paginate: {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Prev"
                    },
                },
                ajax: {
                    url: query_url,
                    dataType: "json",
                    type: "GET",
                },
                columns: [{
                    data: 'id'
                }, {
                    data: 'name'
                }, {
                    data: 'class'
                }, {
                    data: 'trainer'
                }, {
                    data: 'venue'
                }, {
                    data: 'timing'
                },{
                    data: 'booked'
                }, {
                    data: 'duration'
                }, {
                    data: 'days'
                }, {
                    data: 'no_of_student'
                }, {
                    data: 'packages'
                }, {
                    data: 'actions'
                }],
                buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            });
            $('.dt-export-title').text('Export');



        });
        let s_date;
        let e_date;

        function getStartDate(e) {
            window.s_date = "";
            window.s_date = e.target.value;
        }
        function getEndDate(e) {
                window.e_date = "";
                window.e_date = e.target.value;
                console.log(window.s_date, window.e_date);
                window.location.href = "{{ url('admin/class-schedules?start_date=') }}" + $('#start_date').val() + "&end_date=" +
                    window.e_date;

        }

        function getVenue(e) {
            let venue_id = e.target.value;
            let sdate = $('#start_date').val();
            let edate = $('#end_date').val();
            console.log($('#start_date').val(), $('#end_date').val());
            window.location.href = "{{ url('admin/class-schedules?start_date=') }}" + sdate + "&end_date=" +
                edate + "&venue=" + venue_id;
        }
    </script>
@stop
