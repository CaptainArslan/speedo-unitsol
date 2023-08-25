<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title  -->
    <title>Login | Swimming Pool Management System</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dashlite.css?ver=2.9.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin-assets/assets/css/theme.css?ver=2.9.0') }}">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light"
                                    data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="{{ url('admin/login') }}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg"
                                            src="{{ asset('images/logo.png') }}"
                                            srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg"
                                            src="{{ asset('images/logo-dark.png') }}"
                                            srcset="{{ 'images/logo-dark2x.png 2x' }}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the SwimmingPoolMS using your email and password.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->

                                <form action="{{ url('admin/login') }}" method="post" class="form-validate is-alter"
                                    autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email-address">Email or Username</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="#">Need
                                                Help?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input autocomplete="off" type="text"
                                                class="form-control form-control-lg" name="email" required
                                                id="email-address" placeholder="Enter your email address or username">
                                            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            <a class="link link-primary link-sm" tabindex="-1"
                                                href="html/pages/auths/auth-reset.html">Forgot Code?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#"
                                                class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input autocomplete="new-password" name="password" type="password"
                                                class="form-control form-control-lg" required id="password"
                                                placeholder="Enter your passcode">
                                            <small
                                                class="form-text text-danger">{{ $errors->first('password') }}</small>
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        {{-- <a href="{{ url('admin/dashboard') }}"
                                            class="btn btn-lg btn-primary btn-block">Sign
                                            in</a> --}}
                                        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form><!-- form -->


                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-footer-copyright"> &copy; 2021 SwimmingPoolMS. Desinged & Developed by <a
                                        href="https://unitxsol.com/" target="_blank">UnitSol</a>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                            data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round"
                                                    src="{{ asset('admin-assets/images/slides/promo-a.png') }}"
                                                    srcset="{{ asset('admin-assets/images/slides/promo-a2x.png 2x') }}"
                                                    alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Squad Manager</h4>
                                                <p>Speedo Swim Squads Dubai is a private Swimming Club run on the Swim
                                                    England. We abide by the UK Child Protection policy. Speedo Swim
                                                    Squads has comprehensive Swimming Programs from teaching through to
                                                    full competition training run by qualified teachers and
                                                    internationally recognized coaches.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->

                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('admin-assets/assets/js/bundle.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/scripts.js?ver=2.9.0') }}"></script>

    <script>
        function showWarn(title) {
            NioApp.Toast(title, 'error', {
                position: 'top-right',
                fadeAway: 2000

            });
        }
        var msg = '{{ Session::get('message') }}';
        var exist = '{{ Session::has('message') }}';
        if (exist) {
            showWarn(msg)
        }
    </script>

</html>
