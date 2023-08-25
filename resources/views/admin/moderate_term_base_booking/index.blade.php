@extends('admin.layouts.master')
@section('style')
    <title>{{ $title }} | Swimming Pool Management System</title>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: lightgreen;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px lightgreen;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Moderate Term Base Booking</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{ $records }} term base.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->

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
                                        <th>Approved</th>
                                        <th>Duration</th>
                                        <th>Class</th>
                                        <th>Days</th>
                                        <th>No of Student</th>
                                        <th>Detail</th>
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
                    url: '{{ $url }}',
                    dataType: "json",
                    type: "GET",
                },
                columns: [{
                        data: 'id'
                    }, {
                        data: 'name'
                    }, {
                        data: 'is_approved'
                    }, {
                        data: 'duration'
                    }, {
                        data: 'class'
                    }, {
                        data: 'days'
                    }, {
                        data: 'no_of_student'
                    }, {
                        data: 'detail'
                    },
                    {
                        data: 'actions'
                    }
                ],
                buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            });
            $('.dt-export-title').text('Export');



        });
    </script>
@stop
