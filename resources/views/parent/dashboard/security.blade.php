@extends('parent.layouts.master')
@section('content')
    <div class="us-profile-container">

        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head">
                        <h4 class="text-center" style="text-align: left !important;color: #1E1E1E;">Profile Settings</h4>
                        <div class="profile-setup-links" style="background-color: #fff;">
                            <ul class="us-profile-nav">
                                <li class="us-nav-li ">
                                    <a href="{{ url('parent/profile') }}" style="color:#1e1e1e6b;">Personal</a>
                                </li>
                                <li class="us-nav-li active">
                                    <a href="{{ url('parent/security') }}" style="color:#ff0000;">Security</a>

                                </li>
                                <li class="us-nav-li">
                                    <a href="{{ url('parent/payment') }}" style="color:#1e1e1e6b;">Payment</a>

                                </li>
                            </ul>
                        </div>
                        <!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->


                    <div class="">
                        <div class="">
                            <form id="edit-password">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name"
                                                style="font-size: 18px;font-weight: 500;">
                                                Security Settings
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name"
                                                style="color: #8091a7; color: #8091a7; font-weight: 300;">These settings are
                                                here to help you to keep your account secure.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row us-row-margin" style="margin-top: 24px;">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Current Password <span
                                                    style="color:#ff0000;">*</span></label>
                                            {{-- <label class="form-label" for="full-name"
                                                style="color: #8091a7; color: #8091a7; font-weight: 300;">Last password was --}}
                                            changed on March 22, 2022</label>
                                            <input type="password" placeholder="XXXX XXXX XXXX XXXX" name="current_password"
                                                class="form-control us-height">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">New Password <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="password" placeholder="XXXX XXXX XXXX XXXX" name="password"
                                                class="form-control us-height">
                                        </div>
                                    </div>
                                </div>
                                <div class="row us-row-margin">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Confirm Password <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="password" placeholder="XXXX XXXX XXXX XXXX" name="confirm_password"
                                                class="form-control us-height">
                                        </div>
                                    </div>
                                </div>

                                <div class="row us-row-margin">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('parent/change-password/' . $user->id) }}','{{ url('parent/security') }}','edit-password')"
                                                class="btn btn-lg btn-primary"
                                                style="background-color: #0074fe;border: none;">Update</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div><!-- .card-preview -->
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
@stop
