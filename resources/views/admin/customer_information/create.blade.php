@extends('admin.layouts.master')
@section('style')
<title>{{ $title }} | Swimming Pool Management System</title>
@stop
@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Create Customer</h4>
                        <div class="nk-block-des">
                            <p>You can edit customer as you want.</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="nk-block-head">
                            <div class="nk-block">
                                <form id="add-detail">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name" style="font-size: 18px;font-weight: 500;">
                                                    Personal Information
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name" style="color: #8091a7; color: #8091a7; font-weight: 300;">Basic info, like
                                                    your name, email, contact number, address, and emirates id.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row us-row-margin">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">First Name <span style="color:#ff0000;">*</span></label>
                                                <input type="text" name="first_name" value="" class="form-control us-height" id="cf-full-name">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">Middle Name</label>
                                                <input type="text" name="middle_name" value="" class="form-control us-height" id="cf-full-name">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">Last Name <span style="color:#ff0000;">*</span></label>
                                                <input type="text" value="" name="last_name" class="form-control us-height" id="cf-full-name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row us-row-margin">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-email-address">Email address <span style="color:#ff0000;">*</span></label>
                                                <input type="email" name="email" value="" class="form-control us-height" id="cf-email-address">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Phone No <span style="color:#ff0000;">*</span></label>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <select style="padding: 4px 0px; !important" id="country_code" name="country_code" class="select2 form-control us-height">
                                                            @foreach ($countries as $country)
                                                            <option value="{{ $country->dial_code }}" @if ($user->country_code == $country->dial_code) selected @endif>
                                                                {{ $country->flag . ' ' . $country->dial_code }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="number" name="contact_number" value="" class="form-control us-height">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Date of Birth<span style="color:#ff0000;">*</span></label>
                                                <input type="date" name="dob" value="" class="form-control us-height" id="cf-phone-no">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Gender<span style="color:#ff0000;">*</span></label>
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
                                                <label class="form-label us-label" for="cf-phone-no">Emirates<span style="color:#ff0000;">*</span></label>
                                                <select name="emirate_id" onchange="getArea(event,'{{ url('admin/get_area') }}')" class="select2 form-control us-height" id="">
                                                    <option value="">select emirate</option>
                                                    @foreach ($emirates as $emirate)
                                                    <option value="{{ $emirate->id }}" @if ($emirate->id == $user->emirate_id) selected @endif>
                                                        {{ $emirate->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Areas<span style="color:#ff0000;">*</span></label>
                                                <select name="area_id" class="select2 form-control us-height" id="addArea">
                                                    @if ($areas->isEmpty())
                                                    <option value="">first select emirate</option>
                                                    @else
                                                    <option value=""> select area</option>
                                                    @foreach ($areas as $area)
                                                    <option value="{{ $area->id }}" @if ($area->id == $user->area_id) selected @endif>
                                                        {{ $area->name }}
                                                    </option>
                                                    @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Relation<span style="color:#ff0000;">*</span></label>
                                                <select name="relation" class="select2 form-control us-height" id="">
                                                    <option value="">select relation</option>
                                                    <option value="I am the Swimmer" @if ($user->relation == 'I am the Swimmer') selected @endif>
                                                        I am the Swimmer
                                                    </option>
                                                    <option value="I am the Father" @if ($user->relation == 'I am the Father') selected @endif>
                                                        I am the Father
                                                    </option>
                                                    <option value="I am the Mother" @if ($user->relation == 'I am the Mother') selected @endif>
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
                                                <input name="street_name" value="{{ $user->street_name }}" class="form-control us-height">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">Building Name/No </label>
                                                <input name="building_name" value="{{ $user->building_name }}" class="form-control us-height">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row us-row-margin">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">Floor/Apartment or
                                                    Villa No </label>
                                                <input name="villa_no" value="" class="form-control us-height">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">Nearest Landmark </label>
                                                <input name="nearest_landmark" value="" class="form-control us-height">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">Password</label>
                                                <input type="password" name="password" value="" class="form-control us-height" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row us-row-margin mt-4">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <button type="button" onclick="addFormData(event,'post','{{ url('admin/customer-informations/store') }}','{{ url('admin/customer-informations/') }}','add-detail')" class="btn btn-lg btn-primary" style="background-color: #0074fe;border: none;">Create</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- .card-preview -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@stop