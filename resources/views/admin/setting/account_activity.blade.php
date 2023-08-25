@extends('admin.layouts.master')
@section('style')
    <title>{{ $title }} | Swimming Pool Management System</title>
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
                                            <h4 class="nk-block-title">Account Activity</h4>
                                            <div class="nk-block-des">
                                                <p>Here is your last 20 login activities log. <span class="text-soft"><em
                                                            class="icon ni ni-info text-danger"></em></span></p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block card card-bordered">
                                    <table class="table table-ulogs">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="tb-col-os"><span class="overline-title">Browser <span
                                                            class="d-sm-none">/ IP</span></span></th>
                                                <th class="tb-col-ip"><span class="overline-title">IP</span></th>
                                                <th class="tb-col-time"><span class="overline-title">Time</span></th>
                                                <th class="tb-col-time"><span class="overline-title">Activity</span></th>
                                                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="tb-col-os">Chrome on Window</td>
                                                <td class="tb-col-ip"><span class="sub-text">192.149.122.128</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-danger ml-0">Deleted</span></span></td>
                                                <td class="tb-col-action"><a href="#" class="link-cross mr-sm-n1"><em
                                                            class="icon ni ni-cross"></em></a></td>
                                            </tr>
                                            <tr>
                                                <td class="tb-col-os">Mozilla on Window</td>
                                                <td class="tb-col-ip"><span class="sub-text">86.188.154.225</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-success ml-0">Updated</span></span></td>
                                                <td class="tb-col-action"><a href="#" class="link-cross mr-sm-n1"><em
                                                            class="icon ni ni-cross"></em></a></td>
                                            </tr>
                                            <tr>
                                                <td class="tb-col-os">Chrome on iMac</td>
                                                <td class="tb-col-ip"><span class="sub-text">192.149.122.128</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-danger ml-0">Deleted</span></span></td>
                                                <td class="tb-col-action"><a href="#" class="link-cross mr-sm-n1"><em
                                                            class="icon ni ni-cross"></em></a></td>
                                            </tr>
                                            <tr>
                                                <td class="tb-col-os">Chrome on Window</td>
                                                <td class="tb-col-ip"><span class="sub-text">192.149.122.128</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-primary ml-0">Created</span></span></td>
                                                <td class="tb-col-action"><a href="#" class="link-cross mr-sm-n1"><em
                                                            class="icon ni ni-cross"></em></a></td>
                                            </tr>
                                            <tr>
                                                <td class="tb-col-os">Mozilla on Window</td>
                                                <td class="tb-col-ip"><span class="sub-text">86.188.154.225</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-success ml-0">Updated</span></span></td>
                                                <td class="tb-col-action"><a href="#" class="link-cross mr-sm-n1"><em
                                                            class="icon ni ni-cross"></em></a></td>
                                            </tr>
                                            <tr>
                                                <td class="tb-col-os">Chrome on iMac</td>
                                                <td class="tb-col-ip"><span class="sub-text">192.149.122.128</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-primary ml-0">Created</span></span></td>
                                                <td class="tb-col-action"><a href="#"
                                                        class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tb-col-os">Chrome on Window</td>
                                                <td class="tb-col-ip"><span class="sub-text">192.149.122.128</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-success ml-0">Updated</span></span></td>
                                                <td class="tb-col-action"><a href="#"
                                                        class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tb-col-os">Mozilla on Window</td>
                                                <td class="tb-col-ip"><span class="sub-text">86.188.154.225</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-danger ml-0">Deleted</span></span></td>
                                                <td class="tb-col-action"><a href="#"
                                                        class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tb-col-os">Chrome on iMac</td>
                                                <td class="tb-col-ip"><span class="sub-text">192.149.122.128</span></td>
                                                <td class="tb-col-time"><span class="sub-text">11:34 PM</span></td>
                                                <td class="tb-col-time"><span class="sub-text"><span
                                                            class="badge badge-primary ml-0">Created</span></span></td>
                                                <td class="tb-col-action"><a href="#"
                                                        class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- .nk-block-head -->
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
