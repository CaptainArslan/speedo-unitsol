<div class="us-footer-student" style="display: none">
    <div style="width: 100%;text-align: center;font-weight: 600;">
        <div class="">

            <div class="us-inner-add-student" data-dismiss="modal" data-toggle="modal" data-target="#addNewStudent">
                Add New Student
            </div>
        </div>
    </div>
</div>

<div class="us-footer" style="width: 100% !important;">
    <div style="width: 100%;float: left;color: #ffffff !important;">
        <div class="">
            <div class="us-inner-data"> <span style="font-weight: 600;">&copy; 2022 Speedo Swim Squad. </span>
                <!--Desinged & Developed by <a href="https://unitxsol.com/" target="_blank">UnitSol</a>-->
            </div>
        </div>
    </div>
</div>
<div class="modal " id="addNewStudent">
    <div class="modal-dialog" role="document">
        <div class="modal-content us-model-content">
            <div class="modal-body modal-body-lg">
                <div class="nk-modal py-4">
                    <h6>Add New Student</h6>
                    <form id="add-student">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <br>
                                    <?php
                                    $student = App\Models\Student::where('register_as_student_id', auth()->user()->id)->first();
                                    $classes = App\Models\SwimmingClass::all();
                                    $venues = App\Models\Venue::all();
                                    ?>
                                    @if (is_null($student))
                                        <p class="float-left mr-2">I am the Student : <input type="checkbox"
                                                id="studentData" name="register_as_student_id"></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row us-row-margin">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label us-label" for="cf-full-name">First Name <span
                                            style="color:#ff0000;">*</span></label>
                                    <input type="text" name="first_name" class="form-control us-height"
                                        id="first_name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label us-label" for="cf-full-name">Last Name<span
                                            style="color:#ff0000;">*</span></label>
                                    <input type="text" name="last_name" class="form-control us-height" id="last_name"
                                        placeholder="Name">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label us-label" for="cf-phone-no">Emergency No <span
                                            style="color:#ff0000;">*</span></label>
                                    <div class="row">
                                        <div class="col-3 p-0">
                                            <div class="form-group">
                                                @include('parent.student.partial.country_code')
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <input type="number" class="form-control us-height" id="contact_no"
                                                name="contact_no" value="{{auth()->user()->contact_number}}" placeholder="Emergency No">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label us-label" for="cf-full-name">Preferred Location</label>
                                    <select name="location_id" class="select form-control us-height" id="location_id">
                                        <option value="">select locations</option>
                                        @foreach ($venues as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row us-row-margin">
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label us-label" for="cf-full-name">I Know my level <span
                                            style="color:#ff0000;">*</span></label>
                                    <select name="level_id" class="select form-control us-height" id="level_id">
                                        <option value="">select level</option>
                                        <option value="need">Need Assessment</option>
                                        @foreach ($classes as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="float-left mr-2 mt-4 text-blue">
                                        <input type="checkbox"name="term_condition">
                                        Agree Term & Conditions
                                    </p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label us-label" for="cf-full-name">Date of Birth <span
                                            style="color:#ff0000;">*</span></label>
                                    <input type="date" name="dob" class="form-control us-height" id="dob"
                                        placeholder="Name">
                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label us-label" for="cf-email-address">School</label>
                                    <input type="text" name="school" class="form-control us-height"
                                        id="school" placeholder="School">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">

                                    <label class="form-label us-label" for="cf-phone-no">Medical Info </label>
                                    <input type="checkbox" id="medi_info">
                                    <input type="text" name="medical_information" style="display: none"
                                        class="form-control us-height" id="medical" placeholder="Medical Info">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label us-label" for="cf-phone-no">Gender<span
                                            style="color:#ff0000;">*</span></label>
                                    <select name="gender" class="select form-control us-height" id="gender">
                                        <option value="">select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label us-label" style="font-size:15px" for="cf-phone-no">Help
                                        us recognize you - Photo</label>
                                    <input type="file" class="dropify form-control" data-height="100"
                                        name="image" required>
                                </div>
                            </div>
                        </div>

                        <div class="row us-row-margin">
                            <div class="col-3">
                                <div class="form-group">
                                    <button type="submit"
                                        onclick="addFormDataParent(event,'post','{{ url('parent/students') }}','{{ url('parent/students') }}','add-student')"
                                        class="btn btn-lg btn-primary"
                                        style="background-color: #0074fe;border: none;">Finish</button>
                                    <button type="submit"
                                        onclick="addFormDataParent(event,'post','{{ url('parent/students?q=next') }}','{{ url('parent/students') }}','add-student')"
                                        class="btn btn-lg btn-primary"
                                        style="background-color: #0074fe;border: none;">Add Another</button>

                                    {{-- <a href="{{ $url }}" class="btn btn-lg btn-warning">Cancel</a> --}}
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div><!-- .modal-body -->
        </div>
    </div>
</div>
