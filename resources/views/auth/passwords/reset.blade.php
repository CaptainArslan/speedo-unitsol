<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Trainer Portal Login | Speedo Swim Squad</title>
    <!-- StyleSheets  -->
    @include('trainer.layouts.partials.style')
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
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{ url('/') }}" class="logo-link">
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
                                        <h4 class="nk-block-title">Reset Password</h4>
                                        <div class="nk-block-des">
                                        </div>
                                    </div>
                                </div>
                                <form method="post" action="{{ url('update_password') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <input type="email" hidden name="email" value="{{request()->email}}">
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
                                            <input type="password" name="password_confirmation" required
                                                class="form-control form-control-lg" id="password"
                                                placeholder="Enter your passcode">
                                          
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Reset</button>
                                    </div>
                                </form>
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
        @include('trainer.layouts.partials.script')


</html>
