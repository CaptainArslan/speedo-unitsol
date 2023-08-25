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
                            <h4 class="nk-block-title">Edit Student</h4>
                            <div class="nk-block-des">

                            </div>
                        </div><!-- .nk-block-head-content -->

                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Edit Student</h5>
                                    <div class="nk-block-des">
                                        <p>All fields are requried.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <form id="edit-trainer">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="name"
                                                        value="{{ $student->name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Nick
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="nick_name"
                                                        value="{{ $student->nick_name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Date Of
                                                    Birth</label>
                                                <div class="form-control-wrap">
                                                    <input type="date" name="dob" value="{{ $student->dob }}"
                                                        class="form-control" id="full-name" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">School</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="school" value="{{ $student->school }}"
                                                        class="form-control" id="full-name" placeholder="School">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                                                        {{ $country->flag . ' ' . $country->dial_code }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control"
                                                            value="{{ $student->contact_no }}" id="contact_no"
                                                            name="contact_no" placeholder="Emergency No">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Medical
                                                    Info</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="medical_information"
                                                        value="{{ $student->medical_information }}" class="form-control"
                                                        id="full-name" placeholder="Medical Info">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Relation</label>
                                                <div class="form-control-wrap">
                                                    <select name="relation" class="select form-control" id="relation">
                                                        <option value="">select relation</option>
                                                        <option value="Father"
                                                            @if ($student->relation == 'Father') selected @endif>Father
                                                        </option>
                                                        <option value="Mother"
                                                            @if ($student->relation == 'Mother') selected @endif>Mother
                                                        </option>
                                                        <option value="Legal Guardian"
                                                            @if ($student->relation == 'Legal Guardian') selected @endif>
                                                            Legal Guardian</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Gender</label>
                                                <div class="form-control-wrap">
                                                    <select name="gender" class="select form-control" id="">
                                                        <option value="">select gender</option>
                                                        <option value="Male"
                                                            @if ($student->gender == 'Male') selected @endif>Male
                                                        </option>
                                                        <option value="Female"
                                                            @if ($student->gender == 'Female') selected @endif>Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('admin/students/' . $student->id) }}','{{ url('admin/students') }}','edit-trainer')"
                                                class="btn btn-primary">
                                                <em class="icon ni ni-plus"></em><span>Update</span></button>
                                            <button type="button"
                                                onclick="window.location='{{ url('admin/students/') }}'"
                                                class="btn btn-warning"><em
                                                    class="icon ni ni-cross"></em><span>Cancel</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- .nk-block -->
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@stop
