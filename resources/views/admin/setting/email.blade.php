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
                                            <h5 class="nk-block-title">E-mail settings</h5>
                                            <span>These settings are helps you modify your
                                                e-mail.</span>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <form id="edit-email" class="gy-3 form-settings">
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Email</label>
                                                    <span class="form-note">Specify the email of your
                                                        hotel.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="site-name"
                                                            name="email" value="{{ $setting->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-email">Password</label>
                                                    <span class="form-note">Specify the email
                                                        password.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="site-email"
                                                            name="password" value="{{ $setting->password }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-copyright">SMTP
                                                        Host</label>
                                                    <span class="form-note">Specify the SMTP host of
                                                        your email address.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="site-copyright"
                                                            name="smtp_host" value="{{ $setting->smtp_host }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">SMTP Port</label>
                                                    <span class="form-note">Specify the email SMTP
                                                        port.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="site-port"
                                                            name="smtp_port" value="{{ $setting->smtp_port }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">SMTP Encryption</label>
                                                    <span class="form-note">Specify the encryption of
                                                        your hotel email.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" 
                                                            name="smtp_encryption" value="{{ $setting->smtp_encryption }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-lg-7">
                                                <div class="form-group mt-2">
                                                    <button type="button"
                                                        onclick="addFormData(event,'post','{{ url('admin/settings/' . $setting->id) }}','{{ url('admin/setting-emails') }}','edit-email')"
                                                        class="btn btn-lg btn-primary" data-target="#modalAlertb1"
                                                        data-toggle="modal">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
