@extends('admin.layouts.master')

@section('style')
<title>{{ $title }} | Swimming Pool Management System</title>
@stop
@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Student Profile</h3>
                        <div class="nk-block-des text-soft">
                            <!-- <p>An example page for product details</p> -->
                        </div>
                    </div>
                    <div class="nk-block-head-content">
                        <a href="html/product-list.html" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        <a href="html/product-list.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="row pb-5">
                            <div class="col-lg-3">
                                <div class="product-gallery mr-xl-1 mr-xxl-5">
                                    <div class="slider-item rounded">
                                        <img src="{{ $image_url . '/' . $student?->image }}" class="w-100" alt="">
                                    </div>

                                </div><!-- .product-gallery -->
                            </div><!-- .col -->
                            <div class="col-lg-9">
                                <div class="product-info mt-1 mr-xxl-5">

                                    <div class="col-3 float-right" id="showCredit" style="display: none">
                                        <form id="credit">
                                            <input type="number" name="credit" value="{{ $student?->credit }}" class="form-control mb-2">
                                        </form>
                                        <button type="button" onclick="addStudentCredit(event,'{{ url('admin/add_student_credit/' . $student?->id) }}','credit')" class="btn btn-sm btn-primary float-right">Add Credit</button>
                                    </div>
                                    <div class="col-3 mt-1 float-right" id="hideCredit">
                                        <h6>Credit: {{ $student?->credit }} <a href='#' id="addCredit" class='toggle float-right' data-target='editClass'><em class='icon ni bold ni-plus'></em></a></h6>

                                    </div>
                                    <div class="col-3 float-right ">
                                        <div class="form-group">
                                            {{-- <label class="form-label">Status<sup class="text-danger">*</sup></label> --}}
                                            <div class="form-control-wrap">
                                                <select name="status" onchange="changeAssessmentStatus(event,'{{ url('admin/change_assessment_status/' . $student?->id) }}')" class=" form-control" data-search="on">
                                                    <option value="">change status</option>
                                                    <option value='Active' @if ($student?->assessmentRequest?->status == 'Active') selected @endif>Active
                                                    </option>
                                                    <option value='Call back requested' @if ($student?->assessmentRequest?->status == 'Call back requested') selected @endif>Call back
                                                        requested
                                                    </option>
                                                    <option value='Follow up 1' @if ($student?->assessmentRequest?->status == 'Follow up 1') selected @endif>Follow up 1
                                                    </option>
                                                    <option value='Follow up 2' @if ($student?->assessmentRequest?->status == 'Follow up 2') selected @endif>Follow up 2
                                                    </option>
                                                    <option value='Lost' @if ($student?->assessmentRequest?->status == 'Lost') selected @endif>Lost</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="product-title">{{ $student?->name . ' ' . $student?->last_name }}</h2>

                                    <a href="{{ url('admin/customer-informations/' . $student?->user?->id) }}" class="btn btn-success">Parent Info</a>


                                    <div class="product-meta">
                                        <ul class="d-flex g-3 gx-5">
                                            <li>
                                                <div class="fs-12px text-muted">Swim Code</div>
                                                <div class="fs-14px fw-bold text-secondary">{{ $student?->swim_code }}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="fs-12px text-muted">Nick Name</div>
                                                <div class="fs-14px fw-bold text-secondary">{{ $student?->nick_name }}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="fs-12px text-muted">Date of Birth</div>
                                                <div class="fs-14px fw-bold text-secondary">
                                                    {{ date('M m,Y', strtotime($student?->dob)) }}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="fs-12px text-muted">Age</div>
                                                <div class="fs-14px fw-bold text-secondary">{{ $student?->getAge() }}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="fs-12px text-muted">Gender</div>
                                                <div class="fs-14px fw-bold text-secondary">{{ $student?->gender }}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="fs-12px text-muted">School</div>
                                                <div class="fs-14px fw-bold text-secondary">{{ $student?->school }}
                                                </div>
                                            </li>

                                            <li>
                                                <div class="fs-12px text-muted">Status</div>
                                                <div class="fs-14px fw-bold text-secondary">
                                                    @if ($student?->assessmentRequest)
                                                    {!! html_entity_decode($student?->assessmentRequest?->getStatus()) !!}
                                                    @else
                                                    <span class='badge badge-danger ml-2 text-white'>Free
                                                        Assessment</span>
                                                    @endif
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="product-meta">
                                        <form id="edit-class">
                                            <div class="row g-3">

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Assign Class<sup class="text-danger">*</sup></label>
                                                        <div class="form-control-wrap">
                                                            <select name="class_id" required class="form-select2 form-control" data-search="on">
                                                                <option value="">- Assign Class -</option>
                                                                @foreach ($classes as $item)
                                                                <option value="{{ $item->id }}" @if ($assesment_request?->swimming_class_id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-2">
                                                        <div class="form-group">
                                                            <label class="form-label" for="product-title">Discount<sup
                                                                    class="text-danger">*</sup></label>
                                                            <div class="form-control-wrap">
                                                                <input type="number" name="discount" required
                                                                    class="form-control"
                                                                    value="{{ $assesment_request->discount }}"
                                                id="product-title">
                                            </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label" for="product-title">Discount Till
                                            Date<sup class="text-danger">*</sup></label>
                                        <div class="form-control-wrap">
                                            <input type="date" name="till_date" required class="form-control" value="{{ $assesment_request->till_date }}" id="product-title">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label" for="product-title"></label>
                                        <div class="form-control-wrap">
                                            <button type="button" onclick="addFormData(event,'post','{{ url('admin/assessment-requests/' . $assesment_request?->id) }}','{{ url('admin/students/' . $student?->id) }}','edit-class')" class="btn btn-primary"><em class="icon ni ni-edit"></em><span>Confirm</span></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div><!-- .product-info -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div>
    </div>
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
                        <td>{!! html_entity_decode($item->bookingName()) !!}</td>
                        <td>{!! html_entity_decode($item->getSwimmingClassName()) !!}</td>
                        <td>{{ $item->venueName() }}</td>
                        <td>{!! html_entity_decode($item->getTime()) !!}</td>
                        <td>{{ $day }}</td>
                        <td>{{ $item->getNoOfClasses() != '' ? $item->getNoOfClasses() - $lession_takes : 0 }}
                        </td>
                        <td>{{ $item->getNoOfClasses() }}</td>
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
                        <td>{{ $item->term->name }}</td>
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
                        <td>{{ $item->term->name }}</td>
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
</div><!-- .nk-block -->


</div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
<script>
    $('#addCredit').on('click', function(e) {
        e.preventDefault();
        // $('#credit').hide();
        $('#showCredit').show();
        $('#hideCredit').hide();
    });
</script>

@stop