@extends('parent.layouts.master')
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head">
            <h4 class="text-center"
                style="text-align: left !important;color: #1E1E1E;border-bottom: 1px solid #c2c2c2;padding-bottom: 30px;">
                Edit Student</h4>
            <!-- .nk-block-between -->
        </div><!-- .nk-block-head -->

        <div class="nk-block-head" style="width: 80%;">
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label class="form-label" for="full-name" style="font-size: 18px;font-weight: 500;">
                            Edit Student Information
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="full-name"
                            style="color: #8091a7; color: #8091a7; font-weight: 300;">Basic info, like
                            name, contact number, address...</label>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!--<h3 class="text-center">Edit Student</h3>-->

                <form id="add-student">

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">First Name<span
                                        style="color:#ff0000;">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="text" name="first_name" value="{{ $student->name }}"
                                        class="form-control" id="full-name" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Last Name<span
                                        style="color:#ff0000;">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="text" name="last_name" value="{{ $student->last_name }}"
                                        class="form-control" id="full-name" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Date Of
                                    Birth<span style="color:#ff0000;">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="date" name="dob" value="{{ $student->dob }}" class="form-control"
                                        id="full-name" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">School</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="school" value="{{ $student->school }}" class="form-control"
                                        id="full-name" placeholder="School">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-2">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Medical
                                    Info</label>
                                <input type="text" name="medical_information" class="form-control us-height"
                                    value="{{ $student->medical_information }}" id="medical" placeholder="Medical Info">

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="cf-phone-no">Emergency No <span
                                        style="color:#ff0000;">*</span></label>
                                <div class="row">
                                    <div class="col-3 p-0">
                                        {{-- @dd($student->country_code) --}}
                                        <div class="form-group">
                                            <!--<input type="text" readonly name="phone_code" value="+971"-->
                                            <!--    class="form-control" id="cf-phone-no">-->
                                            <select style="padding: 4px 0px; !important" id="country_code"
                                                name="country_code" class="form-control">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->dial_code }}"
                                                        @if ($student->country_code == $country->dial_code) selected @endif>
                                                        {{ $country->flag . ' ' . $country->dial_code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <input type="number" class="form-control" value="{{ $student->contact_no }}"
                                            id="contact_no" name="contact_no" placeholder="Emergency No">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-2">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Relation</label>
                                <div class="form-control-wrap">
                                    <select name="relation" class="select form-control us-height" id="relation">
                                        <option value="">select relation</option>
                                        <option value="Self" @if ($student->relation == 'Self') selected @endif>Self
                                        </option>
                                        <option value="Father" @if ($student->relation == 'Father') selected @endif>Father
                                        </option>
                                        <option value="Mother" @if ($student->relation == 'Mother') selected @endif>Mother
                                        </option>
                                        <option value="Legal Guardian" @if ($student->relation == 'Legal Guardian') selected @endif>
                                            Legal Guardian</option>
                                    </select>

                                </div>
                            </div>
                        </div> --}}
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Gender<span
                                        style="color:#ff0000;">*</span></label>
                                <div class="form-control-wrap">
                                    <select name="gender" class="select form-control" id="">
                                        <option value="">select gender</option>
                                        <option value="Male" @if ($student->gender == 'Male') selected @endif>Male
                                        </option>
                                        <option value="Female" @if ($student->gender == 'Female') selected @endif>Female
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if ($bookings->isEmpty() && $assessment?->is_approved != true)
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Venues</label>
                                    <div class="form-control-wrap">
                                        <select name="location_id" class="select2 form-control" id="">
                                            <option value="">select venue</option>
                                            @foreach ($venues as $venue)
                                                <option value="{{ $venue->id }}"
                                                    @if ($student->venue_id == $venue->id) selected @endif>
                                                    {{ $venue->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mt-3">
                                    <label class="form-label" for="full-name">I Know my level</label>
                                    <div class="form-control-wrap">
                                        <select name="level_id" class="select2 form-control" id="">
                                            <option value="">select level</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}"
                                                    @if ($student->class_id == $class->id) selected @endif>
                                                    {{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label" for="cf-phone-no">Help us recognize you - Photo</label>
                                <input type="file" class="dropify form-control"
                                    data-default-file="{{ $image_url . '/' . $student->image }}" data-height="100"
                                    name="image" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="form-group" style="margin-top: 25px;">
                                <button type="submit"
                                    onclick="addFormData(event,'post','{{ url('parent/students/' . $student->id) }}','{{ url('parent/students') }}','add-student')"
                                    class="btn btn-lg btn-primary">Edit
                                    Informations</button>
                                <a href="{{ $url }}" class="btn btn-lg btn-warning">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div><!-- .nk-block-head -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
@stop
