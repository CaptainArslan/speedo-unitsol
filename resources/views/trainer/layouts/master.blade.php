<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href=""> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- Page Title  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trainer Portal Dashboard | Speedo Swim Squad</title>
    <!-- StyleSheets  -->
    @include('trainer.layouts.partials.style')
</head>

<body class="nk-body bg-white npc-subscription has-aside ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                @include('trainer.layouts.partials.header')
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                            @include('trainer.layouts.partials.sidebar')
                            <div class="nk-content-body">
                                @yield('content')
                                <!-- footer @s -->
                                @include('trainer.layouts.partials.footer')
                            </div>
                        </div>
                    </div>
                    <!-- content @e -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- JavaScript -->
        @include('trainer.layouts.partials.script')
</body>

</html>
