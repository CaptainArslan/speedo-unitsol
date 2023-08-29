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
                                            <label class="form-label us-label" for="cf-full-name">First Name <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="text" name="first_name" value="{{ $user->first_name }}"
                                                class="form-control us-height" id="cf-full-name">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Middle Name</label>
                                            <input type="text" name="middle_name" value="{{ $user->middle_name }}"
                                                class="form-control us-height" id="cf-full-name">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Last Name <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="text" value="{{ $user->last_name }}" name="last_name"
                                                class="form-control us-height" id="cf-full-name">
                                        </div>
                                    </div>

                                </div>

                                <div class="row us-row-margin">

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-email-address">Email address <span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                class="form-control us-height" id="cf-email-address">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-phone-no">Phone No <span
                                                    style="color:#ff0000;">*</span></label>
                                            <div class="row">
                                                <div class="col-5">
                                                    <select style="padding: 4px 0px; !important" id="country_code"
                                                        name="country_code" class="select2 form-control us-height">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->dial_code }}"
                                                                @if ($user->country_code == $country->dial_code) selected @endif>
                                                                {{ $country->flag . ' ' . $country->dial_code }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-7">
                                                    <input type="number" name="contact_number"
                                                        value="{{ $user->contact_number }}" class="form-control us-height">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-phone-no">Date of Birth<span
                                                    style="color:#ff0000;">*</span></label>
                                            <input type="date" name="dob" value="{{ $user->dob }}"
                                                class="form-control us-height" id="cf-phone-no">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-phone-no">Gender<span
                                                    style="color:#ff0000;">*</span></label>
                                            <select name="gender" class="select2 form-control us-height" id="">
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
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-phone-no">Emirates<span
                                                    style="color:#ff0000;">*</span></label>
                                            <select name="emirate_id"
                                                onchange="getArea(event,'{{ url('parent/get_area') }}')"
                                                class="select2 form-control us-height" id="">
                                                <option value="">select emirate</option>
                                                @foreach ($emirates as $emirate)
                                                    <option value="{{ $emirate->id }}"
                                                        @if ($emirate->id == $user->emirate_id) selected @endif>
                                                        {{ $emirate->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-phone-no">Areas<span
                                                    style="color:#ff0000;">*</span></label>
                                            <select name="area_id" class="select2 form-control us-height" id="addArea">
                                                @if ($areas->isEmpty())
                                                    <option value="">first select emirate</option>
                                                @else
                                                    <option value=""> select area</option>
                                                    @foreach ($areas as $area)
                                                        <option value="{{ $area->id }}"
                                                            @if ($area->id == $user->area_id) selected @endif>
                                                            {{ $area->name }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-phone-no">Relation<span
                                                    style="color:#ff0000;">*</span></label>
                                            <select name="relation" class="select2 form-control us-height"
                                                id="">
                                                <option value="">select relation</option>
                                                <option value="I am the Swimmer"
                                                    @if ($user->relation == 'I am the Swimmer') selected @endif>
                                                    I am the Swimmer
                                                </option>
                                                <option value="I am the Father"
                                                    @if ($user->relation == 'I am the Father') selected @endif>
                                                    I am the Father
                                                </option>
                                                <option value="I am the Mother"
                                                    @if ($user->relation == 'I am the Mother') selected @endif>
                                                    I am the Mother
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row us-row-margin">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Street Name </label>
                                            <input name="street_name" value="{{ $user->street_name }}"
                                                class="form-control us-height">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Building Name/No </label>
                                            <input name="building_name" value="{{ $user->building_name }}"
                                                class="form-control us-height">
                                        </div>
                                    </div>
                                </div>
                                <div class="row us-row-margin">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Floor/Apartment or
                                                Villa No </label>
                                            <input name="villa_no" value="{{ $user->villa_no }}"
                                                class="form-control us-height">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label us-label" for="cf-full-name">Nearest Landmark </label>
                                            <input name="nearest_landmark" value="{{ $user->nearest_landmark }}"
                                                class="form-control us-height">
                                        </div>
                                    </div>
                                </div>

                                <div class="row us-row-margin">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <button type="button"
                                                onclick="addFormDataParent(event,'post','{{ url('parent/profile-update/' . $user->id) }}','{{ url('parent/students') }}','add-detail')"
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
        <div id="popup">

        </div>
        @if (request()->q && !$user->first_name | !$user->last_name | !$user->contact_number | !$user->gender | !$user->relation)
            <div class="welcome-container-bg" id="welcome-container-bg">
                <div class="us-welcome-container">
                    <h3 class="us-popup-heading" id="us-popup-heading">Congratulations!</h3>
                    <p class="us-popup-content" id="us-popup-content">
                        {{-- Your have updated your profile Successfully --}}
                        You have successfully created your Speedo Account. Please provide your personal inforamtion as
                        required
                        in the form.
                    </p>
                    <div class="us-cmd-ok">
                        <button type="button" class="us-cmd-ok" onclick="closePopup(event)"
                            style="background-color: #0074fe;border: none;">Okay</button>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('scripts')

    <script>
        // $(document).ready(function() {


        // });
        function hidePopup(url) {
            console.log(url)
            $(".welcome-container-bg").hide();
            setTimeout(function() {
                window.location = '{{ url('parent/students') }}';
            }, 1000);
        }

        function closePopup() {
            $(".welcome-container-bg").hide();
        }
    </script>
@stop
