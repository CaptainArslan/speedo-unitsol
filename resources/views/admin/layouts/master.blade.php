<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layouts.partials.style')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php
                $user=App\Models\User::find(auth()->user()->id);
                // dd($user->roles);
            ?>
            <!-- sidebar @s -->
            @if ($user->load('roles')->hasRole('Super Admin'))
                @include('admin.layouts.partials.super_admin_sidebar')
            @else
                @include('admin.layouts.partials.sidebar')
            @endif

            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('admin.layouts.partials.header')
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    @yield('content')
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                @include('admin.layouts.partials.footer')
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    @include('admin.layouts.partials.script')
    @include('layouts.partials.toast')
    <!-- JavaScript -->

</body>

</html>
