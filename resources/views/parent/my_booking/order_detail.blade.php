@extends('parent.layouts.master')
@section('content')
    <div class="us-profile-container" style="max-width: 1440px;margin: 0 auto;">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head nk-block-head-md">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Booking Detail</h3>
                            </div><!-- .nk-block-head-content -->
                            <!-- <div class="nk-block-head-content">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addEventPopup"><em class="icon ni ni-plus"></em><span>Add New Slot</span></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>.nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init-export nowrap table" data-export-title="Export">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Student</th>
                                            <th>Venue</th>
                                            <th>Time</th>
                                            <th>Lessons</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($order_details as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    @if ($item->type == 'product')
                                                        <div class="user-avatar sq">
                                                            <img src="{{ $image_url . '/' . $item->product->getFirstImage() }}"
                                                                alt="" class="thumb">
                                                        </div>
                                                    @else
                                                        <div class="user-avatar sq bg-gray-dim">
                                                            <span>{{ substr($item->name, 0, 1) }}</span>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }}</td>
                                               
                                                @foreach ($item->studentTerms->where('status', 'on') as $student_term)
                                                    <td>{{ $student_term->student ? $student_term->student->name : '' }}
                                                    </td>
                                                    @if ($student_term->type == 'term')
                                                        <td>{{ $student_term->term?->venue->name }}</td>
                                                        <td>{{ $student_term->term?->timing->getName()}}
                                                        </td>
                                                        <td>{{ $student_term?->no_of_class }}</td>
                                                        <td>{{ date('M d, Y', strtotime($student_term->term?->start_date)) }}
                                                        </td>
                                                        <td>{{ date('M d, Y', strtotime($student_term->term?->end_date)) }}
                                                        </td>
                                                    @endif
                                                    @if ($student_term->type == 'package')
                                                        <td>{{ $student_term->package?->term->venue->name }}</td>
                                                        <td>{{ $student_term->package?->term->timing->getName() }}
                                                        </td>
                                                        <td>{{ $student_term?->no_of_class }}</td>
                                                        <td>{{ date('M d, Y', strtotime($student_term->package?->start_date)) }}
                                                        </td>
                                                        <td>{{ date('M d, Y', strtotime($student_term->package?->end_date)) }}
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ url('parent/my-bookings/' . $item->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <em class="icon ni ni-eye "></em>
                                                        </a>
                                                        <div class="modal fade" id="edit{{ $student_term->id }}"
                                                            tabindex="-{{ $student_term->id }}" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalCenterTitle">Edit
                                                                            Student
                                                                            Detial
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ url('parent/my-bookings/' . $student_term->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label"
                                                                                            for="full-name">Student</label>
                                                                                        <div class="form-control-wrap">
                                                                                            <select name="student_id"
                                                                                                class="form-control">
                                                                                                <option value="">
                                                                                                    select
                                                                                                    student
                                                                                                </option>
                                                                                                @foreach ($students as $student)
                                                                                                    <option
                                                                                                        value="{{ $student->id }}"
                                                                                                        @if ($student->id == $student_term->student_id) selected @endif>
                                                                                                        {{ $student->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit" {{-- onclick="addFormData(event,'post','{{ url('parent/my-bookings/' . $item->id) }}','{{ url('parent/my-bookings') }}','edit-student')" --}}
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                   
                                                @endforeach

                                                @if ($item->type == 'product')
                                                    <td></td>
                                                    <td>{{ 'Price ' . $item->price }}</td>
                                                    <td>{{ 'Qty ' . $item->qty }}</td>
                                                    <td>{{ 'Total ' . $item->price * $item->qty }}</td>
                                                    <td></td>
                                                @endif

                                                {{-- <td></td> --}}

                                            </tr>
                                            <?php
                                            // $i++;
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
