@extends('parent.layouts.master')
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head">
            <div class="card border mb-2 ">
                <div class="card-body">
                    <p class="float-left">Add me as Student :  <input type="checkbox" id="studentData" name="student" ></p>
                    <h3 class="text-center">Add Student</h3>

                    <form id="add-student">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name"  class="form-control" id="full-name"
                                            placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Date Of
                                        Birth</label>
                                    <div class="form-control-wrap">
                                        <input type="date" name="dob" class="form-control" id="dob"
                                            placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">School</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="school" class="form-control" id="school"
                                            placeholder="School">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Medical
                                        Info</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="medical_information" class="form-control" id="medical"
                                            placeholder="Medical Info">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Emergency
                                        No</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="contact_no" name="contact_no"
                                            placeholder="Contact No">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Gender</label>
                                    <div class="form-control-wrap">
                                        <select name="gender" class="select form-control" id="">
                                            <option value="">select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit"
                                        onclick="addFormData(event,'post','{{ url('parent/students') }}','{{ url('parent/students') }}','add-student')"
                                        class="btn btn-lg btn-primary">Save
                                        Informations</button>
                                    <a href="{{ $url }}" class="btn btn-lg btn-warning">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- .nk-block-head -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
    <script>
        $('#studentData').on('change',function(e){
            if(e.target.checked == true){
               
                const user=@json($user)
                // console.log(user.first_name)
                $('#full-name').val(user.first_name +' '+user.last_name );
                $('#dob').val(user.dob );
                // $("input[type=date]").val(user.dob );
                $('#email').val(user.email );
                $('#contact_no').val(user.contact_number );
            }else{
                $('#full-name').val('');
                $('#dob').val('');
                // $("input[type=date]").val(user.dob );
                $('#email').val('');
                $('#contact_no').val('');
            }
        })

    </script>
@stop
