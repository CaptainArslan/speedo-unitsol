@extends('trainer.layouts.master')
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <?php
                    $class_name = '';
                    ?>
                    <h4 class="nk-block-title">Students List</h4>
                    <div class="nk-block-des">
                        <p>You have total <code class="code-class">{{ count($records) }}</code> students in
                            session <code class="code-class">{{ $term->name }}</code>.</p>
                    </div>
                </div>
            </div>
            <div class="card card-preview">
                <div class="card-inner">
                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </th>
                                <th class="nk-tb-col"><span class="sub-text">Swim Code</span>
                                </th>
                                <th class="nk-tb-col"><span class="sub-text">Student Name</span>
                                </th>
                                <th class="nk-tb-col"><span class="sub-text">Emergency Contact</span>
                                </th>
                                <th class="nk-tb-col"><span class="sub-text">Medical Info</span>
                                </th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text"></span></th>
                                <th class="nk-tb-col tb-col-xl"><span class="sub-text">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $item)
                                <?php
                                $class_name = $item->name;
                                $current_date = Carbon\Carbon::now();
                                $first = substr($item->student?->name, 0, 1);
                                // $last = substr($class->last_name, 0, 1);
                                ?>
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid1">
                                            <label class="custom-control-label" for="uid1"></label>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        {{ $item->student?->swim_code }}
                                    </td>
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">{{ $item->student?->name }}<span
                                                        class="dot dot-success d-md-none ml-1"></span></span>
                                                <span>{{ $item->student?->relation }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <a href="javascript:void(0)" onclick="showNumber()"
                                            id="showContact">{{ $item->student?->country_code . str_pad(substr($item->student?->contact_no, -4), strlen($item->student?->contact_no), '*', STR_PAD_LEFT) }}</a>
                                        <a href="javascript:void(0)" onclick="hideNumber()" style="display: none;"
                                            id="hideContact">{{ $item->student?->country_code . $item->student?->contact_no }}</a>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        {{ $item->student?->medical_information }}
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                    </td>

                                    <td class="nk-tb-col tb-col-md">
                                        <?php
                                        $record = null;
                                        // dd($current_date);
                                        if (!is_null($class_session)) {
                                            $record = $class_session?->sessionAttendance
                                                ->where('student_id', $item->student_id)
                                                ->where('created_at', $current_date->format('Y-m-d'))
                                                ->first();
                                            // dd($data);
                                        }
                                        ?>

                                        @if (!is_null($record))
                                            <span
                                                class="badge badge-pill {{ $record->getClassName() }}">{{ $record->status }}</span>
                                            {{-- <span>{{ ' ' . $record->late }}</span> --}}
                                        @endif
                                        @if (is_null($record))
                                            <a href="#"
                                                onclick="sessionAttendance(event,'{{ url('trainer/session-attandance/' . $item->student_id) }}')"
                                                status="Present" class_id="{{ $item->term_id }}"
                                                class_type="{{ $item->type }}"
                                                date="{{ $current_date->format('Y-m-d') }}"
                                                class="btn btn-sm btn-outline-success ">Present</a>
                                            {{-- <a href="#"
                                                onclick="sessionAttendance(event,'{{ url('trainer/session-attandance/' . $item->student_id) }}')"
                                                status="Absent" class_id="{{ $item->term_id }}"
                                                date="{{ $current_date->format('Y-m-d') }}"
                                                class_type="{{ $item->type }}"class="btn btn-sm btn-outline-danger">Absent</a> --}}
                                            <a href="#" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-target="#absent{{$item->id}}">Absent</a>
                                                <a href="#" class="btn btn-sm btn-outline-warning" data-toggle="modal"
                                                data-target="#modalForm{{$item->id}}">Late</a>

                                            <div class="modal fade" id="modalForm{{$item->id}}" style="display: none;"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Reason</h5>
                                                            <a href="#" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ url('trainer/session-attandance/' . $item->student_id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="class_id"
                                                                        value="{{ $item->term_id }}">
                                                                    <input type="hidden" name="class_type"
                                                                        value="{{ $item->type }}">
                                                                    <input type="hidden" name="status" value="Late">
                                                                    <input type="hidden" name="date"
                                                                        value="{{ $current_date->format('Y-m-d') }}">
                                                                    <label class="form-label" for="full-name">Late
                                                                        Reason</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="late"
                                                                            class="form-control" id="full-name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="btn btn-lg btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <span class="sub-text">Please fill the reason</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="absent{{$item->id}}" style="display: none;"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Reason</h5>
                                                            <a href="#" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ url('trainer/session-attandance/' . $item->student_id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="class_id"
                                                                        value="{{ $item->term_id }}">
                                                                    <input type="hidden" name="class_type"
                                                                        value="{{ $item->type }}">
                                                                    <input type="hidden" name="status" value="Absent">
                                                                    <input type="hidden" name="date"
                                                                        value="{{ $current_date->format('Y-m-d') }}">
                                                                    <label class="form-label" for="full-name">Absent
                                                                        Reason</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="late"
                                                                            class="form-control" id="full-name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="btn btn-lg btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <span class="sub-text">Please fill the reason</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!is_null($record))
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#edit{{ $item->id }}"><em
                                                    class="icon ni ni-edit "></em></a>

                                             <div class="modal fade" id="edit{{ $item->id }}" style="display: none;"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Attendance</h5>
                                                            <a href="#" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ url('trainer/change_attendance/' . $item->student_id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="class_id"
                                                                        value="{{ $item->term_id }}">
                                                                    <input type="hidden" name="class_type"
                                                                        value="{{ $item->type }}">
                                                                    <input type="hidden" name="date"
                                                                        value="{{ $class_session->date }}">


                                                                    <label class="form-label" for="full-name">Change
                                                                        Attendance</label>
                                                                    <div class="form-control-wrap">
                                                                        <select name="status" id=""
                                                                            class="form-control">
                                                                            <option value="Present"
                                                                                @if ($record->status === 'Present') selected @endif>
                                                                                Present</option>
                                                                            <option value="Absent"
                                                                                @if ($record->status === 'Absent') selected @endif>
                                                                                Absent</option>
                                                                            <option value="Late"
                                                                                @if ($record->status === 'Late') selected @endif>
                                                                                Late</option>
                                                                        </select>
                                                                    </div>
                                                                    <label class="form-label"
                                                                        for="full-name">Reason</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="late"
                                                                            class="form-control"
                                                                            value="{{ $record->late }}" id="full-name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="btn btn-lg btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <span class="sub-text">Please fill the reason</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Modal With Form</button> -->
                                    </td>

                                </tr>
                            @endforeach

                            <!-- .nk-tb-item  -->
                        </tbody>
                    </table>
                </div>
            </div><!-- .card-preview -->
        </div> <!-- nk-block -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('trainer-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('trainer-assets/assets/js/example-toastr.js?ver=2.9.0') }}"></script>
    <script>
        function showNumber() {
            $('#hideContact').show()
            $('#showContact').hide()
        }

        function hideNumber() {
            $('#showContact').show()
            $('#hideContact').hide()
        }
    </script>
@endsection
