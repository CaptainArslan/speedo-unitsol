@extends('admin.layouts.master')


@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Contact Us</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <!-- <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                            <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Product</span></a>
                                        </li>
                                    </ul> -->
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Customer feedback list</h4>
                            <div class="nk-block-des">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Message</th>
                                        <th>Date Received</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1891</td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">Abu Bin Ishtiyak <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>info@softnio.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Complete message from customer or parents will be display
                                            here.</td>
                                        <td>June 24, 2022</td>

                                        <td>
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-edit"></em><span>View</span></a>
                                                                </li>
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1891</td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">Abu Bin Ishtiyak <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>info@softnio.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Complete message from customer or parents will be display
                                            here.</td>
                                        <td>June 24, 2022</td>

                                        <td>
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-edit"></em><span>View</span></a>
                                                                </li>
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1891</td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">Abu Bin Ishtiyak <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>info@softnio.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Complete message from customer or parents will be display
                                            here.</td>
                                        <td>June 24, 2022</td>

                                        <td>
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-edit"></em><span>View</span></a>
                                                                </li>
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1891</td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">Abu Bin Ishtiyak <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>info@softnio.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Complete message from customer or parents will be display
                                            here.</td>
                                        <td>June 24, 2022</td>

                                        <td>
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-edit"></em><span>View</span></a>
                                                                </li>
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1891</td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">Abu Bin Ishtiyak <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>info@softnio.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Complete message from customer or parents will be display
                                            here.</td>
                                        <td>June 24, 2022</td>

                                        <td>
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-edit"></em><span>View</span></a>
                                                                </li>
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1891</td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">Abu Bin Ishtiyak <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>info@softnio.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Complete message from customer or parents will be display
                                            here.</td>
                                        <td>June 24, 2022</td>

                                        <td>
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-edit"></em><span>View</span></a>
                                                                </li>
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
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
@stop
