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
                        <h3 class="nk-block-title page-title">Customer Info</h3>
                        <div class="nk-block-des text-soft">
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="">
                        <a href="{{ url('admin/customer-informations/'.$customer->id.'/student/add') }}" class="btn btn-primary d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add New Student</span></a>
                        <a href="{{ url('admin/customer-informations/'.$customer->id.'/student-booking') }}" class="btn btn-primary d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Book On Behalf</span></a>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="nk-block">
                            <div class="card-inner">
                                <div class="row g-3">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">First
                                                Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" disabled name="first_name" value="{{ $customer->first_name }}" class="form-control" id="product-title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">Middle
                                                Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" disabled name="middle_name" value="{{ $customer->middle_name }}" class="form-control" id="product-title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">Last
                                                Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" disabled name="last_name" value="{{ $customer->last_name }}" class="form-control" id="product-title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="regular-price">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" disabled name="email" value="{{ $customer->email }}" class="form-control" id="regular-price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="sale-price">Contact</label>
                                            <div class="form-control-wrap">
                                                <input type="text" disabled name="contact_number" value="{{ $customer->contact_number }}" class="form-control" id="sale-price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="sale-price">Date Of Birth</label>
                                            <div class="form-control-wrap">
                                                <input type="date" disabled name="dob" value="{{ $customer->dob }}" class="form-control" id="sale-price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="sale-price">Address</label>
                                            <div class="form-control-wrap">
                                                <textarea type="text" disabled name="address" class="form-control" id="sale-price">{{ $customer->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table id='myTable' class="nowrap table">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>School</th>
                                        <th>Medical Info</th>
                                        <th>Emergency Number</th>
                                        <th>Relation</th>
                                        <th>Action</th>
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
                    url: "{{ $url }}",
                    dataType: "json",
                    type: "GET",
                },
                columns: [{
                        data: 'id'
                    }, {
                        data: 'name'
                    },

                    {
                        data: 'dob'
                    }, {
                        data: 'school'
                    }, {
                        data: 'medical_information'
                    }, {
                        data: 'contact_number'
                    }, {
                        data: 'relation'
                    }, {
                        data: 'actions'
                    },

                ],
                buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            });
            $('.dt-export-title').text('Export');

        });
    </script>
    @stop