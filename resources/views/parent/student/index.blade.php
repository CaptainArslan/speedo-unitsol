@extends('parent.layouts.master')
@section('style')
<style>
    @media only screen and (max-width: 833px) {
        .edit-swim {
            width: 120px !important;
            color: red;
        }

        .proceed-btn {
            font-size: 12px !important;
        }
    }
</style>
@endsection
@section('content')
<div class="us-new-container">
    <div class="nk-content-inner">
        <!--<div class="nk-aside" style="position: fixed;height: 100% !important;margin-top: 36px;width: 19rem;">-->
        <div class="nk-aside">
            <div class="nk-sidebar-menu" data-simplebar="init" style="background-color: #f3f3f3;border: 1px solid #dbdfea !important;border-radius: 4px;height: 100%;">
                <div class="simplebar-wrapper" style="margin: 0px 0px -40px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;padding: 22px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px 0px 40px;">
                                    <!-- Menu -->
                                    <ul class="nk-menu">
                                        <li class="nk-menu-heading">
                                            <h6 class="overline-title">Swimmers</h6>
                                        </li>

                                        @foreach ($students as $key => $student)
                                        <li class="nk-menu-item selected-student w-100 d-inline-block">
                                            <a href="#" id="" class="nk-menu-link w-100 {{ $key == 0 ? 'active' : '' }}" student_id="{{ $student->id }}" onclick="studentDetail(event,'{{ url('parent/student-detail/' . $student->id) }}')" data-original-title="" title="">
                                                <span class="nk-menu-text" style="color:#ff0000">{{ $student->name .' '.$student->last_name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                        <li class="nk-menu-item selected-student w-100 d-inline-block">
                                            <a href="#" id="" class="nk-menu-link w-100" onclick="show(event)" style="background: #3097FF;text-align: center;border-radius: 5px;color: #fff;">
                                                <span class="nk-menu-text" style="color:#ffffff">Add Student</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 650px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                </div>
            </div><!-- .nk-sidebar-menu -->
            <div class="nk-aside-close">
                <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
            </div><!-- .nk-aside-close -->
        </div>
        <div class="nk-content-body">


            <div class="nk-content-wrap">
                <div id="student-detail">
                    @foreach ($students->take(1) as $student)
                    <div class="nk-block-head">

                        <h3 class="text-center" style="text-align: left !important;color: #ff0000;">
                            {{ $student->name .' '.$student?->last_name }}
                        </h3>
                        <div class="card border mb-2 " style="background-color: #f3f3f3;">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                {{-- <label class="form-label" for="full-name"
                                                            style="color: #8091a7;">{{ $student->nick_name != null ? $student->nick_name : 'Nick Name not set' }}</label> --}}
                                                @if (!$student->image)
                                                <img style="width: 120px;height:120px;" src="{{ asset('parent-assets/images/avatar/avt.jpeg') }}" alt="">
                                                @else
                                                <img style="width: 120px;height:120px;" src="{{ $image_url . '/' . $student->image }}" alt="">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <h6>Swim Code</h6></br>
                                                <h6 style="color: #8091a7;">{{$student?->swim_code}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <h6>Date Of Birth</h6></br>
                                                <h6 style="color: #8091a7;">{{ date('M d, Y', strtotime($student->dob)) }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <h6>Age</h6></br>
                                                <strong></strong>
                                                <h6 style="color: #8091a7;">{{ $student->getAge() }}</h6></strong>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <h6>Gender</h6></br>
                                                <h6 style="color: #8091a7;">{{ $student->gender }}</h6>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="form-group">
                                                <h6>Annual Fee</h6>
                                                <h6 style="color: #8091a7;">{{$student->annual_fee != 'Pending' ? $student->annual_fee  : 'AED 190'}}</h6>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="{{ $url . '/' . $student->id . '/edit' }}" class="edit-swim mt-3 btn btn-round btn-outline-light w-130px">
                                                <span>Edit</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <h6>Class Level
                                                    @if($student?->assessmentRequest?->is_approved == false)
                                                    <sup class="text-danger" style="font-size: 63%!important;">Waiting Confirmation</sup>
                                                    @else
                                                    <sup><em class="icon ni ni-check-circle-fill "></em></sup>
                                                    @endif
                                                </h6></br>
                                                {{-- @dd($student->assessmentRequest?->class) --}}
                                                @if (!is_null($student->assessmentRequest?->class))
                                                <h6 style="color: #8091a7;">{{ $student->assessmentRequest?->class?->name }}</h6>
                                                @else
                                                <h6 style="color: #8091a7;">No Level Assign</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <h6>Preferred Location </h6></br>
                                                <h6 style="color: #8091a7;">{{$student?->venue?->name}}</h6>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">

                                                @if (!is_null($student->assessmentRequest) )
                                                <button type="button" @if ($student->assessmentRequest?->status == 'Enroll Now') onclick="window.location.href='{{ url('parent/manage-bookings') }}'" @endif
                                                    class="btn float-right proceed-btn " style="background: #3097FF;text-align: center;border-radius: 5px;color: #fff; ">{{ $student->assessmentRequest?->status == 'Enroll Now' ? 'Proceed to Booking':"Waiting Assessment" }}</button>
                                                @else
                                                <button type="button" onclick="assessmentRequest(event,'{{ url('parent/assessment-requests/' . $student->id) }}')" class="btn  float-right  btn-round " style="background: #3097FF;text-align: center;border-radius: 5px;color: #fff;">Waiting Assessment</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->

                    <div class="card card-preview">
                        <div class="card-head">
                            <h3 class="ml-4  mt-4 nk-block-title page-title">Class Schedules</h3>
                        </div>
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Term Name</th>
                                        <th>Class Name</th>
                                        <th>Venue</th>
                                        <th>Time</th>
                                        <th>Today Class</th>
                                        <th>Lessons remaining</th>
                                        <th>Total Lessons</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach ($student_terms as $item)
                                    <?php
                                    $day = '';
                                    if ($item->checkDate()) {
                                        if ($item->attandanceDays()) {
                                            $day = $item->attandanceDays();
                                        }
                                    }
                                    $lession_takes = App\Models\ClassSession::where('class_id', $item->term_id)
                                        ->where('type', $item->type)
                                        ->count();
                                    // dd($class_session);
                                    ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{!! html_entity_decode($item->bookingName())!!}</td>
                                        <td>{!! html_entity_decode($item?->getSwimmingClassName())!!}</td>
                                        <td>{{ $item?->venueName()}}</td>
                                        <td>{!! html_entity_decode($item->getTime())!!}</td>
                                        <td>{{$day}}</td>
                                        <td>{{(int)$item->no_of_class - $lession_takes}}</td>
                                        <td>{{$item?->no_of_class}}</td>
                                        <td>{{ date('M d,Y', strtotime($item?->getStartDate())) }}</td>
                                        <td>{{ date('M d,Y', strtotime($item?->getEndDate())) }}</td>

                                    </tr>
                                    <?php
                                    $i++;
                                    ?>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-head">
                            <h3 class="ml-4  mt-4 nk-block-title page-title">Attendance</h3>
                        </div>
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Trainer</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($class_sessions as $item)
                                    <?php
                                    $term_attendance = $student_terms
                                        ->where('term_id', $item->class_id)
                                        ->where('type', $item->type)
                                        ->first();
                                    $student_term_active = $student_terms
                                        ->where('student_id', $student->id)
                                        ->where('status', 'on')
                                        ->first();
                                    $attendance = $item?->sessionAttendance?->where('student_id', $student_term_active?->student_id)->first();
                                    $venue_attandance = $term_attendance?->status != 'off' ? "<span class='badge badge-success ml-2 text-white'>" . $item->venueName() . '</span>' : $item->venueName() . ' ' . "<span class='badge badge-warning ml-2 text-white'>Previous Venue</span>";
                                    $i = 1;
                                    ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->term?->name }}</td>
                                        <td>{{ $item->trainer?->first_name . ' ' . $item->trainer?->last_name }}
                                        </td>
                                        <td>{!! html_entity_decode($venue_attandance) !!}</td>

                                        <td>{{ date('M d,Y', strtotime($item->date)) }}</td>
                                        <td>{{ date('l', strtotime($item->date)) }}</td>
                                        <td>{{ date('h:i A', strtotime($item->created_at)) }}</td>
                                        <td><span class="badge badge-pill {{ $attendance?->getClassName() ? $attendance?->getClassName() : 'badge-danger' }}">{{ $attendance?->status ? $attendance?->status : 'Absent' }}</span>
                                            {{ $attendance?->late }}
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    ?>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-head">
                            <h3 class="ml-4  mt-4 nk-block-title page-title">Assessment</h3>
                        </div>
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th></th>
                                        <th>Trainer</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Message</th>
                                        <th></th>
                                        <th></th>
                                        <th>Assessment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($class_assessments as $class_assessment)
                                    <?php
                                    $term_assessment = $student_terms
                                        ->where('term_id', $class_assessment->class_id)
                                        ->where('type', $class_assessment->type)
                                        ->first();
                                    $student_term_active = $student_terms
                                        ->where('student_id', $student->id)
                                        ->where('status', 'on')
                                        ->first();
                                    $assessment = $class_assessment?->assessmentStudent?->where('student_id', $student_term_active?->student_id)->first();
                                    $venue_grading = $term_assessment?->status != 'off' ? "<span class='badge badge-success ml-2 text-white'>" . $item->venueName() . '</span>' : $item->venueName() . ' ' . "<span class='badge badge-warning ml-2 text-white'>Previous Venue</span>";
                                    $i = 1;
                                    ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $class_assessment?->bookingName() }}</td>
                                        <td></td>
                                        <td>{{ $class_assessment->trainer?->first_name . ' ' . $class_assessment->trainer?->last_name }}
                                        </td>
                                        <td>{!! html_entity_decode($venue_grading) !!}</td>
                                        <td>{{ date('M d,Y', strtotime($class_assessment->date)) }}</td>
                                        <td>{{ date('l', strtotime($class_assessment->date)) }}</td>
                                        <td>{{ date('h:i A', strtotime($class_assessment->created_at)) }}</td>

                                        <td> {{ $assessment?->message }}</td>
                                        <td></td>
                                        <td></td>
                                        <td> {!! html_entity_decode($assessment?->studentAssessment()) !!}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    ?>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div><!-- .card-preview -->
                    <div class="card card-preview mb-4">
                        <div class="card-head">
                            <h3 class="ml-4  mt-4 nk-block-title page-title">Trainer Comment</h3>
                        </div>
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Trainer</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Grade</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($class_gradings as $item)
                                    <?php
                                    $term_grading = $student_terms
                                        ->where('term_id', $item->class_id)
                                        ->where('type', $item->type)
                                        ->first();
                                    $student_term_active = $student_terms
                                        ->where('student_id', $student->id)
                                        ->where('status', 'on')
                                        ->first();
                                    $grading = $item?->gradings?->where('student_id', $student_term_active?->student_id)->first();
                                    $venue_grading = $term_grading?->status != 'off' ? "<span class='badge badge-success ml-2 text-white'>" . $item->venueName() . '</span>' : $item->venueName() . ' ' . "<span class='badge badge-warning ml-2 text-white'>Previous Venue</span>";
                                    $i = 1;
                                    ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->term?->name }}</td>
                                        <td>{{ $item->trainer?->first_name . ' ' . $item->trainer?->last_name }}
                                        </td>
                                        <td>{!! html_entity_decode($venue_grading) !!}</td>
                                        <td>{{ date('M d,Y', strtotime($item->date)) }}</td>
                                        <td>{{ date('l', strtotime($item->date)) }}</td>
                                        <td>{{ date('h:i A', strtotime($item->created_at)) }}</td>
                                        <td><span class="btn {{ $grading?->getGrade() }}">{{ $grading?->status }}</span>
                                        </td>
                                        <td> {{ $grading?->remarks }}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    ?>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div><!-- .card-preview -->
                    @endforeach
                </div>
            </div>
            <div id="popup">
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('parent-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
<script>
    $('#studentData').on('change', function(e) {
        if (e.target.checked == true) {

            const user = @json($user)
            // console.log(user.first_name)
            $('#full-name').val(user.first_name + ' ' + user.last_name);
            $('#dob').val(user.dob);
            // $("input[type=date]").val(user.dob );
            $('#email').val(user.email);
            $('#contact_no').val(user.contact_number);
        } else {
            $('#full-name').val('');
            $('#dob').val('');
            // $("input[type=date]").val(user.dob );
            $('#email').val('');
            $('#contact_no').val('');
        }
    });
    const total = @json($total);
    let urlParam = new URLSearchParams(window.location.search);
    let query = urlParam.get('q');
    if (total == 0) {
        $('#addNewStudent').modal('show');
    }
    if (query) {
        $('#addNewStudent').modal('show');
    }

    function show(e) {
        $('#addNewStudent').modal('show');
    }

    function hidePopup(url) {
        console.log(url)
        $(".welcome-container-bg").hide();
        setTimeout(function() {
            if (total == 0) {
                window.location = '{{ url('
                parent / manage - bookings ') }}';
            } else {

                window.location = '{{ url('
                parent / students ') }}';
            }
        });
    }
</script>
@stop