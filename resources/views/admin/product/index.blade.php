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
                            <h3 class="nk-block-title page-title">Products</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text" class="form-control" id="default-04"
                                                    placeholder="Quick search by id">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#"
                                                    class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                    data-toggle="dropdown">Status</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>New Items</span></a></li>
                                                        <li><a href="#"><span>Featured</span></a></li>
                                                        <li><a href="#"><span>Out of Stock</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        @can('add_product')
                                            <li class="nk-block-tools-opt">
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Add
                                                        Product</span></a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

                <!-- Product List @s -->
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Product List</h4>
                            <div class="nk-block-des">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table id="myTable" class=" nowrap table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>Product Name</th>

                                        <th>SKU</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>Date Added</th>
                                        <th>Date Updated</th>
                                        <th>Actions</th>
                                        <th></th>
                                        <th>Sizes</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div>
                <!-- Product List @e -->

                @include('admin.product.create')
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
                    },
                    {
                        data: 'image',
                        "render": function(data) {
                            return '<div class="user-avatar sq">  <img src="{{ $image_url }}/' +
                                data + '" alt="" class="thumb"> </div>';
                        }
                    },
                    {
                        data: 'name'
                    }, {
                        data: 'sku'
                    },

                    {
                        data: 'stock'
                    }, {
                        data: 'sale_price'
                    }, {
                        data: 'created_at'
                    }, {
                        data: 'updated_at'
                    },{
                        data: 'actions'
                    },{
                        data: 'empty'
                    }, {
                        data: 'size'
                    },
                ],
                buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            });
            $('.dt-export-title').text('Export');

        });
    </script>
    <script>
        var i = 1;
        $("#add2").click(function() {

            $("#dynamicTable2").append('<tr>' +
                '<td> <input type="text"  id="name-' + i + '" name="product_size[' + i +
                '][name]" class="form-control" /></td>' +
                '<td><button  type="button"   class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr"><em class="icon ni ni-cross"></em></button></td>' +
                '</tr>');
            ++i;
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@stop
