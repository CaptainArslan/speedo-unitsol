@extends('parent.layouts.master')
@section('content')
    <div class="us-profile-container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head nk-block-head-md">
                        <button type="button" onclick="window.location='{{ url('parent/order_details/'.$order_detail->order_id) }}'"
                            class="btn btn-danger float-right"><em class="icon ni ni-arrow"></em><span>Back</span></button>
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title float-left">Student Detail</h3>

                            </div><!-- .nk-block-head-content -->
                            <!-- <div class="nk-block-head-content">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addEventPopup"><em class="icon ni ni-plus"></em><span>Add New Slot</span></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>.nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="nk-block">
                                <div class="card-inner">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Nick
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" disabled name="first_name"
                                                        value="{{ $student?->nick_name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" disabled name="middle_name"
                                                        value="{{ $student?->name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">School</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" disabled name="last_name"
                                                        value="{{ $student?->school }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="regular-price">Relation</label>
                                                <div class="form-control-wrap">
                                                    <input type="email" disabled name="email"
                                                        value="{{ $student?->relation }}" class="form-control"
                                                        id="regular-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Contact</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" disabled name="contact_number"
                                                        value="{{ $student?->contact_no }}" class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Date Of Birth</label>
                                                <div class="form-control-wrap">
                                                    <input type="date" disabled name="dob"
                                                        value="{{ $student?->dob }}" class="form-control" id="sale-price">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>{{--  --}}
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
                                            $attendance = $item?->sessionAttendance?->where('student_id', $student_term_active->student_id)->first();
                                            $venue_attandance = $term_attendance?->status != 'off' ? "<span class='badge badge-success ml-2 text-white'>" . $item->venueName() . '</span>' : $item->venueName() . ' ' . "<span class='badge badge-warning ml-2 text-white'>Previous Venue</span>";
                                            $i = 1;
                                            ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $order_detail->name }}</td>
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
                                            <th>Student</th>
                                            <th>No of Classes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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
                                            $grading = $item?->gradings?->where('student_id', $student_term_active->student_id)->first();
                                            $venue_grading=$term_grading?->status != 'off' ? "<span class='badge badge-success ml-2 text-white'>" . $item?->venueName() . '</span>' : 
                                                $item->venueName() . ' ' . "<span class='badge badge-warning ml-2 text-white'>Previous Venue</span>";
                                            $i = 1;
                                            ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $order_detail->name }}</td>
                                                <td>{{ $item->trainer?->first_name . ' ' . $item->trainer?->last_name }}
                                                </td>
                                                <td>{!! html_entity_decode($venue_grading) !!}</td>
                                                <td>{{ date('M d,Y', strtotime($item->date)) }}</td>
                                                <td>{{ date('l', strtotime($item->date)) }}</td>
                                                <td>{{ date('h:i A', strtotime($item->created_at)) }}</td>
                                                <td><span
                                                        class="btn {{ $grading?->getGrade() }}">{{ $grading?->status }}</span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('parent-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
    <script>
        // if (session('message')){
        //     showSuccess(session('message'))
        // }
    </script>
@stop
