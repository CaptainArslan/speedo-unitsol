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
                                            <h5 class="nk-block-title">General settings</h5>
                                            <span>These settings helps you modify site settings.</span>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <form id="edit-setting" class="gy-3 form-settings">
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Business Name</label>
                                                    <span class="form-note">Specify the name of your Business.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="business_name" class="form-control"
                                                            id="site-name" value="{{ $setting->business_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Business Logo</label>
                                                    <span class="form-note">The logo of your business</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" name="business_logo"
                                                                class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-address">Business Address</label>
                                                    <span class="form-note">Specify the name of your business
                                                        address.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="business_address" class="form-control"
                                                            id="site-address" value="{{ $setting->business_address }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-copyright">Copyright</label>
                                                    <span class="form-note">Copyright information of your Business.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="copyright" class="form-control"
                                                            id="site-copyright" value="{{ $setting->copyright }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Main Site</label>
                                                    <span class="form-note">Specify the URL if your main website.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="main_site" class="form-control"
                                                            name="site-url" value="{{ $setting->main_site }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Facebook</label>
                                                    <span class="form-note">Specify the URL if your facebook page.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="facebook" class="form-control"
                                                            name="fb-site-url" value="{{ $setting->facebook }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Instagram</label>
                                                    <span class="form-note">Specify the URL if your instagram page.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="instagram" class="form-control"
                                                            name="insta-site-url" value="{{ $setting->instagram }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-off">Maintanance Mode</label>
                                                    <span class="form-note">Enable to make Project make offline.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="maintanance_mode"
                                                            @if ($setting->maintanance_mode == 1) checked @endif
                                                            id="site-off">
                                                        <label class="custom-control-label"
                                                            for="site-off">{{ $setting->maintanance_mode != 0 ? 'Online' : 'Offline' }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-lg-7">
                                                <div class="form-group mt-2">
                                                    <button type="button"
                                                        onclick="addFormData(event,'post','{{ url('admin/settings/' . $setting->id) }}','{{ url('admin/settings') }}','edit-setting')"
                                                        class="btn btn-lg btn-primary" data-target="#modalAlert"
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
