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
                        <h4 class="nk-block-title">Add Student</h4>
                        <div class="nk-block-des">
                            <p>Add new Student.</p>
                        </div>
                    </div><!-- .nk-block-head-content -->

                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <?php
            // $student = App\Models\Student::where('register_as_student_id', auth()->user()->id)->first();
            $classes = App\Models\SwimmingClass::all();
            $venues = App\Models\Venue::all();
            ?>
            <div class="nk-block nk-block-lg">
                <div class="card card-preview">
                    <form id="add-student">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{ request()->id }}">
                                    <div class="row g-3">

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-first-name">First Name <span style="color:#ff0000;">*</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="first_name" class="form-control us-height" id="first_name" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-last-name">Last Name<span style="color:#ff0000;">*</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="last_name" class="form-control us-height" id="last_name" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Emergency No <span style="color:#ff0000;">*</span></label>
                                                <div class="form-control-wrap">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                @include('admin.customer_information.partial.country_code')
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="number" class="form-control us-height" id="contact_no" name="contact_no" value="{{auth()->user()->contact_number}}" placeholder="Emergency No">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">Preferred Location</label>
                                                <div class="form-control-wrap">
                                                    <select name="location_id" class="select form-control us-height" id="location_id">
                                                        <option value="">select locations</option>
                                                        @foreach ($venues as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">I Know my level <span style="color:#ff0000;">*</span></label>
                                                <div class="form-control-wrap">
                                                    <select name="level_id" class="select form-control us-height" id="level_id">
                                                        <option value="">select level</option>
                                                        <option value="need">Need Assessment</option>
                                                        @foreach ($classes as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-full-name">Date of Birth <span style="color:#ff0000;">*</span></label>
                                                <div class="form-control-wrap">
                                                    <input type="date" name="dob" class="form-control us-height" id="dob" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-email-address">School</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="school" class="form-control us-height" id="school" placeholder="School">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Gender<span style="color:#ff0000;">*</span></label>
                                                <div class="form-control-wrap">
                                                    <select name="gender" class="select form-control us-height" id="gender">
                                                        <option value="">select gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Medical Info </label>
                                                <div class="form-control-wrap">
                                                    <input type="checkbox" id="medi_info">
                                                    <input type="text" name="medical_information" style="display: none" class="form-control us-height" id="medical" placeholder="Medical Info">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label us-label" for="cf-phone-no">Medical Info </label>
                                                <div class="form-control-wrap d-flex align-items-center">
                                                    <input type="checkbox" id="medi_info" class="mr-2">
                                                    <input type="text" name="medical_information" style="display: none" class="form-control us-height" id="medical" placeholder="Medical Info">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label us-label" style="font-size:15px" for="cf-phone-no">Help us recognize you - Photo</label>
                                                <div class="form-control-wrap">
                                                    <input type="file" class="dropify form-control" data-height="100" name="image" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <p class="float-left mr-2 mt-4 text-blue">
                                                    <input type="checkbox" name="term_condition">
                                                    Agree Term & Conditions
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <!-- <button type="submit" onclick="addFormDataParent(event,'post','{{ url('parent/students') }}','{{ url('parent/students') }}','add-student')" class="btn btn-lg btn-primary" style="background-color: #0074fe;border: none;">Finish</button> -->
                                                <button type="submit" onclick="addFormData(event,'post','{{ url('admin/customer-informations/student/store') }}','{{ url('admin/customer-informations/') }}/{{ request()->id }}','add-student')" class="btn btn-lg btn-primary" style="background-color: #0074fe;border: none;">Submit</button>

                                                {{-- <a href="{{ $url }}" class="btn btn-lg btn-warning">Cancel</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- .card-preview -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#medi_info').on('change', function(e) {
        if (e.target.checked == true) {
            $('#medical').css('display', 'block');
        } else {
            $('#medical').css('display', 'none');
        }
    });
</script>
@stop