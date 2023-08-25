@extends('trainer.layouts.master')
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">My Profile</h3>
                <div class="nk-block-des">
                    <p>You have full control to manage your own account setting.</p>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">

            <div class="card card-bordered">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item active current-page">
                        <a class="nav-link active" href="html/user-profile-regular.html"><em
                                class="icon ni ni-user-fill-c"></em><span>Personal</span></a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Personal Information</h4>
                            <div class="nk-block-des">
                                <p>Basic info, like your name and address, that you use on
                                    Nio Platform.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <form id="add-detail">
                            <div class="nk-data data-list data-list-s2">
                                <div class="data-head">
                                    <h6 class="overline-title">Basics</h6>
                                </div>
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">First Name</span>
                                        <input type="text" name="first_name" class="form-control data-value"
                                            value="{{ $user->first_name }}">

                                    </div>

                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span>
                                    </div>
                                </div>
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Middle Name</span>
                                        <input type="text" name="middle_name" class="form-control data-value"
                                            value="{{ $user->middle_name }}">
                                    </div>

                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span>
                                    </div>
                                </div>
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Last Name</span>
                                        <input type="text" name="last_name" class="form-control data-value"
                                            value="{{ $user->last_name }}">
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span>
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <input type="email" name="email" class="form-control data-value"
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more disable"><em
                                                class="icon ni ni-lock-alt"></em></span></div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Phone Number</span>
                                        <input type="text" name="contact_number" class="form-control data-value"
                                            value="{{ $user->contact_number }}">
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span>
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Date of Birth</span>
                                        <input type="date" name="dob" class="form-control data-value"
                                            value="{{ $user->dob }}">
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span>
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit"
                                    data-tab-target="#address">
                                    <div class="data-col">
                                        <span class="data-label">Address</span>
                                        <textarea name="address" class="form-control" cols="10" rows="5">{{ $user->address }}</textarea>

                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span>
                                    </div>
                                </div><!-- data-item -->
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('trainer/profile-update/' . $user->id) }}','{{ url('trainer/account-settings') }}','add-detail')"
                                                class="btn float-right btn-lg btn-primary">Save
                                                Informations</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- data-list -->
                        </form>
                    </div><!-- .nk-block -->
                </div><!-- .card-inner -->
            </div>
            <div class="card card-bordered">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link active" href="html/user-profile-setting.html"><em
                                class="icon ni ni-lock-alt-fill"></em><span>Security
                                Settings</span></a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Security Settings</h4>
                                <div class="nk-block-des">
                                    <p>These settings are helps you keep your account
                                        secure.</p>
                                </div>
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                    data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-inner-group">
                                <div class="card-inner px-0">
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
                                                        <input type="checkbox" onchange="saveActivityLog(event,'{{url('trainer/save-activity-log/'.$user->id)}}')" class="custom-control-input"
                                                        value="{{$user->activity_log}}"  @if($user->activity_log == true) checked @endif id="activity-log">
                                                        <label class="custom-control-label" for="activity-log"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner px-0">
                                    <div class="between-center flex-wrap g-3">
                                        <div class="nk-block-text">
                                            <h6>Change Password</h6>
                                            <p>Set a unique password to protect your
                                                account.</p>
                                        </div>
                                        <div class="nk-block-actions flex-shrink-sm-0">
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                <li class="order-md-last">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#edit{{ $user->id }}">Change
                                                        Password</button>
                                                </li>
                                                <li> 
                                                    <em class="text-soft text-date fs-12px">Last
                                                        changed: <span>Oct2,
                                                            2019</span></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                 <div class="card-inner px-0">
                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                        <div class="nk-block-text">
                                            <h6>2 Factor Auth &nbsp; <span class="badge badge-success ml-0">Enabled</span>
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
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div><!-- .card-inner -->

            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    <div class="modal fade" id="edit{{ $user->id }}" tabindex="-{{ $user->id }}" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">   
                        Change Password
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-student">
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Current Password</label>
                                <div class="form-control-wrap">
                                    <input type="password" name="current_password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Password</label>
                                <div class="form-control-wrap">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Confirm Password</label>
                                <div class="form-control-wrap">
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button"
                    onclick="addFormData(event,'post','{{ url('trainer/change-password/' . $user->id) }}','{{ url('trainer/account-settings') }}','edit-student')"
                    class="btn btn-primary">Save
                    changes</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
@endsection
