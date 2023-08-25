@extends('parent.layouts.master')
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
                    <div class="nk-data data-list data-list-s2">
                        <div class="data-head">
                            <h6 class="overline-title">Basics</h6>
                        </div>
                        <div class="data-item" data-toggle="modal"
                            data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Full Name</span>
                                <span class="data-value">Abu Bin Ishtiyak</span>
                            </div>
                            <div class="data-col data-col-end"><span
                                    class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal"
                            data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Display Name</span>
                                <span class="data-value">Ishtiyak</span>
                            </div>
                            <div class="data-col data-col-end"><span
                                    class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Email</span>
                                <span class="data-value">info@softnio.com</span>
                            </div>
                            <div class="data-col data-col-end"><span
                                    class="data-more disable"><em
                                        class="icon ni ni-lock-alt"></em></span></div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal"
                            data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Phone Number</span>
                                <span class="data-value text-soft">Not add yet</span>
                            </div>
                            <div class="data-col data-col-end"><span
                                    class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal"
                            data-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Date of Birth</span>
                                <span class="data-value">29 Feb, 1986</span>
                            </div>
                            <div class="data-col data-col-end"><span
                                    class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div><!-- data-item -->
                        <div class="data-item" data-toggle="modal"
                            data-target="#profile-edit" data-tab-target="#address">
                            <div class="data-col">
                                <span class="data-label">Address</span>
                                <span class="data-value">2337 Kildeer
                                    Drive,<br>Kentucky, Canada</span>
                            </div>
                            <div class="data-col data-col-end"><span
                                    class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span>
                            </div>
                        </div><!-- data-item -->
                    </div><!-- data-list -->
                    <div class="nk-data data-list data-list-s2">

                    </div><!-- data-list -->
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
                                data-target="userAside"><em
                                    class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card">
                        <div class="card-inner-group">
                            <div class="card-inner px-0">
                                <div
                                    class="between-center flex-wrap flex-md-nowrap g-3">
                                    <div class="nk-block-text">
                                        <h6>Save my Activity Logs</h6>
                                        <p>You can save your all activity logs including
                                            unusual activity detected.</p>
                                    </div>
                                    <div class="nk-block-actions">
                                        <ul class="align-center gx-3">
                                            <li class="order-md-last">
                                                <div
                                                    class="custom-control custom-switch mr-n2">
                                                    <input type="checkbox"
                                                        class="custom-control-input"
                                                        checked="" id="activity-log">
                                                    <label class="custom-control-label"
                                                        for="activity-log"></label>
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
                                        <ul
                                            class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                            <li class="order-md-last">
                                                <a href="#"
                                                    class="btn btn-primary">Change
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
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->

            </div><!-- .card-inner -->

        </div><!-- .card -->

        <!-- Payment Information -->
        <div class="card card-bordered">
            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><em
                            class="icon ni ni-lock-alt-fill"></em><span>Payment</span></a>
                </li>
            </ul><!-- .nav-tabs -->
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Payment Information</h4>
                            <div class="nk-block-des">
                                <p>Save a credit card for faster checkout. Your billing
                                    information will be securely processed.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                data-target="userAside"><em
                                    class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card">
                        <div class="card-inner-group">
                            <div class="card-inner px-0">
                                <div class="row">

                                    <div class="col-6">

                                        <form action="parents/student-grading.html">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="full-name">Card Number</label>
                                                <div class="form-control-wrap">
                                                    <input type="text"
                                                        class="form-control"
                                                        id="full-name"
                                                        placeholder="0000 0000 0000 0000">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="email-address">Full
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text"
                                                        class="form-control"
                                                        id="email-address">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="phone-no">Expiration</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text"
                                                                class="form-control"
                                                                id="phone-no"
                                                                placeholder="MM/YY">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="phone-no">CVC/CVV</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text"
                                                                class="form-control"
                                                                id="phone-no"
                                                                placeholder="123">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="btn btn-lg btn-primary">Save
                                                            Informations</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->

            </div><!-- .card-inner -->

        </div><!-- .card -->
        <!-- Payment Information -->

    </div><!-- .nk-block -->
</div>
@endsection
