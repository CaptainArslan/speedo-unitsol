<div class="nk-header nk-header-fixed is-light">
    <div class="container-lg">
        <!-- <div class="container-lg wide-xl"> -->
        <div class="nk-header-wrap">

            <div class="nk-header-brand">
                <a href="{{ url('parent/students') }}" class="logo-link">
                    <img class="logo-img" src="{{ asset('images/logo.png') }}" alt="logo">
                    <!--<img class="logo-light logo-img" src="{{ asset('images/logo.png') }}"-->
                    <!--    srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">-->
                    <!--<img class="logo-dark logo-img" src="{{ asset('images/logo-dark.png') }}"-->
                    <!--    srcset="{{ asset('images/logo-dark2x.png 2x') }}" alt="logo-dark">-->
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="nk-menu-item">
                        <a href="{{ url('parent/students') }}" class="nk-menu-link">

                            <span class="nk-menu-text">Swimmers</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('parent/manage-bookings') }}" class="nk-menu-link">

                            <span class="nk-menu-text">Book</span>

                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('parent/my-bookings') }}" class="nk-menu-link">

                            <span class="nk-menu-text">My Classes</span>

                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('parent/shops') }}" class="nk-menu-link">

                            <span class="nk-menu-text">Shop</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('parent/my-privilege') }}" class="nk-menu-link">
                            <span class="nk-menu-text">My Privilege</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <div class=" center-block" data-dismiss="modal" data-toggle="modal" data-target="#cartView">
                            <div style="width: 100%;text-align: center;font-weight: 600;">
                                <div class="">
                                    <div class="us-inner-add-student">
                                        <div class="user-avatar sm"
                                            style="border-radius: 30px!important; width: 80px;
                                            height: 40px;background-color:#fff !important ">
                                            <em class="icon ni ni-cart " style="color: #f00"><sup
                                                    class="sup-tag count">{{ Cart::count() }}</sup></em>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- <li class="nk-menu-item">
                        <a href="{{ url('parent/trainer-comments') }}" class="nk-menu-link">

                            <span class="nk-menu-text">Trainer Comments</span>
                        </a>
                    </li> --}}
                    <li class="dropdown user-dropdown">
                        <div class="us-top-bar" style="width: 130px;background: #fff;border-radius: 40px; padding:3px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                    <div class="user-name dropdown-indicator d-none d-sm-block" style="color: #f00;">
                                        {{ auth()->user()->first_name }}</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>{{ substr(auth()->user()->first_name . '' . auth()->user()->last_name, 0, 1) }}</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">{{ auth()->user()->first_name }}</span>
                                            <span class="sub-text">{{ auth()->user()->email }}</span>
                                        </div>
                                        <div class="user-action">
                                            <a class="btn btn-icon mr-n2" href="{{ url('parent/profile') }}"><em
                                                    class="icon ni ni-setting"></em></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="{{ url('parent/profile?q=1') }}"><em
                                                    class="icon ni ni-user-alt"></em><span>View
                                                    Profile</span></a></li>
                                        {{-- <li><a href="html/subscription/profile-setting.html"><em
                                                    class="icon ni ni-setting-alt"></em><span>Account
                                                    Setting</span></a></li>
                                        <li><a href="html/subscription/profile-activity.html"><em
                                                    class="icon ni ni-activity-alt"></em><span>Login
                                                    Activity</span></a></li>
                                        <li><a class="dark-switch" href="#"><em
                                                    class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li>
                                            <a href="#"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><em
                                                    class="icon ni ni-signout"></em><span>Sign
                                                    out</span></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </li>
                    <!-- .dropdown -->
                    {{-- <li class="dropdown notification-dropdown">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon mr-lg-n1" data-toggle="dropdown">
                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                <a href="#">Mark All as Read</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to
                                                <span>Widthdrawl</span>
                                            </div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit
                                                    Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to
                                                <span>Widthdrawl</span>
                                            </div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit
                                                    Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to
                                                <span>Widthdrawl</span>
                                            </div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit
                                                    Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                </div><!-- .nk-notification -->
                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="#">View All</a>
                            </div>
                        </div>
                    </li><!-- .dropdown --> --}}

                    <li class="d-lg-none">
                        <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em
                                class="icon ni ni-menu"></em></a>
                    </li>
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
