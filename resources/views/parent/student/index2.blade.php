@extends('parent.layouts.master')
@section('content')
    <div class="us-container">
        <div class="nk-content-inner">
            <div class="nk-aside" style="position: fixed;height: 100% !important;margin-top: 36px;">
                <div class="nk-sidebar-menu" data-simplebar="init"
                    style="background-color: #f3f3f3;border: 1px solid #dbdfea !important;border-radius: 4px;height: 100%;">
                    <div class="simplebar-wrapper" style="margin: 0px 0px -40px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;padding: 22px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                    <div class="simplebar-content" style="padding: 0px 0px 40px;">
                                        <!-- Menu -->
                                        <ul class="nk-menu">
                                            <li class="nk-menu-heading">
                                                <h6 class="overline-title">Students</h6>
                                            </li>

                                            @foreach ($students as $key => $student)
                                                <li class="nk-menu-item selected-student w-100 d-inline-block">
                                                    <a href="#" id=""
                                                        class="nk-menu-link w-100 {{ $key == 0 ? 'active' : '' }}"
                                                        student_id="{{ $student->id }}"
                                                        onclick="studentDetail(event,'{{ url('parent/student-detail/' . $student->id) }}')"
                                                        data-original-title="" title="">
                                                        <span class="nk-menu-text"
                                                            style="color:#ff0000">{{ $student->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 650px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                    </div>
                </div><!-- .nk-sidebar-menu -->
                <div class="nk-aside-close">
                    <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
                </div><!-- .nk-aside-close -->
            </div>
            <div class="nk-content-body">


                <div class="nk-content-wrap">
                    <div id="student-detail">
                        @foreach ($students->take(1) as $student)
                            <div class="nk-block-head">

                                <h3 class="text-center" style="text-align: left !important;color: #ff0000;">
                                    {{ $student->name }}
                                </h3>
                                <div class="card border mb-2 " style="background-color: #f3f3f3;">
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name">Image</label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name">Date Of Birth</label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name">Age</label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name">Gender</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        {{-- <label class="form-label" for="full-name"
                                                            style="color: #8091a7;">{{ $student->nick_name != null ? $student->nick_name : 'Nick Name not set' }}</label> --}}
                                                        <img style="width: 120px;height:120px;"
                                                            src="{{ $image_url . '/' . $student->image }}" alt="">

                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name"
                                                            style="color: #8091a7;">{{ date('M d, Y', strtotime($student->dob)) }}</label>

                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name"
                                                            style="color: #8091a7;">{{ $student->getAge() }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="full-name"
                                                            style="color: #8091a7;">{{ $student->gender }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <a href="{{ $url . '/' . $student->id . '/edit' }}"
                                                            class="btn btn-lg float-left btn-primary">Edit</a>
                                                        @if (!is_null($student->assessmentRequest))
                                                            <button type="button"
                                                                @if ($student->assessmentRequest?->status == 'Enroll Now') onclick="window.location.href='{{ url('parent/manage-bookings?q=' . $student->id) }}'" @endif
                                                                class="btn btn-lg float-right btn-primary">{{ $student->assessmentRequest?->status }}</button>
                                                        @else
                                                            <button type="button"
                                                                onclick="assessmentRequest(event,'{{ url('parent/assessment-requests/' . $student->id) }}')"
                                                                class="btn btn-lg float-right btn-primary">Free
                                                                Assessment</button>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <form action="parents/manage-bookings.html">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="full-name">Swimming
                                                        Progress</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="full-name"
                                                        style="color: #8091a7;">Baby
                                                        Ducks</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="row">
                                        <img src="{{ asset('parent-assets/progress.png') }}">
                                    </div>
                                </div>
                            </div><!-- .card-preview -->
                        @endforeach
                    </div>
                </div>
                <div id="popup">
                </div>
                @include('parent.layouts.partials.footer')
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
    <script>
        $('#studentData').on('change', function(e) {
            if (e.target.checked == true) {

                const user = @json($user)
                // console.log(user.first_name)
                $('#full-name').val(user.first_name + ' ' + user.last_name);
                $('#dob').val(user.dob);
                // $("input[type=date]").val(user.dob );
                $('#email').val(user.email);
                $('#contact_no').val(user.contact_number);
            } else {
                $('#full-name').val('');
                $('#dob').val('');
                // $("input[type=date]").val(user.dob );
                $('#email').val('');
                $('#contact_no').val('');
            }
        });
        const total = @json($total);
        if (total == 0) {
            $('#addNewStudent').modal('show');
        }

        function hidePopup(url) {
            console.log(url)
            $(".welcome-container-bg").hide();
            setTimeout(function() {
                if (total == 0) {
                    window.location = '{{ url('parent/manage-bookings') }}';
                } else {

                    window.location = '{{ url('parent/students') }}';
                }
            });
        }
    </script>
@stop
