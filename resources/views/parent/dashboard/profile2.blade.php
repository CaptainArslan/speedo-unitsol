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
                                <li class="us-nav-li active">
                                    <a href="{{ url('parent/profile') }}" style="color:#ff0000;">Personal</a>
                                </li>
                                <li class="us-nav-li">
                                    <a href="{{ url('parent/security') }}" style="color:#1e1e1e6b;">Security</a>

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
                            <form id="add-detail">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name"
                                                style="font-size: 18px;font-weight: 500;">
                                                Personal Information
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name"
                                                style="color: #8091a7; color: #8091a7; font-weight: 300;">Basic info, like
                                                your name, email, contact number, address, and emirates id.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row us-row-margin">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label" for="cf-full-name">First Name <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="text" name="first_name" value="{{ $user->first_name }}"
                                                class="form-control" id="cf-full-name">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label" for="cf-full-name">Middle Name <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="text" name="middle_name" value="{{ $user->middle_name }}"
                                                class="form-control" id="cf-full-name">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label" for="cf-full-name">Last Name <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="text" value="{{ $user->last_name }}" name="last_name"
                                                class="form-control" id="cf-full-name">
                                        </div>
                                    </div>

                                </div>

                                <div class="row us-row-margin">

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label" for="cf-email-address">Email address <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                class="form-control" id="cf-email-address">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label" for="cf-phone-no">Phone No <span
                                                    style="color:#ff0000;">*</span></label>
                                            <div class="row">
                                                <div class="col-4">
                                                        <select style="padding: 4px 0px; !important" id="country_code"
                                                            name="country_code" class="form-control">
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->dial_code }}"
                                                                    @if ($user->country_code == $country->dial_code) selected  @endif>
                                                                    {{ $country->flag . ' ' . $country->dial_code }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" name="contact_number"
                                                        value="{{ $user->contact_number }}" class="form-control">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label class="form-label" for="cf-phone-no">Date of Birth<span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="date" name="dob" value="{{ $user->dob }}"
                                                class="form-control" id="cf-phone-no">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label class="form-label" for="cf-phone-no">Gender<span
                                                    style="color:#ff0000;">*</span></label>
                                            <select name="gender" class="select form-control" id="">
                                                <option value="">select gender</option>
                                                <option value="Male" @if ($user->gender == 'Male') selected @endif>
                                                    Male
                                                </option>
                                                <option value="Female" @if ($user->gender == 'Female') selected @endif>
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row us-row-margin">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label" for="cf-full-name">Address <span
                                                    style="color:#ff0000;">*</span></label>
                                            <textarea name="address" class="form-control" id="" cols="10" rows="4">{{ $user->address }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row us-row-margin">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('parent/profile-update/' . $user->id) }}','{{ url('parent/students') }}','add-detail')"
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
