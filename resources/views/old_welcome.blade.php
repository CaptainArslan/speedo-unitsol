@extends('layouts.master')
@section('content')
    <!-- .header-main-->
    <div class="header-content my-auto py-6 is-dark">
        <div class="container mt-n4 mt-lg-0">
            <div class="row flex-lg-row-reverse align-items-center justify-content-between g-gs">
                <div class="col-lg-6 mb-lg-0">
                    <div class="header-play text-lg-center">
                        <a class="play popup-video" href="https://www.youtube.com/watch?v=3lxSMsXdaDE">
                            <div class="styled-icon styled-icon-6x styled-icon-s5 text-warning">
                                <svg x="0px" y="0px" viewBox="0 0 512 512" style="fill:currentColor"
                                    xml:space="preserve">
                                    <path
                                        d="M436.2,178.3c-7.5-4.7-17.4-2.4-22.1,5.1c-4.7,7.5-2.4,17.4,5.1,22.1c17.5,10.9,28,29.8,28,50.4s-10.5,39.5-28,50.4
                                                        L155.7,470.7c-18.6,11.6-41.1,12.2-60.3,1.5c-19.2-10.6-30.6-30.1-30.6-52V91.7c0-21.9,11.4-41.3,30.6-52
                                                        c19.1-10.6,41.7-10.1,60.3,1.5l153.4,95.6c7.5,4.7,17.4,2.4,22.1-5.1c4.7-7.5,2.4-17.4-5.1-22.1L172.7,14
                                                        c-28.6-17.9-63.3-18.7-92.9-2.4C50.3,28.1,32.7,58,32.7,91.7v328.6c0,33.7,17.6,63.7,47.1,80c14.1,7.8,29.3,11.7,44.5,11.7
                                                        c16.7,0,33.4-4.7,48.4-14l263.5-164.3c27-16.8,43.1-45.9,43.1-77.7S463.2,195.2,436.2,178.3z" />
                                </svg>
                            </div>
                            <div class="play-text">2:58 minutes</div>
                        </a>
                    </div>
                </div><!-- .col- -->
                <div class="col-lg-6 col-md-10">
                    <div class="header-caption">
                        <div class="header-rating rating">
                            <ul class="rating-stars">
                                <li><em class="icon ni ni-star-fill"></em></li>
                                <li><em class="icon ni ni-star-fill"></em></li>
                                <li><em class="icon ni ni-star-fill"></em></li>
                                <li><em class="icon ni ni-star-fill"></em></li>
                                <li><em class="icon ni ni-star-fill"></em></li>
                            </ul>
                            <div class="rating-text">14,252 reviews</div>
                        </div>
                        <h1 class="header-title fw-medium">Speedo Swim Squad</h1>
                        <div class="header-text">
                            <p style="color: #fff;">Speedo Swim Squads Dubai is a private Swimming Club run
                                on the Swim England. We abide by the UK Child Protection policy.</p>
                        </div>
                        <ul class="header-action btns-inline">
                            <li><a href="{{url('register')}}" class="btn btn-primary btn-lg btn-round"
                                    style="background: #ff0000;border: none;"><span>Sign Up Now!</span></a>
                            </li>
                        </ul>
                    </div><!-- .header-caption -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- .header-content -->
    <div class="bg-image bg-overlay after-bg-dark after-opacity-95">
        <img src="{{asset('images/bg/speedo-bg.jpeg')}}" alt="">
    </div>
@endsection
