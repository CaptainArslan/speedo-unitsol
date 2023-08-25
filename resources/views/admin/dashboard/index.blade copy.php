@extends('admin.layouts.master')
@section('style')
    <title>Dashboard | Swimming Pool Management System</title>
@stop
@section('content')
    @can('view_dashboard')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to Swimming Pool Management System</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="dropdown">
                                                <a href="#"
                                                    class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                    data-toggle="dropdown"><em
                                                        class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span
                                                            class="d-none d-md-inline">Last</span> 30 Days</span><em
                                                        class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em
                                                    class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-xxl-6">
                            <div class="row g-gs">
                                <div class="col-lg-6 col-xxl-12">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="card-title-group align-start mb-2">
                                                <div class="card-title">
                                                    <h6 class="title">Students Enrolement</h6>
                                                    <p>In last 30 days Enrolement of students</p>
                                                </div>
                                                <div class="card-tools">
                                                    <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                        data-placement="left" title="Revenue from subscription"></em>
                                                </div>
                                            </div>
                                            <div
                                                class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                                <div class="nk-sale-data-group flex-md-nowrap g-4">
                                                    <div class="nk-sale-data">
                                                        <span class="amount">43
                                                            <!--<span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>16.93%</span>-->
                                                        </span>
                                                        <span class="sub-title">This Month</span>
                                                    </div>
                                                    <div class="nk-sale-data">
                                                        <span class="amount">12
                                                            <!-- <span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>4.26%</span> -->
                                                        </span>
                                                        <span class="sub-title">This Week</span>
                                                    </div>
                                                </div>
                                                <div class="nk-sales-ck sales-revenue">
                                                    <canvas class="sales-bar-chart" id="salesRevenue"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .col -->

                                <div class="col-lg-6 col-xxl-6">
                                    <div class="row g-gs">
                                        <div class="col-sm-12 col-lg-12 col-xxl-12">
                                            <div class="card card-bordered">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-2">
                                                        <div class="card-title">
                                                            <h6 class="title">Subscriptions</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip"
                                                                data-placement="left"
                                                                title="Total subscription fo this month"></em>
                                                        </div>
                                                    </div>
                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                        <div class="nk-sale-data">
                                                            <span class="amount">AED 12K</span>
                                                            <span class="sub-title"><span
                                                                    class="change down text-danger"><em
                                                                        class="icon ni ni-arrow-long-down"></em>1.93%</span>since
                                                                last month</span>
                                                        </div>
                                                        <div class="nk-sales-ck">
                                                            <canvas class="sales-bar-chart"
                                                                id="activeSubscription"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                    </div><!-- .row -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .col -->
                        <div class="col-xxl-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start gx-3 mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Sales Overview</h6>
                                            {{-- @dd($sales) --}}
                                            <p>In 30 days sales of swimming product. <a href="#">See Details</a></p>
                                        </div>
                                        <div class="card-tools">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-primary btn-dim d-none d-sm-inline-flex"
                                                    data-toggle="dropdown"><em
                                                        class="icon ni ni-download-cloud"></em><span><span
                                                            class="d-none d-md-inline">Download</span> Report</span></a>
                                                <a href="#" class="btn btn-icon btn-primary btn-dim d-sm-none"
                                                    data-toggle="dropdown"><em class="icon ni ni-download-cloud"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Download Mini Version</span></a></li>
                                                        <li><a href="#"><span>Download Full Version</span></a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-opt-alt"></em><span>More
                                                                    Options</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                                        <div class="nk-sale-data">
                                            <span class="amount">AED {{$sales?->sum('price')}} </span>
                                        </div>
                                        {{-- @dd($sales,$sales_prices,$sales_labels) --}}
                                        <div class="nk-sale-data">
                                            <span class="amount sm">{{count($sales?->toArray())}} <small>Sales</small></span>
                                        </div>
                                    </div>
                                    <div class="nk-sales-ck large pt-4">
                                        <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        {{-- Transito --}}
                        <div class="col-xxl-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title"><span class="mr-2">Transaction</span> <a href="#"
                                                    class="link d-none d-sm-inline">See History</a></h6>
                                        </div>
                                        <div class="card-tools">
                                            <ul class="card-tools-nav">
                                                <li><a href="#"><span>Paid</span></a></li>
                                                <li><a href="#"><span>Pending</span></a></li>
                                                <li class="active"><a href="#"><span>All</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner p-0 border-top">
                                    <div class="nk-tb-list nk-tb-orders">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col"><span>Order No.</span></div>
                                            <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                            <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                            <div class="nk-tb-col tb-col-lg"><span>Ref</span></div>
                                            <div class="nk-tb-col"><span>Amount</span></div>
                                            <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                            <div class="nk-tb-col"><span>&nbsp;</span></div>
                                        </div>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col">
                                                <span class="tb-lead"><a href="#">#95954</a></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-purple">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">02/11/2022</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span class="tb-sub text-primary">SUB-2309232</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub tb-amount">4,596.75 <span>AED</span></span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-action">
                                                <div class="dropdown">
                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                        <ul class="link-list-plain">
                                                            <li><a href="#">View</a></li>
                                                            <li><a href="#">Invoice</a></li>
                                                            <li><a href="#">Print</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col">
                                                <span class="tb-lead"><a href="#">#95850</a></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-azure">
                                                        <span>DE</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Desiree Edwards</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">02/02/2022</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span class="tb-sub text-primary">SUB-2309154</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub tb-amount">596.75 <span>AED</span></span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-dot badge-dot-xs badge-danger">Canceled</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-action">
                                                <div class="dropdown">
                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                        <ul class="link-list-plain">
                                                            <li><a href="#">View</a></li>
                                                            <li><a href="#">Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col">
                                                <span class="tb-lead"><a href="#">#95812</a></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-warning">
                                                        <img src="./images/avatar/b-sm.jpg" alt="">
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Blanca Schultz</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">02/01/2022</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span class="tb-sub text-primary">SUB-2309143</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub tb-amount">199.99 <span>AED</span></span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-action">
                                                <div class="dropdown">
                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                        <ul class="link-list-plain">
                                                            <li><a href="#">View</a></li>
                                                            <li><a href="#">Invoice</a></li>
                                                            <li><a href="#">Print</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col">
                                                <span class="tb-lead"><a href="#">#95256</a></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-purple">
                                                        <span>NL</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Naomi Lawrence</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">01/29/2022</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span class="tb-sub text-primary">SUB-2305684</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub tb-amount">1099.99 <span>AED</span></span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-action">
                                                <div class="dropdown">
                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                        <ul class="link-list-plain">
                                                            <li><a href="#">View</a></li>
                                                            <li><a href="#">Invoice</a></li>
                                                            <li><a href="#">Print</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col">
                                                <span class="tb-lead"><a href="#">#95135</a></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <div class="user-card">
                                                    <div class="user-avatar user-avatar-sm bg-success">
                                                        <span>CH</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Cassandra Hogan</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub">01/29/2022</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span class="tb-sub text-primary">SUB-2305564</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-sub tb-amount">1099.99 <span>AED</span></span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-dot badge-dot-xs badge-warning">Due</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-action">
                                                <div class="dropdown">
                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                        <ul class="link-list-plain">
                                                            <li><a href="#">View</a></li>
                                                            <li><a href="#">Invoice</a></li>
                                                            <li><a href="#">Notify</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner-sm border-top text-center d-sm-none">
                                    <a href="#" class="btn btn-link btn-block">See History</a>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    @endcan
@endsection
