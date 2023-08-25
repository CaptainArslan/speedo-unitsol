<script src="{{ asset('parent-assets/assets/js/bundle.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/scripts.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>

<div class="nk-block-head">
    <h3 class="text-center" style="text-align: left !important;color: #ff0000;">{{ $student->name .' '.$student->last_name }}</h3>
    <div class="card border mb-2 " style="background-color: #f3f3f3;">
        <div class="card-body">
            <form action="parents/manage-bookings.html">
                <div class="row">
                    <div class="col-2">

                        <div class="form-group">
                            {{-- <label class="form-label" for="full-name"
                                style="color: #8091a7;">{{ $student->nick_name != null ? $student->nick_name : 'Nick Name not set' }}</label> --}}
                            @if (!$student->image)
                                <img style="width: 120px;height:120px;"
                                    src="{{ asset('parent-assets/images/avatar/avt.jpeg') }}"
                                    alt="">
                            @else
                                <img style="width: 120px;height:120px;"
                                    src="{{ $image_url . '/' . $student->image }}"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <h6>Swim Code</h6></br>
                            <h6
                                style="color: #8091a7;">{{$student?->swim_code}}</h6>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <h6>Date Of Birth</h6></br>
                            <h6
                                style="color: #8091a7;">{{ date('M d, Y', strtotime($student->dob)) }}</h6>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <h6>Age</h6></br>
                            <h6
                                style="color: #8091a7;">{{ $student->getAge() }}</h6>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <h6>Gender</h6></br>
                            <h6
                                style="color: #8091a7;">{{ $student->gender }}</h6>
                        </div>
                    </div>
                    
                    <div class="col-2">
                        <div class="form-group">
                            <h6>Annual Fee</h6>
                            <h6 
                                style="color: #8091a7;">{{$student->annual_fee != 'Pending' ? $student->annual_fee  : 'AED 190'}}</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <a href="{{ $url . '/' . $student->id . '/edit' }}"
                            class="edit-swim mt-3 btn btn-round btn-outline-light w-130px">
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
                                <h6 
                                    style="color: #8091a7;">{{ $student->assessmentRequest?->class?->name }}</h6>
                            @else
                                <h6 
                                    style="color: #8091a7;">No Level Assign</h6>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <h6>Preferred Location </h6></br>
                            <h6 
                                style="color: #8091a7;">{{$student?->venue?->name}}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">

                            @if (!is_null($student->assessmentRequest))
                                <button type="button"
                                    @if ($student->assessmentRequest?->status == 'Enroll Now') onclick="window.location.href='{{ url('parent/manage-bookings') }}'" @endif
                                    class="btn  float-right" style="background: #3097FF;text-align: center;border-radius: 5px;color: #fff;">{{ $student->assessmentRequest?->status == 'Enroll Now' ? 'Proceed to Booking':"Waiting Assessment" }}</button>
                            @else
                                <button type="button"
                                    onclick="assessmentRequest(event,'{{ url('parent/assessment-requests/' . $student->id) }}')"
                                    class="btn float-right" style="background: #3097FF;text-align: center;border-radius: 5px;color: #fff;">Waiting Assessment</button>
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
                    <th>venue</th>
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
                    $i=1;
                    ?>
                @foreach ($student_terms as $item)
                    <?php
                    $day='';
                    if($item->checkDate()){
                        if($item->attandanceDays()){
                            $day=$item->attandanceDays();
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
                        <td>{!! html_entity_decode($item->getSwimmingClassName())!!}</td>
                          <td>{{ $item->venueName()}}</td>
                            <td>{!! html_entity_decode($item->getTime())!!}</td>
                            <td>{{$day}}</td>
                            <td>{{(int)$item->no_of_class - $lession_takes}}</td>
                            <td>{{$item?->no_of_class}}</td>
                        <td>{{ date('M d,Y', strtotime($item->getStartDate())) }}</td>
                        <td>{{ date('M d,Y', strtotime($item->getEndDate())) }}</td>
                        
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
                    <th>venue</th>
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
                        <td><span
                                class="badge badge-pill {{ $attendance?->getClassName() ? $attendance?->getClassName() : 'badge-danger' }}">{{ $attendance?->status ? $attendance?->status : 'Absent' }}</span>
                            {{ $attendance?->late }}</td>
                    </tr>
                    <?php
                    $i++;
                    ?>
                @endforeach
            </tbody>

        </table>
    </div>
</div><!-- .card-preview -->

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
                    <th>Trainer</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Message</th>
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
                        <td>{{ $class_assessment->trainer?->first_name . ' ' . $class_assessment->trainer?->last_name }}
                        </td>
                        <td>{!! html_entity_decode($venue_grading) !!}</td>
                        <td>{{ date('M d,Y', strtotime($class_assessment->date)) }}</td>
                        <td>{{ date('l', strtotime($class_assessment->date)) }}</td>
                        <td>{{ date('h:i A', strtotime($class_assessment->created_at)) }}</td>
                        
                        <td> {{ $assessment?->message }}</td>
                        <td> {!!html_entity_decode($assessment?->studentAssessment())!!}</td>
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
