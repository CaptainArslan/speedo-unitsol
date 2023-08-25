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
                        <h3 class="nk-block-title page-title">Sales</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <div class="form-group">
                            <label class="form-label">Sales Between Two Dates</label>
                            <div class="form-control-wrap">
                                <div class="input-daterange date-picker-range input-group">
                                    <input type="text" class="form-control" />
                                    <div class="input-group-addon">TO</div>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                            data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="#"
                                        class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                            class="icon ni ni-search"></em><span>Find
                                            Report</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->

            <!-- Product List @s -->
            <div class="nk-block nk-block-lg">

                <div class="card card-preview">
                    <div class="card-inner">
                        <table id="myTable" class="table" >
                            <thead>
                                <tr>
                                    <th>Order#</th>
                                    {{-- <th></th> --}}
                                    <th>Customer Name</th>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Purchase Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div><!-- .card-preview -->
            </div>
            <!-- Product List @e -->
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
                    data: 'customer'
                }, {
                    data: 'name'
                }, {
                    data: 'created_at'
                }, {
                    data: 'price'
                }, {
                    data: 'status'
                }, {
                    data: 'actions'
                }],
                buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            });
            $('.dt-export-title').text('Export');

        });
    </script>
@stop
