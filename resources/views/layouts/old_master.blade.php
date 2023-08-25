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
    <title>Home | Speedo Swim Sqaud</title>
    <!-- StyleSheets  -->
    @include('layouts.partials.style')
    <style>
        @media (min-width: 1200px) {


            .container,
            .container-mb,
            .container-sm,
            .container-md,
            .container-lg,
            .container-xl {
                max-width: 1180px;
            }
        }
    </style>
</head>

<body class="nk-body bg-white npc-landing ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <header class="header has-header-main-s1 bg-dark" id="home">
                @include('layouts.partials.header')
                @yield('content')
            </header>
            <!-- .header -->

        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @include('layouts.partials.script')
</body>

</html>
