@extends('admin.layouts.master')
@section('style')
<title>{{ $title }} | Swimming Pool Management System</title>
@stop
@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Student Enrolled </h3>
                        <div class="nk-block-des text-soft">
                        </div>
                    </div><!-- .nk-block-head-content -->

                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">

                <div class="card card-preview">
                    <div class="card-inner">
                        <table class="datatable-init-export nowrap table" data-export-title="Export">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Swim Code</th>
                                    <th></th>
                                    <th>Student Name</th>
                                    <th>Parent Name</th>
                                    <th>Contact No</th>
                                    <th>Date of Birth</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach ($term_students as $item)
                                <?php
                                $student = $item->student;
                                ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$student?->swim_code}}</td>
                                    <td></td>
                                    <td>{!!html_entity_decode($student?->getFullName())!!}</td>
                                    <td>{{$student?->user->first_name}}</td>
                                    <td>{{$student?->user->country_code.$student?->user->contact_number}}</td>
                                    <td>{{date('M m,Y', strtotime($student?->dob))}}</td>
                                    <td>{{$student?->getAge()}}</td>
                                    <td>{{$student?->gender}}</td>
                                </tr>
                                <?php
                                $i++;
                                ?>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div><!-- .card-preview -->
            </div> <!-- nk-block -->
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
@stop