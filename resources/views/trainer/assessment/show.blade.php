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
                                                <span class="tb-lead">{{ $item->student->name }} <span
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
                                        
                                        if (!is_null($class_assessment)) {
                                            $record = $class_assessment?->assessmentStudent
                                                ->where('student_id', $item->student_id)
                                                ->where('created_at', $current_date->format('Y-m-d'))
                                                ->first();
                                            // dd($data);
                                            // dd($record);
                                        }
                                        ?>
                                        @if (!is_null($record))
                                            <a href="#" class="btn btn-success"><em
                                                    class="icon ni ni-check"></em>Done</a>
                                        @else
                                            <a href="#" class="btn btn-warning" data-toggle="modal"
                                                data-target="#modalForm{{ $item->id }}"><em
                                                    class="icon ni"></em>Start</a>
                                        @endif

                                        <a href="#" class="btn btn-warning" data-toggle="modal"
                                            data-target="#promotClass{{ $item->id }}">Promot Class</a>
                                        <div class="modal fade" id="modalForm{{ $item->id }}" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Student Assessment</h5>
                                                        <a href="#" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="assessment-from{{ $item->term_id }}">
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
                                                                </div>
                                                                <input type="text" hidden name="student_id"
                                                                        value="{{ $item->student?->id }}">
                                                                <input type="text" hidden name="class_id"
                                                                    value="{{ $item->term_id }}">
                                                                <input type="text" hidden name="type"
                                                                    value="{{ $item->type }}">
                                                                <input type="hidden" name="date"
                                                                    value="{{ $current_date->format('Y-m-d') }}">
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Assessmnent</label>
                                                                    <div class="row ">
                                                                        <div class="w-100">
                                                                            <table
                                                                                class="table table-striped table-bordered "
                                                                                id="dynamicTable2">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Name</th>
                                                                                        <th>Status</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                    $i2 = 0;
                                                                                    $total = 0;
                                                                                    ?>
                                                                                    @foreach ($assessments->where('swimming_class_id', $item?->getClass()) as $class)
                                                                                        <tr>

                                                                                            <td>
                                                                                                <input type="number"
                                                                                                    hidden
                                                                                                    id="assessment_id-{{ $i2 }}"
                                                                                                    name="assessment[{{ $i2 }}][assessment_id]"
                                                                                                    value="{{ $class->id }}"
                                                                                                    class="form-control">
                                                                                                <input type="text"
                                                                                                    readonly
                                                                                                    name="assessment[{{ $i2 }}][name]"
                                                                                                    value="{{ $class->name }}"
                                                                                                    class="form-control">
                                                                                            </td>
                                                                                            <td>
                                                                                                <select
                                                                                                    name="assessment[{{ $i2 }}][status]"
                                                                                                    class="form-control select2"
                                                                                                    id="">
                                                                                                    <option value="">
                                                                                                        select status
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="I can do it">
                                                                                                        I can do it</option>
                                                                                                    <option
                                                                                                        value="Nearly There">
                                                                                                        Nearly There
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Beyond Excepted">
                                                                                                        Beyond Expected
                                                                                                    </option>
                                                                                                </select>
                                                                                            </td>


                                                                                        </tr>
                                                                                        <?php
                                                                                        $i2++;
                                                                                        ?>
                                                                                    @endforeach
                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <th></th>
                                                                                        <th></th>

                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="cf-default-textarea">Message</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control form-control-sm" id="cf-default-textarea" name="message"
                                                                        placeholder="Write your message"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="button"
                                                                    onclick="addFormData(event,'post','{{ url('trainer/assessments/' . $item->term_id) }}','{{ url('trainer/assessments/' . $item->term_id . '?q=' . request()->q) }}','assessment-from{{ $item->term_id }}')"
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
                                        <div class="modal fade" id="promotClass{{ $item->id }}"
                                            style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Class Promot </h5>
                                                        <a href="#" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="promot{{ $item->term_id }}">
                                                            <div class="form-group">
                                                                <label class="form-label" for="cf-default-textarea">Class
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text" hidden name="student_id"
                                                                    value="{{ $item->student?->id }}">
                                                                <input type="text" hidden name="term_id"
                                                                    value="{{ $item->term_id }}">
                                                                <input type="text" hidden name="type"
                                                                    value="{{ $item->type }}">
                                                                <input type="text" hidden name="previous_class"
                                                                    value="{{ $item->getClass() }}">
                                                                <div class="form-control-wrap">
                                                                    <select name="class_id" class="select2 form-control"
                                                                        id="">
                                                                        <option value="">select Class</option>
                                                                        @foreach ($swimming_classes as $data)
                                                                            <option value="{{ $data->id }}">
                                                                                {{ $data->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="button"
                                                                    onclick="addFormData(event,'post','{{ url('trainer/promot_class/' . $item->term_id) }}','{{ url('trainer/assessments/' . $item->term_id . '?q=' . request()->q) }}','promot{{ $item->term_id }}')"
                                                                    class="btn btn-lg btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @if (!is_null($record))
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#editAssessment{{ $item->id }}"><em
                                                    class="icon ni ni-edit "></em></a>
                                            <div class="modal fade" id="editAssessment{{ $item->id }}"
                                                style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Student Assessment</h5>
                                                            <a href="#" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ url('trainer/update-assessments/' . $item->student_id) }}"
                                                                {{-- id="assessment-from{{ $item->term_id }}" --}} method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="card card-bordered w-300px center"
                                                                        style="margin-left: 68px; border-radius: 5px;">
                                                                        @if ($item->student?->image)
                                                                            <img src="{{ $image_url . '/' . $item->student->image }}"
                                                                                class="card-img-top h-200px"
                                                                                alt="">
                                                                        @else
                                                                            <img src="{{ asset('trainer-assets/images/slides/slide-a.jpg') }}"
                                                                                class="card-img-top" alt="">
                                                                        @endif
                                                                    </div>
                                                                    <input type="text" hidden name="student_id"
                                                                        value="{{ $item->student?->id }}">
                                                                    <input type="text" hidden name="class_id"
                                                                        value="{{ $item->term_id }}">
                                                                    <input type="text" hidden name="class_type"
                                                                        value="{{ $item->type }}">
                                                                    <input type="hidden" name="date"
                                                                        value="{{ $class_assessment->date }}">
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Assessmnent</label>
                                                                        <div class="row ">
                                                                            <div class="w-100">
                                                                                <table
                                                                                    class="table table-striped table-bordered "
                                                                                    id="dynamicTable2">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Name</th>
                                                                                            <th>Status</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $i2 = 0;
                                                                                        $total = 0;
                                                                                        ?>
                                                                                        @foreach ($assessments->where('swimming_class_id', $item?->getClass()) as $assessments)
                                                                                            <?php
                                                                                            $assessment_status = $record->studentAssessmentDetail->where('assessment_id', $assessments->id)->first();
                                                                                            ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        hidden
                                                                                                        id="assessment_id-{{ $i2 }}"
                                                                                                        name="assessment[{{ $i2 }}][assessment_id]"
                                                                                                        value="{{ $assessments->id }}"
                                                                                                        class="form-control">
                                                                                                    <input type="text"
                                                                                                        readonly
                                                                                                        name="assessment[{{ $i2 }}][name]"
                                                                                                        value="{{ $assessments->name }}"
                                                                                                        class="form-control">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <select
                                                                                                        name="assessment[{{ $i2 }}][status]"
                                                                                                        class="form-control select2"
                                                                                                        id="">
                                                                                                        <option
                                                                                                            value="">
                                                                                                            select status
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="I can do it"
                                                                                                            @if ($assessment_status?->status == 'I can do it') selected @endif>
                                                                                                            I can do it
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="Nearly There"
                                                                                                            @if ($assessment_status?->status == 'Nearly There') selected @endif>
                                                                                                            Nearly There
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="Beyond Excepted"
                                                                                                            @if ($assessment_status?->status == 'Beyond Excepted') selected @endif>
                                                                                                            Beyond
                                                                                                            Expected
                                                                                                        </option>

                                                                                                    </select>
                                                                                                </td>


                                                                                            </tr>
                                                                                            <?php
                                                                                            $i2++;
                                                                                            ?>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th></th>
                                                                                            <th></th>

                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="cf-default-textarea">Message</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-sm" id="cf-default-textarea" name="message"
                                                                            placeholder="Write your message">{{ $record->message }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" {{-- onclick="addFormData(event,'post','{{ url('trainer/assessments/' . $item->term_id) }}','{{ url('trainer/assessments/' . $item->term_id . '?q=' . request()->q) }}','assessment-from{{ $item->term_id }}')" --}}
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
