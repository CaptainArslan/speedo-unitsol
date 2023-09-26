<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href=""> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- Page Title  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Parents Portal Dashboard | Speedo Swim Squad</title>
    <!-- StyleSheets  -->
    @include('parent.layouts.partials.style')
</head>

<body class="nk-body bg-white npc-subscription has-aside ">
    <div class="nk-app-root">
        <?php
        $user = auth()->user();
        ?>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                @include('parent.layouts.partials.header')
                <!-- main header @e -->
                <!-- content @s -->
                <!--<div class="nk-content" style="width: 1440px;margin: 30px auto;"> -->.
                <div class="nk-content" style="width: 87%;margin: 30px auto;">
                    {{-- <div class="container"> --}}
                    @yield('content')

                    {{-- <div class="us-profile-container">

                        <div class="nk-content-inner">

                            @if (request()->is('parent/my-bookings'))
                                <div class="nk-content-body">
                                    @yield('content')
                                    <!-- footer @s -->
                                </div>
                            @else
                                @yield('content')
                            @endif

                        </div>
                    </div> --}}
                    <!-- content @e -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
        {{-- @if (request()->is('parent/shops'))
            @include('parent.layouts.partials.cart_footer')
        @endif --}}
        @if (request()->is('parent/students'))
        @include('parent.layouts.partials.student_footer')
        @endif
        @if (request()->is('parent/profile') |
        request()->is('parent/security') |
        request()->is('parent/payment') |
        request()->is('parent/my-bookings') |
        request()->is('parent/my-privilege') |
        request()->is('parent/trainer-comments') |
        request()->is('parent/checkouts') |
        request()->is('parent/shops') |
        request()->is('parent/manage-bookings'))
        @include('parent.layouts.partials.footer')
        @endif
        <!-- app-root @e -->
        <!-- JavaScript -->
        @include('parent.layouts.partials.script')
        <div class="modal " id="cartView">
            <div role="document">
                <div class="us-cart-modal" style="padding: 25px;overflow-y: scroll;">

                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Your Cart</h5>
                    </div>

                    <div id="cart_detail">
                        @if (Cart::count())
                        @foreach (Cart::content() as $item)
                        <?php
                        if ($item->options->type == 'term') {
                            $student = App\Models\Student::find($item->options->student_id);
                            $term = App\Models\TermBaseBooking::find($item->id);
                            $venue = $term->venue?->name;
                            $class = $term->class?->name;
                        }
                        // dd($term);
                        ?>
                        @if ($item->options->type != 'product')
                        <div class="speedo-class">
                            <div class="class-left-side">
                                <div style="font-size: 16px;font-weight: 500;">
                                    {{ $student->getFullName() }}
                                </div>
                                <div style="font-size: 16px;font-weight: 500;">{{ $item->name }}
                                </div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ 'Class: ' . $class }}
                                </div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ 'Location: ' . $venue }}
                                </div>

                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ 'Start Date: ' . $item->options->start_date }}
                                </div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ 'Day: ' . $item->options->day }}
                                </div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ 'Time: ' . $item->options->time }}
                                </div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;"><sup class="text-danger">*</sup> Lessons:
                                    {{ $item->options->no_of_class }} - {{ $item->options->time_total }} min
                                </div>


                            </div>

                            <div class="class-right-side">
                                <sup class="text-danger">*</sup>
                                <div class="class-price">AED {{ $item->price }} </div>
                            </div>
                            <div class="class-right-side">
                                <div class="class-price"> <a href="javascript:void(0)" class="pull-right" onclick="cartDelete(event,'{{ url('parent/cart/' . $item->id) }},{{ $item->rowId }}')">
                                        <em class="icon ni ni-trash"></em></a></div>
                            </div>

                        </div>
                        @else
                        <div class="mt-2 speedo-product">
                            <div class="product-left">
                                <img src="" width="40" height="auto" style="overflow: hidden;" />
                                <span style="font-size: 15px;font-weight: 500;">{{ $item->name }}</span>
                            </div>

                            <div class="product-right">
                                <span>AED {{ $item->price }}</span>
                                <span>X</span>
                                <span>{{ $item->qty }} <a href="javascript:void(0)" class="pull-right" onclick="cartDelete(event,'{{ url('parent/cart/' . $item->id) }},{{ $item->rowId }}')">
                                        <em class="icon ni ni-trash"></em></a></span>
                            </div>

                        </div>
                        @endif
                        @endforeach
                        <div class="speedo-checkout">
                            <a class="btn text-white pull-left mr-2" style="background-color:#3097FF !important" href="#" data-dismiss="modal">Add More
                                Classes</a>
                            <a class="btn  text-white  pull-right" style="background-color:#3097FF !important" href="{{ url('parent/checkouts') }}">Checkout-></a>
                        </div>
                        @else
                        <div class="text-center mt-2">
                            <h5>Your cart is empty</h5>
                        </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
        <script>
            $('#medi_info').on('change', function(e) {
                if (e.target.checked == true) {
                    $('#medical').css('display', 'block');
                } else {
                    $('#medical').css('display', 'none');
                }
            });
            $('#studentData').on('change', function(e) {
                if (e.target.checked == true) {

                    const user = @json($user)
                    // console.log(user.first_name)
                    $('#first_name').val(user.first_name);
                    $('#first_name').prop('readonly', true);
                    $('#last_name').val(user.last_name);
                    $('#last_name').prop('readonly', true);
                    $('#dob').val(user.dob);
                    $('#dob').prop('readonly', true);
                    // $("input[type=date]").val(user.dob );
                    // $('#email').val(user.email);
                    $('#contact_no').val(user.contact_number);
                    $('#contact_no').prop('readonly', true);
                    $('#contact_no').prop('readonly', true);
                    $("#country_code").val(user.country_code).change();
                    $("#country_code").prop('disabled', true);
                    $("#gender").val(user.gender).change();
                    $("#gender").prop('disabled', true);
                    // $("#relation").val('Self').change();
                    // $("#relation").prop('disabled', true);
                } else {
                    // $('#country_code').val('');
                    $('#country_code').prop('disabled', false);
                    $('#first_name').val('');
                    $('#first_name').prop('readonly', false);
                    $('#last_name').val('');
                    $('#last_name').prop('readonly', false);
                    $('#dob').val('');
                    $('#dob').prop('readonly', false);
                    // $("input[type=date]").val(user.dob );
                    // $('#email').val('');
                    $('#contact_no').val('');
                    $('#contact_no').prop('readonly', false);
                    $("#gender").val('').change();
                    $('#gender').prop('disabled', false);
                    $("#relation").val('').change();
                    $('#relation').prop('disabled', false);
                }
            })
            $('#close-cart').on('click', function(e) {
                e.preventDefault();
                $('#addNewStudent').modal('hide');
            })
        </script>

</body>

</html>