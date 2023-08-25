@extends('trainer.layouts.master')
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head nk-block-head-md">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Student Grading</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->

        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="title nk-block-title">Your Sessions</h4>
                    <p>Select your session for student grading.</p>
                </div>
            </div>
            <div class="row g-gs">

                @foreach ($classes as $class)
                    @if (count($class->termStudents) != 0)
                        {{-- @if ($class->attandanceDays()) --}}
                        <?php
                        $current_date = Carbon\Carbon::now();
                        $first = substr($class->name, 0, 1);
                        // $last = substr($class->last_name, 0, 1);
                        $lesson_takes = App\Models\ClassSession::where('class_id', $class->id)
                            ->where('type', 'term')
                            ->count();
                        ?>
                        
                        <div class="col-sm-6 col-xl-4">
                            <div class="card card-bordered">
                                <div class="us-card">
                                    <div class="us-card-data">
                                        <div class="user-info" style="text-align: left;">
                                            <h6 class="text-center">{{ $class->name }}</h6>
                                            <hr>
                                            <span><strong>Class : </strong> {{ $class->name }}</span> <br>
                                            <span><strong>Venue : </strong> {{ $class->venue?->name }}</span><br>
                                            <span><strong>Timing : </strong> {{ $class->timing?->getName() }}</span><br>
                                            <span><strong>Day : </strong> {{ $current_date->format('l') }}</span>
                                        </div>
                                        <div class="us-data-list">
                                            <span><strong>Date : </strong> {{ $current_date->format('d M y') }}</span>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="us-data-list">
                                                    <span><strong>Lessons:</strong> </span>
                                                    <span class="us-aed"> {{ $class->no_of_class - $lesson_takes }} /
                                                        {{ $class->no_of_class }}</span>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="us-data-list">
                                                    <span><strong>Students:</strong> </span>
                                                    <span class="us-aed">{{ count($class->termStudents) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="team-view" style="padding-bottom: 18px;">
                                        <a href="{{ $url . '/' . $class->id . '?q=1' }}"
                                            class="btn w-85 btn-sm  btn-primary" style="background-color: #798bff">
                                            <span>
                                                Student List
                                            </span>
                                        </a>

                                    </div>

                                </div>

                            </div><!-- .card -->
                        </div>
                        {{-- @endif --}}
                    @endif
                @endforeach
                @foreach ($classes as $class)
                    @foreach ($class->termBaseBookingPackages as $package)
                        @if (count($package->packageStudents) != 0)
                            {{-- @if ($class->attandanceDays()) --}}
                            <?php
                            $current_date = Carbon\Carbon::now();
                            $first = substr($package->name, 0, 1);
                            // $last = substr($class->last_name, 0, 1);
                            $lesson_takes = App\Models\ClassSession::where('class_id', $package->id)
                                ->where('type', 'package')
                                ->count();
                            ?>
                            <div class="col-sm-6 col-xl-4">
                                <div class="card card-bordered">
                                    <div class="us-card">

                                        <div class="us-card-data">
                                            <div class="user-info" style="text-align: left;">
                                                {{-- @dd($schedule) --}}
                                                <h6 class="text-center">{{ $package->name }}</h6>
                                                <hr>
                                                <span><strong>Class : </strong> {{ $package->name }}</span> <br>
                                                <span><strong>Venue : </strong> {{ $class->venue?->name }}</span><br>
                                                <span><strong>Timing : </strong>
                                                    {{ $class->timing?->getName() }}</span><br>
                                                <span><strong>Day : </strong> {{ $current_date->format('l') }}</span>
                                            </div>
                                            <div class="us-data-list">
                                                <span><strong>Date : </strong> {{ $current_date->format('d M y') }}</span>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="us-data-list">
                                                        <span><strong>Lessons:</strong> </span>
                                                        <span class="us-aed"> {{$package->no_of_class - $lesson_takes}} / {{ $package->no_of_class }}</span>
                                                    </div>

                                                </div>
                                                <div class="col-6">
                                                    <div class="us-data-list">
                                                        <span><strong>Students:</strong> </span>
                                                        <span class="us-aed">{{ count($package->packageStudents) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="team-view" style="padding-bottom: 18px;">
                                            <a href="{{ $url . '/' . $package->id . '?q=2' }}"
                                                class="btn w-85 btn-sm  btn-primary" style="background-color: #798bff">
                                                <span>
                                                    Student List
                                                </span>
                                            </a>

                                        </div>

                                    </div>

                                </div><!-- .card -->
                            </div>
                        @endif
                        {{-- @endif --}}
                    @endforeach
                @endforeach


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('trainer-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('trainer-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
@endsection
