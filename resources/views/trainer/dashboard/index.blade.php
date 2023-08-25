@extends('trainer.layouts.master')
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head nk-block-head-lg">
            <div class="nk-block-between-md g-4">
                <div class="nk-block-head-content">
                    <h2 class="nk-block-title fw-normal">Welcome, {{auth()->user()->first_name.' '.auth()->user()->last_name}}</h2>
                    <div class="nk-block-des">
                        <p>Welcome to Trainer Dashboard. Manage your sessions and your
                            classes.</p>
                    </div>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="card card-bordered card-full">
                        <div class="nk-wg1">
                            <div class="nk-wg1-block">
                                <div class="nk-wg1-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                        <rect x="5" y="7" width="60" height="56" rx="7"
                                            ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <rect x="25" y="27" width="60" height="56" rx="7"
                                            ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <rect x="15" y="17" width="60" height="56" rx="7"
                                            ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <line x1="15" y1="29" x2="75" y2="29" fill="none"
                                            stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                        <circle cx="53" cy="23" r="2" fill="#c4cefe" />
                                        <circle cx="60" cy="23" r="2" fill="#c4cefe" />
                                        <circle cx="67" cy="23" r="2" fill="#c4cefe" />
                                        <rect x="22" y="39" width="20" height="20" rx="2"
                                            ry="2" fill="none" stroke="#6576ff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <circle cx="32" cy="45.81" r="2" fill="none" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <path d="M29,54.31a3,3,0,0,1,6,0" fill="none" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <line x1="49" y1="40" x2="69" y2="40" fill="none"
                                            stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" />
                                        <line x1="49" y1="51" x2="69" y2="51"
                                            fill="none" stroke="#c4cefe" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <line x1="49" y1="57" x2="59" y2="57"
                                            fill="none" stroke="#c4cefe" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <line x1="64" y1="57" x2="66" y2="57"
                                            fill="none" stroke="#c4cefe" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <line x1="49" y1="46" x2="59" y2="46"
                                            fill="none" stroke="#c4cefe" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <line x1="64" y1="46" x2="66" y2="46"
                                            fill="none" stroke="#c4cefe" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="nk-wg1-text">
                                    <h5 class="title">Manage Bookings</h5>
                                    <p>See all of your assigned session and classes with the
                                        details for each session.</p>
                                </div>
                            </div>
                            <div class="nk-wg1-action">
                                <a href="{{url("trainer/manage-bookings")}}" class="link"><span>Manage Bookings</span> <em
                                        class="icon ni ni-chevron-right"></em></a>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
               
                <div class="col-md-6">
                    <div class="card card-bordered card-full">
                        <div class="nk-wg1">
                            <div class="nk-wg1-block">
                                <div class="nk-wg1-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                        <rect x="3" y="10" width="70" height="50"
                                            rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                        <rect x="13" y="24" width="70" height="50"
                                            rx="7" ry="7" fill="#fff" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                        <line x1="20" y1="33" x2="31" y2="33"
                                            fill="none" stroke="#9cabff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"></line>
                                        <line x1="75" y1="33" x2="77" y2="33"
                                            fill="none" stroke="#9cabff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"></line>
                                        <line x1="66" y1="33" x2="67" y2="33"
                                            fill="none" stroke="#9cabff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"></line>
                                        <line x1="70" y1="33" x2="72" y2="33"
                                            fill="none" stroke="#9cabff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"></line>
                                        <rect x="19" y="40" width="56" height="7"
                                            rx="2" ry="2" fill="#eff1ff"></rect>
                                        <rect x="20" y="51" width="24" height="8"
                                            rx="2" ry="2" fill="#eff1ff"></rect>
                                        <rect x="48" y="51" width="7" height="8"
                                            rx="2" ry="2" fill="#eff1ff"></rect>
                                        <ellipse cx="69" cy="61.98" rx="18" ry="18.02"
                                            fill="#fff" stroke="#6576ff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"></ellipse>
                                        <circle cx="69" cy="62" r="7" fill="#e3e7fe">
                                        </circle>
                                        <polyline points="77 56 77 60 73 60" fill="none" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        </polyline>
                                        <path d="M62.26,59.17a6.81,6.81,0,0,1,11.25-2.55L77,59.92" fill="none"
                                            stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"></path>
                                        <polyline points="61 67 61 63 65 63" fill="none" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        </polyline>
                                        <path d="M61.43,64l3.51,3.31A6.83,6.83,0,0,0,76.2,64.79" fill="none"
                                            stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"></path>
                                    </svg>
                                </div>
                                <div class="nk-wg1-text">
                                    <h5 class="title">Student Grading</h5>
                                    <p>You can start giving grades to studens enrolled in
                                        your session.</p>
                                </div>
                            </div>
                            <div class="nk-wg1-action">
                                <a href="{{url("trainer/student-gradings")}}" class="link"><span>Student Grading</span> <em
                                        class="icon ni ni-chevron-right"></em></a>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-md-6">
                    <div class="card card-bordered card-full">
                        <div class="nk-wg1">
                            <div class="nk-wg1-block">
                                <div class="nk-wg1-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                        <path
                                            d="M40.74,5.16l38.67,9.23a6,6,0,0,1,4.43,7.22L70.08,80a6,6,0,0,1-7.17,4.46L24.23,75.22A6,6,0,0,1,19.81,68L33.56,9.62A6,6,0,0,1,40.74,5.16Z"
                                            fill="#eff1ff" stroke="#6576ff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <path
                                            d="M50.59,6.5,11.18,11.73a6,6,0,0,0-5.13,6.73L13.85,78a6,6,0,0,0,6.69,5.16l39.4-5.23a6,6,0,0,0,5.14-6.73l-7.8-59.49A6,6,0,0,0,50.59,6.5Z"
                                            fill="#eff1ff" stroke="#6576ff" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <rect x="15" y="15" width="54" height="70"
                                            rx="6" ry="6" fill="#fff" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <line x1="42" y1="77" x2="58" y2="77"
                                            fill="none" stroke="#c4cefe" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <circle cx="38" cy="77" r="0.5" fill="#c4cefe"
                                            stroke="#c4cefe" stroke-miterlimit="10" />
                                        <line x1="42" y1="72" x2="58" y2="72"
                                            fill="none" stroke="#c4cefe" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <circle cx="38" cy="72" r="0.5" fill="#c4cefe"
                                            stroke="#c4cefe" stroke-miterlimit="10" />
                                        <line x1="42" y1="66" x2="58" y2="66"
                                            fill="none" stroke="#c4cefe" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <circle cx="38" cy="66" r="0.5" fill="#c4cefe"
                                            stroke="#c4cefe" stroke-miterlimit="10" />
                                        <path d="M46,40l-15-.3V40A15,15,0,1,0,46,25h-.36Z" fill="#e3e7fe"
                                            stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" />
                                        <path d="M42,22A14,14,0,0,0,28,36H42V22" fill="#e3e7fe" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <polyline points="33.47 30.07 28.87 23 23 23" fill="none" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <polyline points="25 56 35 56 40.14 49" fill="none" stroke="#6576ff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="nk-wg1-text">
                                    <h5 class="title">Attendance</h5>
                                    <p>You can mark attendance of students for the
                                        sessions/classes assigned to you.</p>
                                </div>
                            </div>
                            <div class="nk-wg1-action">
                                <a href="{{url("trainer/attendances")}}" class="link"><span>Attendance</span> <em
                                        class="icon ni ni-chevron-right"></em></a>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-md-6">
                    <div class="card card-bordered card-full">
                        <div class="nk-wg1">
                            <div class="nk-wg1-block">
                                <div class="nk-wg1-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 113.9">
                                        <path
                                            d="M87.84,110.34l-48.31-7.86a3.55,3.55,0,0,1-3.1-4L48.63,29a3.66,3.66,0,0,1,4.29-2.8L101.24,34a3.56,3.56,0,0,1,3.09,4l-12.2,69.52A3.66,3.66,0,0,1,87.84,110.34Z"
                                            transform="translate(-4 -2.1)" fill="#c4cefe">
                                        </path>
                                        <path
                                            d="M33.73,105.39,78.66,98.1a3.41,3.41,0,0,0,2.84-3.94L69.4,25.05a3.5,3.5,0,0,0-4-2.82L20.44,29.51a3.41,3.41,0,0,0-2.84,3.94l12.1,69.11A3.52,3.52,0,0,0,33.73,105.39Z"
                                            transform="translate(-4 -2.1)" fill="#c4cefe">
                                        </path>
                                        <rect x="22" y="17.9" width="66" height="88"
                                            rx="3" ry="3" fill="#6576ff"></rect>
                                        <rect x="31" y="85.9" width="48" height="10"
                                            rx="1.5" ry="1.5" fill="#fff"></rect>
                                        <rect x="31" y="27.9" width="48" height="5"
                                            rx="1" ry="1" fill="#e3e7fe"></rect>
                                        <rect x="31" y="37.9" width="23" height="3"
                                            rx="1" ry="1" fill="#c4cefe"></rect>
                                        <rect x="59" y="37.9" width="20" height="3"
                                            rx="1" ry="1" fill="#c4cefe"></rect>
                                        <rect x="31" y="45.9" width="23" height="3"
                                            rx="1" ry="1" fill="#c4cefe"></rect>
                                        <rect x="59" y="45.9" width="20" height="3"
                                            rx="1" ry="1" fill="#c4cefe"></rect>
                                        <rect x="31" y="52.9" width="48" height="3"
                                            rx="1" ry="1" fill="#e3e7fe"></rect>
                                        <rect x="31" y="60.9" width="23" height="3"
                                            rx="1" ry="1" fill="#c4cefe"></rect>
                                        <path
                                            d="M98.5,116a.5.5,0,0,1-.5-.5V114H96.5a.5.5,0,0,1,0-1H98v-1.5a.5.5,0,0,1,1,0V113h1.5a.5.5,0,0,1,0,1H99v1.5A.5.5,0,0,1,98.5,116Z"
                                            transform="translate(-4 -2.1)" fill="#9cabff">
                                        </path>
                                        <path
                                            d="M16.5,85a.5.5,0,0,1-.5-.5V83H14.5a.5.5,0,0,1,0-1H16V80.5a.5.5,0,0,1,1,0V82h1.5a.5.5,0,0,1,0,1H17v1.5A.5.5,0,0,1,16.5,85Z"
                                            transform="translate(-4 -2.1)" fill="#9cabff">
                                        </path>
                                        <path d="M7,13a3,3,0,1,1,3-3A3,3,0,0,1,7,13ZM7,8a2,2,0,1,0,2,2A2,2,0,0,0,7,8Z"
                                            transform="translate(-4 -2.1)" fill="#9cabff">
                                        </path>
                                        <path
                                            d="M113.5,71a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,113.5,71Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,113.5,63Z"
                                            transform="translate(-4 -2.1)" fill="#9cabff">
                                        </path>
                                        <path
                                            d="M107.66,7.05A5.66,5.66,0,0,0,103.57,3,47.45,47.45,0,0,0,85.48,3h0A5.66,5.66,0,0,0,81.4,7.06a47.51,47.51,0,0,0,0,18.1,5.67,5.67,0,0,0,4.08,4.07,47.57,47.57,0,0,0,9,.87,47.78,47.78,0,0,0,9.06-.87,5.66,5.66,0,0,0,4.08-4.09A47.45,47.45,0,0,0,107.66,7.05Z"
                                            transform="translate(-4 -2.1)" fill="#2ec98a">
                                        </path>
                                        <path
                                            d="M100.66,12.81l-1.35,1.47c-1.9,2.06-3.88,4.21-5.77,6.3a1.29,1.29,0,0,1-1,.42h0a1.27,1.27,0,0,1-1-.42c-1.09-1.2-2.19-2.39-3.28-3.56a1.29,1.29,0,0,1,1.88-1.76c.78.84,1.57,1.68,2.35,2.54,1.6-1.76,3.25-3.55,4.83-5.27l1.35-1.46a1.29,1.29,0,0,1,1.9,1.74Z"
                                            transform="translate(-4 -2.1)" fill="#fff">
                                        </path>
                                    </svg>
                                </div>
                                <div class="nk-wg1-text">
                                    <h5 class="title">Assessment</h5>
                                    <p>You can start assessment of students.</p>
                                </div>
                            </div>
                            <div class="nk-wg1-action">
                                <a href="{{url("trainer/assessments")}}" class="link"><span>Assessment</span> <em
                                        class="icon ni ni-chevron-right"></em></a>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .nk-block -->

        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-help">
                        <div class="nk-help-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                <path
                                    d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z"
                                    transform="translate(0 -1)" fill="#f6faff" />
                                <rect x="18" y="32" width="84" height="50" rx="4"
                                    ry="4" fill="#fff" />
                                <rect x="26" y="44" width="20" height="12" rx="1"
                                    ry="1" fill="#e5effe" />
                                <rect x="50" y="44" width="20" height="12" rx="1"
                                    ry="1" fill="#e5effe" />
                                <rect x="74" y="44" width="20" height="12" rx="1"
                                    ry="1" fill="#e5effe" />
                                <rect x="38" y="60" width="20" height="12" rx="1"
                                    ry="1" fill="#e5effe" />
                                <rect x="62" y="60" width="20" height="12" rx="1"
                                    ry="1" fill="#e5effe" />
                                <path
                                    d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z"
                                    transform="translate(0 -1)" fill="#798bff" />
                                <path
                                    d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                    transform="translate(0 -1)" fill="#6576ff" />
                                <path
                                    d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                    transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10"
                                    stroke-width="2" />
                                <line x1="40" y1="22" x2="57" y2="22" fill="none"
                                    stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <line x1="40" y1="27" x2="57" y2="27" fill="none"
                                    stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <line x1="40" y1="32" x2="50" y2="32" fill="none"
                                    stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none"
                                    stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none"
                                    stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none"
                                    stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none"
                                    stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff"
                                    stroke-miterlimit="10" />
                                <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff"
                                    stroke-miterlimit="10" />
                            </svg>
                        </div>
                        <div class="nk-help-text">
                            <h5>We’re here to help you!</h5>
                            <p class="text-soft">Ask a question or file a support ticketn or
                                report an issues. Our team support team will get back to you
                                by email.</p>
                        </div>
                        <div class="nk-help-action">
                            <a href="html/subscription/contact.html" class="btn btn-lg btn-outline-primary">Get Support
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .nk-block -->

    </div>
@endsection
