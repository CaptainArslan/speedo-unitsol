@extends('admin.layouts.master')

@section('style')
<title>{{ $title }} | Swimming Pool Management System</title>
<style>
    .modal-dialog {
        max-width: 50% !important;
    }
</style>
@stop
@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Class Promot Request </h3>
                        <div class="nk-block-des text-soft">
                            <!-- <p>An example page for product details</p> -->
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-preview">
                    <div class="card-inner">
                        <table class="datatable-init-export nowrap table" data-export-title="Export">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Swim Code</th>
                                    <th>Request By</th>
                                    <th>New Class</th>
                                    <th>Student Name</th>
                                    <th>Booking Name</th>
                                    <th>Venue</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach ($class_promot_requests as $item)
                                <tr>
                                    <?php
                                    $student_term = App\Models\StudentTerm::where('term_id', $item->term_id)
                                        ->where('type', $item->type)
                                        ->first();
                                    $lession_takes = App\Models\ClassSession::where('class_id', $student_term->term_id)
                                        ->where('type', $student_term->type)
                                        ->count();
                                    $start_date = date('M d,Y', strtotime($student_term->getStartDate()));
                                    $end_date = date('M d,Y', strtotime($student_term->getEndDate()));
                                    $lessons = $student_term->getNoOfClasses();
                                    // dd($lessons,$lession_takes);
                                    ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->student?->swim_code }}</td>
                                    <td>{{ $item->trainer?->first_name . ' ' . $item->trainer?->last_name }}</td>
                                    <td>{{ $item->class?->name }}</td>
                                    <td>{{ $item->student?->name }}</td>
                                    <td>{!! html_entity_decode($item->bookingName()) !!}</td>
                                    <td>{{ $item->venueName() }}</td>
                                    <td>{!! html_entity_decode($item->getStatus()) !!}</td>
                                    <td>
                                        <button class="btn btn-sm  {{ $item->status != 'accepted' ? 'btn-danger' : 'btn-success' }}" @if ($item->status != 'accepted') onclick="acceptRequest(event,'{{ url('admin/accept_request/' . $item->id) }}')" @endif>
                                            {{ $item->status != 'accepted' ? 'pending' : 'complete' }}
                                        </button>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit">
                                            Promot
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit" tabindex="-1" style="margin-top: 132px;" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                            <div class="" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal
                                                            title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ url('admin/accept_request/' . $item->id) }}" method="post">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label card-title">Total
                                                                            Lessons</label>
                                                                        <input type="text" readonly class="form-control" value="{{ $lessons }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label card-title">Lesson
                                                                            Take</label>
                                                                        <input type="text" readonly class="form-control" value="{{ $lession_takes }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label card-title">Start
                                                                            Date
                                                                        </label>
                                                                        <input type="text" readonly class="form-control" value="{{ $student_term?->getStartDate() }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label card-title">End
                                                                            Date
                                                                        </label>
                                                                        <input type="text" readonly class="form-control" value="{{ $student_term->getEndDate() }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


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
            </div><!-- .nk-block -->


        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
<script></script>
@stop