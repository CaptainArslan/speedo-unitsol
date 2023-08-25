<div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
    <div class="nk-sidebar-menu" data-simplebar>
        <!-- Menu -->
        <ul class="nk-menu">
            <li class="nk-menu-heading">
                <h6 class="overline-title">Menu</h6>
            </li>
            <li class="nk-menu-item">
                <a href="{{ url('trainer/dashboard') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                    <span class="nk-menu-text">Dashboard</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ url('trainer/manage-bookings') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-todo"></em></span>
                    <span class="nk-menu-text">Manage Bookings</span>

                </a>
            </li>
            {{-- <li class="nk-menu-item">
                <a href="{{ url('trainer/schedule-classes') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-calendar-booking"></em></span>
                    <span class="nk-menu-text">Schedule Classes</span>
                </a>
            </li> --}}
            <li class="nk-menu-item">
                <a href="{{ url('trainer/attendances') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-check-c"></em></span>
                    <span class="nk-menu-text">Attendance</span>
                </a>
            </li>

            <li class="nk-menu-item">
                <a href="{{ url('trainer/assessments') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-list-check"></em></span>
                    <span class="nk-menu-text">Assessment</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ url('trainer/student-gradings') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-exchange-v"></em></span>
                    <span class="nk-menu-text">Student Grading</span>
                </a>
            </li>
            {{-- <li class="nk-menu-item">
                <a href="{{ url('trainer/news-bullitens') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                    <span class="nk-menu-text">News Bulliten</span>
                </a>
            </li> --}}
            <li class="nk-menu-item">
                <a href="{{ url('trainer/account-settings') }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                    <span class="nk-menu-text">Account Setting</span>
                </a>
            </li>

        </ul>
        <!-- Menu -->
        {{-- <ul class="nk-menu nk-menu-sm">
            <!-- Menu -->
            <li class="nk-menu-heading">
                <span>Help Center</span>
            </li>
            <li class="nk-menu-item">
                <a href="{{ url('trainer/faqs') }}" class="nk-menu-link">
                    <span class="nk-menu-text">FAQs</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ url('trainer/contacts') }}" class="nk-menu-link">
                    <span class="nk-menu-text">Contact</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ url('trainer/supports') }}" class="nk-menu-link">
                    <span class="nk-menu-text">Support</span>
                </a>
            </li>
        </ul> --}}
    </div><!-- .nk-sidebar-menu -->
    <div class="nk-aside-close">
        <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
    </div><!-- .nk-aside-close -->
</div>
