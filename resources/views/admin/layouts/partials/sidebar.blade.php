<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="{{ url('admin/dashboard') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('admin-assets/images/logo.png') }}"
                    srcset="{{ asset('admin-assets/images/logo2x.png 2x') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('admin-assets/images/logo-dark.png') }}"
                    srcset="{{ asset('admin-assets/images/logo-dark2x.png 2x') }}" alt="logo-dark">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                @if (!auth()->user()->roles->isEmpty())

                    <ul class="nk-menu">

                        <!-- Main Menu -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Main</h6>
                        </li>
                        @can('view_dashboard')
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/dashboard') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                    <span class="nk-menu-text">Dashboard</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @endcan
                        @canany(['view_assesment_request'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/assessment-requests') }}" class="nk-menu-link">
                                    <?php
                                    $assessment_request = App\Models\AssessmentRequest::where('status', 'Active')->count();
                                    $class_promot_request = App\Models\ClassPromotRequest::where('status', 'waiting')->count();
                                    ?>
                                    <span class="nk-menu-icon"><em class="icon ni ni-question "></em></span>
                                    <span class="nk-menu-text">Assessment Request<span
                                            class="text-danger">({{ $assessment_request }})</span></span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @endcanany
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Class Management</h6>
                        </li>
                        @canany(['view_venue'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/venues') }}" class="nk-menu-link">

                                    <span class="nk-menu-icon"><em class="icon ni ni-package"></em></span>
                                    <span class="nk-menu-text">Venues</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_timing'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/timings') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-clock"></em></span>
                                    <span class="nk-menu-text">Timings</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_class_type'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/class-types') }}" class="nk-menu-link">

                                    <span class="nk-menu-icon"><em class="icon ni ni-package"></em></span>
                                    <span class="nk-menu-text">Class Type</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_class'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/classes') }}" class="nk-menu-link">

                                    <span class="nk-menu-icon"><em class="icon ni ni-package"></em></span>
                                    <span class="nk-menu-text">Classes</span>
                                </a>
                            </li>
                        @endcanany

                        @canany(['moderate_term_base_booking'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/moderate-term-base-bookings') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                    <span class="nk-menu-text">Moderate Term Base Bookings</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_term_base_booking'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/term-base-bookings') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                    <span class="nk-menu-text">Term Base Bookings</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_class_schedule'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/class-schedules') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-home-alt"></em></span>
                                    <span class="nk-menu-text">Class Schedules</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_assessment'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/assessments') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-update "></em></span>
                                    <span class="nk-menu-text">Assessment</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @endcanany
                        @canany(['view_promo_code'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/promo-codes') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-offer"></em></span>
                                    <span class="nk-menu-text">Promo Codes</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_event'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/events') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-calendar-check"></em></span>
                                    <span class="nk-menu-text">Events</span>
                                </a>
                            </li>
                        @endcanany
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Inventory</h6>
                        </li>
                        @canany(['view_asset_type'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/asset-types') }}" class="nk-menu-link">

                                    <span class="nk-menu-icon"><em class="icon ni ni-package"></em></span>
                                    <span class="nk-menu-text">Asset Types</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_inventory'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/inventories') }}" class="nk-menu-link">

                                    <span class="nk-menu-icon"><em class="icon ni ni-package"></em></span>
                                    <span class="nk-menu-text">Inventory Management</span>
                                </a>
                            </li>
                        @endcanany

                        <!-- End Main Menu -->

                        <!-- eCommerce -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Ecommerce</h6>
                        </li>
                        @canany(['view_product'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/products') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                    <span class="nk-menu-text">Products</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_sale'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/sales') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                    <span class="nk-menu-text">Sales</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_report'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/reports') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-reports"></em></span>
                                    <span class="nk-menu-text">Reports</span>
                                </a>
                            </li>
                        @endcanany
                        <!-- End eCommerce -->

                        <!-- Billing -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Booking Information</h6>
                        </li>
                        @canany(['view_booking'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/bookings') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-calendar-booking"></em></span>
                                    <span class="nk-menu-text">Bookings</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_class_promot_request'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/class-promot-requests') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-file-doc "></em></span>
                                    <span class="nk-menu-text">Class Promot Request<span
                                            class="text-danger">({{ $class_promot_request }})</span></span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @endcanany
                        <!-- Billing -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Customer Information</h6>
                        </li>
                        @canany(['view_student'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/students') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                    <span class="nk-menu-text">Students</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @endcanany
                        @canany(['view_customer'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/customer-informations') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span>
                                    <span class="nk-menu-text">Customer Information</span>
                                </a>
                            </li>
                        @endcanany
                        <!-- User Management -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">User Management</h6>
                        </li>
                        @canany(['view_designaton'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/designations') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-opt"></em></span>
                                    <span class="nk-menu-text">Designations</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_staff'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/staff-managements') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                    <span class="nk-menu-text">Staff Management</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_trainer'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/trainers') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                    <span class="nk-menu-text">Trainers</span>
                                </a>
                            </li>
                        @endcanany
                        @if ($user->load('roles')->hasRole('Super Admin'))
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/employee-schedulings') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                    <span class="nk-menu-text">Employee Scheduling</span>
                                </a>
                            </li>
                        @endif
                        @canany(['view_cancelation'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/cancelation-policies') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-report"></em></span>
                                    <span class="nk-menu-text">Cancelation Policy</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_role'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/role-base-accesses') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-opt"></em></span>
                                    <span class="nk-menu-text">Role Base Access</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_contact'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/contact-us') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-comments"></em></span>
                                    <span class="nk-menu-text">Contact Us</span>
                                </a>
                            </li>
                        @endcanany
                        @canany(['view_setting'])
                            <li class="nk-menu-item">
                                <a href="{{ url('admin/settings') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-setting-alt"></em></span>
                                    <span class="nk-menu-text">Settings</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        @endcanany
                    </ul><!-- .nk-menu -->
                @endif
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
