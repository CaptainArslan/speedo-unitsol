@extends('admin.layouts.master')
@section('style')
    <title>{{$title}} | Swimming Pool Management System</title>
@stop
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Security Settings</h5>
                                            <span>These settings are helps you keep your account
                                                secure.</span>
                                            <span class="text-success"><em class="icon ni ni-shield-check"></em></span>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Save my Activity Logs</h6>
                                                        <p>You can save your all activity logs including
                                                            unusual activity detected.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <ul class="align-center gx-3">
                                                            <li class="order-md-last">
                                                                <div class="custom-control custom-switch mr-n2">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        checked="" id="activity-log">
                                                                    <label class="custom-control-label"
                                                                        for="activity-log"></label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Change Password</h6>
                                                        <p>Set a unique password to protect your
                                                            account.</p>
                                                    </div>
                                                    <div class="nk-block-actions flex-shrink-sm-0">
                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                            <li class="order-md-last">
                                                                <a href="#" class="btn btn-primary">Change
                                                                    Password</a>
                                                            </li>
                                                            <li>
                                                                <em class="text-soft text-date fs-12px">Last
                                                                    changed: <span>Oct 2,
                                                                        2019</span></em>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>2 Factor Auth &nbsp; <span
                                                                class="badge badge-success ml-0">Enabled</span>
                                                        </h6>
                                                        <p>Secure your account with 2FA security. When
                                                            it is activated you will need to enter not
                                                            only your password, but also a special code
                                                            using app. You can receive this code by in
                                                            mobile app. </p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <a href="#" class="btn btn-primary">Disable</a>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Auto Logout</h6>
                                                        <p>Set a auto logout time to disconnect your
                                                            account from all sessions.</p>
                                                    </div>
                                                    <div class="nk-block-actions flex-shrink-sm-0">
                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                            <li class="order-md-last">
                                                                <a href="#" class="btn btn-primary">Update</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Turn on login alerts <span
                                                                class="badge badge-success ml-0">Enabled</span>
                                                        </h6>
                                                        <p>Be notified if anyone logs in account from
                                                            unknown or new device</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <a href="#" class="btn btn-primary">Disable</a>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                                data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <h3 class="nk-block-title page-title">Settings</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Here you can change and edit your needs</p>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            @can('view_setting')
                                            <li><a class="active" href="{{ url('admin/settings') }}"><em
                                                        class="icon ni ni-user-fill-c"></em><span>General</span></a></li>
                                        @endcan
                                        @can('email_setting')
                                            <li><a href="{{ url('admin/setting-emails') }}"><em
                                                        class="icon ni ni-lock-alt-fill"></em><span>E-mail</span></a></li>
                                        @endcan
                                        @can('security_setting')
                                            <li><a href="{{ url('admin/setting-security') }}"><em
                                                        class="icon ni ni-shield-star-fill"></em><span>Security</span></a>
                                            </li>
                                        @endcan
                                        @can('account_activity_setting')
                                            <li><a href="{{ url('admin/setting-accounts') }}"><em
                                                        class="icon ni ni-activity-round-fill"></em><span>Account
                                                        activity</span></a></li>
                                        @endcan
                                        </ul>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                        </div><!-- card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
