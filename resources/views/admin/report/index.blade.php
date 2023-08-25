@extends('admin.layouts.master')


@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Billing Reports</h3>
                        <p>You have total 1 bookings.</p>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="form-group">
                                <label class="form-label">Report Between Two Dates</label>
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
                    </div>
                    <!--.nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-preview">
                    <div class="card-inner">
                        <table class="datatable-init-export nowrap table"
                            data-export-title="Export">
                            <thead>
                                <tr>
                                    <th>Order#</th>
                                    <th>Customer Name</th>
                                    <th>Subscription Modal</th>
                                    <th>Subscription Date</th>
                                    <th>Subscription Fee</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123</td>
                                    <td>
                                        <div class="user-card">
                                            <div
                                                class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                <span>MA</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="tb-lead">Muhammad Arslan<span
                                                        class="dot dot-success d-md-none ml-1"></span></span>
                                                <!-- <span>info@softnio.com</span> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot badge-primary">Baby Ducks - (2
                                            - 3 Years) - Evening</span>
                                    </td>
                                    <td>June 25, 2022</td>
                                    <td><span
                                            class="badge badge-primary ml-2 text-white">$350</span>
                                    </td>
                                    <td><span
                                            class="badge badge-success ml-2 text-white">Paid</span>
                                    </td>

                                    <td>
                                        <ul class="nk-tb-actions gx-1">
                                            <li>
                                                <a href="html/invoice-print.html" target="_blank"
                                                    class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em
                                                        class="icon ni ni-printer-fill"></em></a>
                                                <div class="drodown">
                                                    <a href="#"
                                                        class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em
                                                            class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="html/invoice-details.html"><em
                                                                        class="icon ni ni-eye"></em><span>View</span></a>
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
