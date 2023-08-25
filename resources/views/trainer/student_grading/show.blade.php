@extends('trainer.layouts.master')
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
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
                                            <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                <span>{{ $first }}</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="tb-lead">{{ $item->student?->name }} <span
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
                                        
                                        if (!is_null($class_grading)) {
                                            $record = $class_grading->gradings->where('student_id', $item->student_id)->first();
                                            // dd($data);
                                        }
                                        ?>
                                        @if (!is_null($record))
                                            <a href="#" result="Pass"
                                                class="btn {{ $record->getGrade() }}">{{ $record->status }}</a>
                                        @else
                                            <a href="#" class="btn btn-warning" data-toggle="modal"
                                                data-target="#modalForm{{ $item->id }}">Start</a>
                                        @endif

                                        <div class="modal fade" id="modalForm{{ $item->id }}" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Student Grading</h5>
                                                        <a href="#" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="add-grading{{ $item->id }}" {{-- <form action="{{ url('trainer/student-gradings/' . $item->product_id) }}" --}}
                                                            method="post" class="form-validate is-alter">
                                                            @csrf
                                                            <div class="form-group">
                                                                <div class="card card-bordered w-300px center"
                                                                    style="margin-left: 68px; border-radius: 5px;">
                                                                    @if ($item->student?->image)
                                                                        <img src="{{ $image_url . '/' . $item->student->image }}"
                                                                            class="card-img-top h-200px" alt="">
                                                                    @else
                                                                        <img src="{{ asset('trainer-assets/images/slides/slide-a.jpg') }}"
                                                                            class="card-img-top" alt="">
                                                                    @endif
                                                                    <div class="card-inner">
                                                                        <h5 class="card-title">{{ $item->student?->name }}
                                                                        </h5>
                                                                        {{-- <a href="#" class="btn btn-primary">View
                                                                            Profile</a> --}}
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-group " style="margin-left:70px">
                                                                <label class="form-label card-title">Grading <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="row">
                                                                    <?php
                                                                    $class_type = request()->q == 1 ? 'term' : 'package'; ?>
                                                                    <div class="col-6">
                                                                        <input type="text" hidden
                                                                            id="status-{{ $item->id }}"
                                                                            name="grade" value="">
                                                                        <input type="text" hidden name="type"
                                                                            value="{{ $class_type }}">
                                                                        <a href="#" result="Pass"
                                                                            onclick="changeResult(event,{{ $item->id }})"
                                                                            class="btn btn-outline-success">PASS</a>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a href="#" result="Fail"
                                                                            onclick="changeResult(event,{{ $item->id }})"
                                                                            class="btn btn-outline-danger">FAIL</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="cf-default-textarea">Remarks<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" hidden name="student_id"
                                                                        value="{{ $item->student->id }}">
                                                                    <textarea class="form-control form-control-sm" id="cf-default-textarea" name="remarks" required
                                                                        placeholder="Write your message"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="button"
                                                                    onclick="addFormData(event,'post','{{ url('trainer/student-gradings/' . $item->term_id) }}','{{ url('trainer/student-gradings/' . $item->term_id . '?q=' . request()->q) }}','add-grading{{ $item->id }}')"
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
                                        @if (!is_null($record))
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#editGrading{{ $item->id }}"><em
                                                    class="icon ni ni-edit "></em></a>
                                            <div class="modal fade" id="editGrading{{ $item->id }}"
                                                style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Student Grading Edit</h5>
                                                            <a href="#" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ url('trainer/update-gradings/' . $item->student_id) }}"
                                                                {{-- id="edit-grading{{ $item->id }}" --}} {{-- <form action="{{ url('trainer/student-gradings/' . $item->product_id) }}" --}}
                                                                class="form-validate is-alter" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="card card-bordered w-300px center"
                                                                        style="margin-left: 68px; border-radius: 5px;">
                                                                        @if ($item->student?->image)
                                                                            <img src="{{ $image_url . '/' . $item->student->image }}"
                                                                                class=" card-img-top h-200px "
                                                                                alt="">
                                                                        @else
                                                                            <img src="{{ asset('trainer-assets/images/slides/slide-a.jpg') }}"
                                                                                class="card-img-top " alt="">
                                                                        @endif
                                                                        <div class="card-inner">
                                                                            <h5 class="card-title">
                                                                                {{ $item->student?->name }}
                                                                            </h5>
                                                                            {{-- <a href="#" class="btn btn-primary">View
                                                                                        Profile</a> --}}
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group" style="margin-left:70px">
                                                                    <label class="form-label card-title">Grading <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="row">
                                                                        <?php
                                                                        $class_type = request()->q == 1 ? 'term' : 'package'; ?>
                                                                        <div class="col-6">
                                                                            <input type="text" hidden
                                                                                id="grade-{{ $item->id }}"
                                                                                name="grade" value="">
                                                                            <input type="hidden" name="class_id"
                                                                                value="{{ $item->term_id }}">
                                                                            <input type="hidden" name="class_type"
                                                                                value="{{ $item->type }}">
                                                                            <input type="hidden" name="date"
                                                                                value="{{ $class_grading->date }}">
                                                                            <a href="#" result="Pass"
                                                                                onclick="getResult(event,{{ $item->id }})"
                                                                                class="btn btn-outline-success">PASS</a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a href="#" result="Fail"
                                                                                onclick="getResult(event,{{ $item->id }})"
                                                                                class="btn btn-outline-danger">FAIL</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="cf-default-textarea">Remarks<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" hidden name="student_id"
                                                                            value="{{ $item->student->id }}">
                                                                        <textarea class="form-control form-control-sm" id="cf-default-textarea" name="remarks" required
                                                                            placeholder="Write your message">{{ $record->remarks }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" {{-- onclick="addFormData(event,'post','{{ url('trainer/update-gradings/' . $item->student_id) }}','{{ url('trainer/student-gradings/' . $item->term_id . '?q=' . request()->q) }}','edit-grading{{ $item->id }}')" --}}
                                                                        class="btn btn-lg btn-primary">Update</button>
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
        function changeResult(e, id) {
            e.preventDefault();
            let targetValue = e.target;
            let result = $(targetValue).attr('result');
            console.log();
            $('#status-' + id).val('');
            $('#status-' + id).val(result);
        }

        function getResult(e, id) {
            e.preventDefault();
            let targetValue = e.target;
            let result = $(targetValue).attr('result');
            $('#grade-' + id).val('');
            $('#grade-' + id).val(result);
        }
    </script>
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
