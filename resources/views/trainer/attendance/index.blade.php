@extends('trainer.layouts.master')
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head nk-block-head-md">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Attendacne</h3>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="form-group">
                        <label class="form-label">Enter Date Check Class</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-left">
                                <em class="icon ni ni-calendar"></em>
                            </div>
                            <?php
                            if (request()->date) {
                                $date = request()->date;
                            } else {
                                $now = Carbon\Carbon::now();
                                $date = $now->format('Y-m-d');
                            }
                            // dd($date);
                            ?>
                            <input type="text" id="end_date" onchange="checkClass(event)" value="{{ $date }}"
                                class="form-control date-picker" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->

        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="title nk-block-title">Your Sessions</h4>
                    <p>Select your session to mark attendance.</p>
                </div>

            </div>
            <div class="row g-gs">
                <?php
                if (request()->date) {
                    $date = Carbon\Carbon::parse(request()->date);
                } else {
                    $now = Carbon\Carbon::now();
                    $date = Carbon\Carbon::parse($now->format('Y-m-d'));
                }
                $day = $date->format('l');
                ?>
                @foreach ($classes as $class)
                    @if ($class->checkClassByDate($date))
                        @if (count($class->termStudents) != 0)
                            @if ($class->attandanceDayTrainerCheck($day))
                                <?php
                                $current_date = Carbon\Carbon::now();
                                $first = substr($class->name, 0, 1);
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
                                                    <span><strong>Timing : </strong>
                                                        {{ $class->timing?->getName() }}</span><br>
                                                    <span><strong>Day : </strong> {{ $current_date->format('l') }}</span>
                                                </div>
                                                <div class="us-data-list">
                                                    <span><strong>Date : </strong>
                                                        {{ $date->format('d M y') }}</span>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="us-data-list">
                                                            <span><strong>Lessons:</strong> </span>
                                                            <span class="us-aed"> {{ $class->no_of_class - $lesson_takes }}
                                                                /
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
                                            @if ($date->format('Y-m-d') <= $current_date->format('Y-m-d'))
                                                <div class="team-view" style="padding-bottom: 18px;">
                                                    <a href="{{ $url . '/' . $class->id . '?q=1' }}"
                                                        class="btn w-85 btn-sm  btn-primary"
                                                        style="background-color: #798bff">
                                                        <span>
                                                            Student List
                                                        </span>
                                                    </a>

                                                </div>
                                            @endif

                                        </div>
                                    </div><!-- .card -->
                                </div>
                            @endif
                        @endif
                    @endif
                @endforeach
                @foreach ($classes as $class)
                    @foreach ($class->termBaseBookingPackages as $package)
                        @if ($class->checkClassByDate($date))
                            @if (count($package->packageStudents) != 0)
                                @if ($class->attandanceDayTrainerCheck($day))
                                    <?php
                                    $current_date = Carbon\Carbon::now();
                                    $first = substr($package->name, 0, 1);
                                    $lesson_takes = App\Models\ClassSession::where('class_id', $package->id)
                                        ->where('type', 'package')
                                        ->count();
                                    ?>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card card-bordered">
                                            <div class="us-card">

                                                <div class="us-card-data">
                                                    <div class="user-info" style="text-align: left;">
                                                        <h6 class="text-center">{{ $package->name }}</h6>
                                                        <hr>
                                                        <span><strong>Class : </strong> {{ $package->name }}</span> <br>
                                                        <span><strong>Venue : </strong>
                                                            {{ $class->venue?->name }}</span><br>
                                                        <span><strong>Timing : </strong>
                                                            {{ $class->timing?->getName() }}</span><br>
                                                        <span><strong>Day : </strong>
                                                            {{ $current_date->format('l') }}</span>
                                                    </div>
                                                    <div class="us-data-list">
                                                        <span><strong>Date : </strong>
                                                            {{ $date->format('d M y') }}</span>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="us-data-list">
                                                                <span><strong>Lessons:</strong> </span>
                                                                <span class="us-aed">
                                                                    {{ $package->no_of_class - $lesson_takes }} /
                                                                    {{ $package->no_of_class }}</span>
                                                            </div>

                                                        </div>
                                                        <div class="col-6">
                                                            <div class="us-data-list">
                                                                <span><strong>Students:</strong> </span>
                                                                <span
                                                                    class="us-aed">{{ count($package->packageStudents) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                                @if ($date->format('Y-m-d') <= $current_date->format('Y-m-d'))
                                                    <div class="team-view" style="padding-bottom: 18px;">
                                                        {{-- @if ($date) --}}
                                                        <a href="{{ $url . '/' . $package->id . '?q=2' }}"
                                                            class="btn w-85 btn-sm  btn-primary"
                                                            style="background-color: #798bff">
                                                            <span>
                                                                Student List
                                                            </span>
                                                        </a>
                                                    </div>
                                                @endif

                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                @endforeach


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('trainer-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('trainer-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
    <script>
        function checkClass(e) {
            let date = e.target.value;
            // let class_id = $('#class_id').val();
            window.location.href = "{{ url('trainer/attendances?date=') }}" + date;
        }
    </script>
@endsection
