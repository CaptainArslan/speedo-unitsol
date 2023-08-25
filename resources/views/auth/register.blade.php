<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Parents Portal Signup | Speedo Swim Squad</title>
    <!-- StyleSheets  -->
    @include('layouts.old_partials.style')
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center"
                            style="background-color: #ff0000;border-radius: 4px;margin-bottom: 20px;padding: 20px;">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{ asset('images/logo.png') }}"
                                    srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('images/logo-dark.png') }}"
                                    srcset="{{ asset('images/logo-dark2x.png 2x') }}" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-Up</h4>
                                        <div class="nk-block-des">
                                            <p>Access the Parents Portal sign up here</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ url('register') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" name="email" required value="{{ old('email') }}"
                                                class="form-control form-control-lg" id="default-01"
                                                placeholder="Enter your email address">
                                            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" required
                                                class="form-control form-control-lg" id="password"
                                                placeholder="Enter your passcode">
                                            <small
                                                class="form-text text-danger">{{ $errors->first('password') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Confirm Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" required name="password_confirmation"
                                                class="form-control form-control-lg" id="password"
                                                placeholder="Enter your passcode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Signup</button>
                                    </div>
                                </form>
                                <h5 class="text-center mt-2">OR</h5>
                                <div class="text-center">
                                    <a href="{{ url('login/google') }}"><img class="mr-2"
                                            src="{{ asset('images/google.png') }}" alt=""></a>
                                    <a href="{{ url('login/facebook') }}"><img
                                            src="{{ asset('images/facebook.png') }}" alt=""></a>
                                </div>
                                <p class="text-center mt-2">Already have an account?
                                    <a href="{{ url('login') }}" class="btn btn-sm btn-primary">Signin</a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">

                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <div class="nk-footer-copyright"> &copy; 2022 Speedo Swim Squad. Desinged &
                                            Developed by <a href="https://unitxsol.com/" target="_blank">UnitSol</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- wrap @e -->
                </div>
                <!-- content @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- JavaScript -->
        @include('layouts.old_partials.script')


</html>
