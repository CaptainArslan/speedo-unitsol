<div class="header-main header-main-s1 is-sticky is-transparent on-dark">
    <div class="container  header-container">
        <div class="header-wrap">
            <div class="header-logo"
                style="ackground: #ff0000;width: 110px;height: 40px;border-radius: 5px;display: flex;overflow: hidden;justify-content: center;align-content: center;">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img" style="border-radius: 5px;" src="{{ asset('images/logo.png') }}"
                        srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">
                    <img class="logo-dark logo-img" style="border-radius: 5px;"
                        src="{{ asset('images/logo-dark.png') }}" srcset="{{ asset('images/logo-dark2x.png 2x') }}"
                        alt="logo-dark">
                </a>
            </div>
            <div class="header-toggle">
                <button class="menu-toggler" data-target="mainNav">
                    <em class="menu-on icon ni ni-menu"></em>
                    <em class="menu-off icon ni ni-cross"></em>
                </button>
            </div><!-- .header-nav-toggle -->
            <nav class="header-menu " data-content="mainNav">
                <ul class="menu-list ml-lg-auto " role="navigation">
                    <li class="menu-item"><a href="#home" class="menu-link nav-link">Home</a></li>
                    <li class="menu-item">
                        <a href="{{ url('venues') }}" class="menu-link dropbtn nav-link">Swimming
                            Programmes</a>
                        <ul class="dropdown">
                            <li>
                                <a href="{{ 'venues#register' }}">
                                    Registration &amp; Assessment
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#baby' }}">
                                    Baby Swim
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#swim' }}">
                                    Learn To Swim
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#train' }}">
                                    Early Training
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#squad' }}">
                                    Development Squad
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#future' }}">
                                    Futuras
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#hotshot' }}">
                                    Hotshots
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#next' }}">
                                    Next Gen
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#select' }}">
                                    Select Squad
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#adult' }}">
                                    Adult Swimming
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#camp' }}">
                                    Summer Camp
                                </a>
                            </li>
                            <li>
                                <a href="{{ 'venues#swiming' }}">
                                    Synchronized Swimming
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="menu-item">
                        <a href="{{ url('venue-timetable') }}" class="menu-link nav-link ">VENUES &  TIMETABLES</a>
                        <ul class="dropdown">
                            <li>
                                <a href="{{ url('venue-timetable#areesh') }}">
                                    Al Areesh Club
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Burj') }}">
                                    Burj Club at Downtown Dubai
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Colleigate') }}">
                                    Collegiate International School
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Competitons') }}">
                                    Competition Squads
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#brown') }}">
                                    Dubai International Academy - Emirates Hills
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#black') }}">
                                    Dubai College
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Citizen') }}">
                                    Citizens School
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Lycee') }}">
                                    Lycee International Georges Pompidou
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Nord') }}">
                                    Nord Anglia International School
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Rafells') }}">
                                    Raffles World Academy
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Swiss') }}">
                                    Swiss International Scientific School
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('venue-timetable#Universal') }}">
                                    Universal American School
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="{{ url('compitition') }}"
                            class="menu-link nav-link">COMPETITIONS</a>
                            <ul class="dropdown">
                                <li>
                                    <a href="{{ url('compitition#content') }}">
                                        Competitions Calendar
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('compitition#invitation') }}">
                                        1st Speedo Invitational Long Course Meet
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('compitition#t-fourth') }}">
                                        24th Speedo Invitational Meet
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('compitition#t-third') }}">
                                        23rd Speedo Invitational Meet
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('compitition#course') }}">
                                        Speedo Invitational Short Course Championships Previous Results
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('compitition#records') }}">
                                        Club Records
                                    </a>
                                </li>
                            </ul>
                    </li>
                    <li class="menu-item"><a href="{{ url('qualified') }}" class="menu-link nav-link">Get Qualified</a>
                        <ul class="dropdown">
                            <li>
                                <a href="{{ url('qualified#content') }}">
                                    Register Your Interest
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('qualified#careers') }}">
                                    Careers
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="{{ url('feedback_queries') }}" class="menu-link nav-link">Feedback
                            and queries</a></li>
                    <li class="menu-item"><a href="{{ url('about-us') }}" class="menu-link nav-link">About Us</a>
                        <ul class="dropdown">
                            <li>
                                <a href="{{ url('about-us#weare1') }}">
                                    Who We Are
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('about-us#state1') }}">
                                    Mission Statement
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('about-us#theteam1') }}">
                                    The Team
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="{{ url('contact-us') }}" class="menu-link nav-link">Contact</a></li>
                </ul>
                <ul class="menu-btns">
                    <li>
                        <a href="{{ url('login') }}" target="_blank" class="btn btn-primary btn-lg"
                            style="background: #ff0000;border: none;">Login</a>
                    </li>
                </ul>
            </nav><!-- .nk-nav-menu -->
        </div><!-- .header-warp-->
    </div><!-- .container-->
</div>
