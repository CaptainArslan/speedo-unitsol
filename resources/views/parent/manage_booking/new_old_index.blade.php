@extends('parent.layouts.master')
@section('style')
    <style>
        .sub2-text {
            display: block;
            font-size: 11px;
            color: #8094ae;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        .us-days-bg {
            background: #f00;
            font-weight: 600;
            color: #fff;
            text-align: center;
            height: 50px;
        }

        .us-days-bg-light {
            background: #fe7171;
            font-weight: 700;
            color: #fff;
            text-align: center;
            height: 50px;
        }

        .us-class-row-bg {
            background-color: #FAFAFA;
            min-height: 200px;
            height: 200px;
            text-align: center;
            font-size: 15px;
            font-weight: 500;
        }

        .us-bottom-border {
            border-bottom: 1px solid #f00;
            font-weight: 700;
        }
        .us-table-header{
                position: sticky;
                top: 75px;
                z-index: 1;
                font-size: 16px;
                font-weight: 500;
        }
        .us-class-schedule {
            background: #fff;
            border: 1px solid #f1f1f1;
            padding: 15px;
        }

        .us-class-list {

            line-height: 35px;
            margin-bottom: 5px;
            cursor: pointer;
            border: 2px solid #f00;
            border-radius: 25px;

        }

        .us-class-list>.us-clss-timing {
            font-size: 13px;
            font-weight: 600;
        }

        .us-class-color {
            width: 10px;
            height: 10px;
            background: #6576ff;
            border-radius: 5px;
        }

        .no-class {
            border: none;
        }

        .us-class-data {
            margin-bottom: 4px;
            color: #1e1e1e;
            font-size: 15px;
            font-weight: 200;
        }

        .us-booked-slots {
            background: #f8f8f8;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .btn_style {
            background-color: #E6E6E6;
            border: none;
            color: #424242;
            width: 180px;
            display: flex;
            justify-content: center;
            float: right;
        }
        .sup-tag{
            font-family: 'Roboto';
            font-size: 13px;
            font-weight: 500;
        }
    </style>
@stop
@section('content')
    <div class="us-profile-container" style="max-width: 1440px;margin: 0 auto;">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head nk-block-head-md">

                        <div class="nk-block-between">

                            <div class="nk-block-head-content">
                                <h4 class="text-center" style="text-align: left !important;color: #1E1E1E;">
                                    Manage Bookings
                                </h4>
                            </div>

                            <div class="nk-block-head-content">
                                <div class=" center-block" data-dismiss="modal" data-toggle="modal" data-target="#cartView">
                                    <div style="width: 100%;text-align: center;font-weight: 600;">
                                        <div class="">
                                            <div class="us-inner-add-student">
                                                <div class="user-avatar sm"
                                                    style="border-radius: 30px!important; width: 80px;
                                                    height: 40px;background-color:#3097FF !important ">
                                                    <em class="icon ni ni-cart "><sup class="sup-tag count">{{ Cart::count() }}</sup></em>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg mb-5 ">
                        <form id="filter-form">
                            <div class="card mb-3">
                                <div class="">
                                    <ul class="preview-list">
                                        <!-- Filter By Class Level -->
                                        <li class="preview-item">

                                            <span class="preview-title overline-title"><em class="icon ni ni-map-pin"></em>
                                                Filter By
                                                Location</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown" style="width: 300px;">
                                                        <select name="venue_id" id="venue_select2"
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class="select2 form-control">
                                                            <option value="">- Select Location -</option>
                                                            @foreach ($venues as $item)
                                                                <option value="{{ $item->id }}"
                                                                    location="{{ $item->name }}"
                                                                    @if (request()->location == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>
                                        <li class="preview-item">

                                            <span class="preview-title overline-title"><em class="icon ni ni-user"></em>
                                                Select Student</span>
                                            <ul class="d-flex g-3">
                                                @foreach ($students as $student)
                                                    <li>
                                                        <input type="checkbox"
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class="" name="student_id[]" value="{{ $student->id }}"
                                                            placeholder="Search Product by Name">
                                                        {{ $student->name }}

                                                       
                                                    </li><!-- li -->
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="preview-list">
                                        <!-- Filter By Class Level -->
                                        <li class="preview-item">

                                            <span class="preview-title overline-title"><em class="icon ni ni-map-pin"></em>
                                                Filter By Term</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown" style="width: 300px;">
                                                        <select name="term_id[]" id="term_select2" multiple
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class="select2 form-control">
                                                            <option value="">- Select term -</option>
                                                            @foreach ($filter_terms as $term)
                                                                <option value="{{ $term->id }}">{{ $term->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>
                                        <li class="preview-item">

                                            <span class="preview-title overline-title"><em
                                                    class="icon ni ni-map-pin"></em>Filter Class
                                                Level</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown" style="width: 300px;">
                                                        <select name="swimming_class_id[]" id="class_select2" multiple
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class=" form-control">
                                                            <option value="">- Select Class -</option>
                                                            @if (isset($classes))
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}"
                                                                        class="{{ $class->name }}">{{ $class->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>
                                        <li class="preview-item">

                                            <span class="preview-title overline-title"><em
                                                    class="icon ni ni-map-pin"></em>Filter Class
                                                Type</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown" style="width: 300px;">
                                                        <select name="class_type_id[]" id="venue" multiple
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class="class_type_select2 form-control">
                                                            <option value="">- Select Class Type -</option>

                                                            @foreach ($class_types as $class_type)
                                                                <option value="{{ $class_type->id }}"
                                                                    class="{{ $class_type->id }}">
                                                                    {{ $class_type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>
                                        <li class="preview-item">

                                            <span class="preview-title overline-title"><em
                                                    class="icon ni ni-map-pin"></em>Filter Days</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown" style="width: 300px;">
                                                        <select name="day_id[]" id="day" multiple
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class="day_select2 form-control">
                                                            <option value="">- Select Class Type -</option>
                                                            @foreach ($days as $day)
                                                                <option value="{{ $day->id }}"
                                                                    class="{{ $day->id }}">{{ $day->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <button type="button" onclick="removeAllBage()"
                                                            class="btn ml-4 text-white" style="background-color: #3097FF !important"><span>Clear Filter</span></button>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </div><!-- .card-preview -->

                        </form>
                    </div>
                    @if (isset($terms))
                        <div class="" id="filter-term">
                            <div class="">
                                <table style="width: 100%;">
                                    <thead class="us-table-header"> 
                                        <th>
                                            <tr>
                                                <td style="width: 12%;">
    
                                                </td>
                                                <td class="us-days-bg">
                                                    Monday
                                                </td>
                                                <td class="us-days-bg-light">
                                                    Tueday
                                                </td>
                                                <td class="us-days-bg">
                                                    Wednesday
                                                </td>
                                                <td class="us-days-bg-light">
                                                    Thursday
                                                </td>
                                                <td class="us-days-bg">
                                                    Friday
                                                </td>
                                                <td class="us-days-bg-light">
                                                    Saturday
                                                </td>
                                                <td class="us-days-bg">
                                                    Sunday
                                                </td>
                                            </tr>
                                        </th>
                                    </thead>
                                  
                                    <tbody>
                                        @foreach ($terms as $parent_term)
                                            <?php
                                            // dd($parent_term->tranierDetails->where('venue_id', $venue_id));
                                            $child_terms = $parent_term->tranierDetails->where('venue_id', request()->location);
                                            ?>
                                            <tr class="us-class-row-bg">
                                                <td class="us-bottom-border">
                                                    {{ $parent_term?->class->name.' - '.$parent_term->name }}
                                                </td>
                                                @include('parent.manage_booking.partial.monday_term')
                                                @include('parent.manage_booking.partial.tuesday_term')
                                                @include('parent.manage_booking.partial.wednesday_term')
                                                @include('parent.manage_booking.partial.thursday_term')
                                                @include('parent.manage_booking.partial.friday_term')
                                                @include('parent.manage_booking.partial.saturday_term')
                                                @include('parent.manage_booking.partial.sunday_term')
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="nk-block-head mb-4 mt-4 border">
                            <div class="nk-block-head-content">
                                <h5 class="title nk-block-title m-2 center">No Record Found</h4>
                                    <!-- <p>All classes schedule on selected date.</p> -->
                            </div>
                        </div>
                    @endif
                    <!-- .card-preview -->
                    <div class="nk-block nk-block-lg p-4" style="margin-top: 50px;background: #f3f3f3;border-radius: 6px;">

                        <div class="nk-block-head-content">
                            <h5 class="title nk-block-title">Swimming Products</h5>
                            <p>Would you like to add some swimming equipments.</p>
                        </div>



                        {{-- <div class="bbb_viewed">
                            <div class="container"> --}}
                        <div class="row">
                            <div class="col">
                                <div class="bbb_main_container">
                                    <div class="bbb_viewed_title_container">
                                        {{-- <h3 class="bbb_viewed_title">Best selling products</h3> --}}
                                        <div class="bbb_viewed_nav_container">
                                            <div class="bbb_viewed_nav bbb_viewed_prev"><i
                                                    class="fas fa-chevron-left"></i>
                                            </div>
                                            <div class="bbb_viewed_nav bbb_viewed_next"><i
                                                    class="fas fa-chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bbb_viewed_slider_container">
                                        <div class="owl-carousel owl-theme bbb_viewed_slider" id="bbb_viewed_slider">
                                            @foreach ($products as $product)
                                                <div class="owl-item">
                                                    <div
                                                        class="bbb_viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                        <div class="bbb_viewed_image">
                                                            <img style="width: 150px;height:150px;"
                                                                src="{{ $image_url . '/' . $product->getFirstImage() }}"
                                                                alt="">
                                                        </div>
                                                        <div class="bbb_viewed_content text-center">
                                                            <div class="bbb_viewed_price">AED {{ $product->sale_price }}
                                                            </div>
                                                            <div class="bbb_viewed_name">
                                                                <a href="#" class="">{{ $product->name }}</a>
                                                            </div>
                                                            <div class="bbb_viewed_name">
                                                                <a href="javascript:void(0)"
                                                                    onclick="addToCart(event,'{{ url('parent/add-to-cart-product/' . $product->id) }}')"
                                                                    class="mt-2 btn btn-sm btn-dim btn-primary"><span>Add
                                                                        to Cart</span></a>
                                                            </div>
                                                        </div>
                                                        <ul class="item_marks">
                                                            <li class="item_mark item_discount">-25%</li>
                                                            <li class="item_mark item_new">{{ $product->status }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select id="venue_select3" class="select2 form-control">
                            <option value="">- Select Location -</option>
                            @foreach ($venues as $item)
                                <option value="{{ $item->id }}" location="{{ $item->name }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="selectVenue(event)">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal | Cart View @s -->
    <div class="modal " id="cartView">
        <div role="document">
            <div class="us-cart-modal" style="padding: 25px;">

                <a href="#" class="close"
                data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Your Cart</h5>
                </div>
                <div id="cart_detail">
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
                                <div style="font-size: 16px;font-weight: 500;">{{ $item->name }} 
                                    
                                </div>
                                    
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ $class }} </div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ $venue }} </div>
                                    <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                        {{ $student->getFullName() }} </div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ $item->options->start_date }} -
                                    {{ $item->options->end_date }}</div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                    {{ $item->options->time }} </div>
                                <div style="width: 100%;font-size: 12px;color: #949494;float: left;">Lessons:
                                    {{ $item->options->no_of_class }} - {{ $item->options->time_total }} min
                                </div>
                               
                                     
                            </div>
                           
                            <div class="class-right-side">
                                <div class="class-price">AED {{ $item->price }} </div>
                            </div>
                            <div class="class-right-side">
                                <div class="class-price"> <a  href="javascript:void(0)" class="pull-right"
                                    onclick="cartDelete(event,'{{ url('parent/cart/' . $item->id) }},{{ $item->rowId }}')">
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
                                <span>{{ $item->qty }} <a  href="javascript:void(0)" class="pull-right"
                                    onclick="cartDelete(event,'{{ url('parent/cart/' . $item->id) }},{{ $item->rowId }}')">
                                     <em class="icon ni ni-trash"></em></a></span>
                            </div>
                            
                        </div>
                    @endif
                @endforeach
                </div>
              
                <div class="speedo-checkout">

                    <a class="btn text-white pull-left mr-2" style="background-color:#3097FF !important" href="#" data-dismiss="modal">Add More
                        Classes</a>
                    <a class="btn  text-white  pull-right" style="background-color:#3097FF !important" href="{{ url('parent/checkouts') }}">Checkout-></a>
                </div>


            </div>
        </div>

    </div>
    <!-- Modal | Cart View @s -->
@endsection
@section('scripts')
    <script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

    <script src="{{ asset('parent-assets/js/us-slider.js') }}"></script>
    <script>
        $('.class_type_select2').select2();
        $('.day_select2').select2();
        $('#class_select2').select2();
        $('#venue_select2').select2();
        $('#venue_select3').select2();
        $('#student_select2').select2();
        $('#term_select2').select2();

        $(document).ready(function() {
            if ($('#bbb_viewed_slider').length) {
                var viewedSlider = $('#bbb_viewed_slider');
                console.log(viewedSlider[0]);
                viewedSlider.owlCarousel({
                    loop: true,
                    margin: 30,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        575: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        991: {
                            items: 4
                        },
                        1199: {
                            items: 6
                        }
                    }
                });

                if ($('.bbb_viewed_prev').length) {
                    var prev = $('.bbb_viewed_prev');
                    prev.on('click', function() {
                        viewedSlider.trigger('prev.owl.carousel');
                    });
                }

                if ($('.bbb_viewed_next').length) {
                    var next = $('.bbb_viewed_next');
                    next.on('click', function() {
                        viewedSlider.trigger('next.owl.carousel');
                    });
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#close-cart").click(function() {
                $("#addNewStudent").css("display", "none");
            });
        });

        function selectStudent(e) {
            window.location.href = "{{ url('parent/manage-bookings?q=') }}" + e.target.value;
        }

        function selectVenue(e) {
            window.location.href = "{{ url('parent/manage-bookings?location=') }}" + $('#venue_select3').val();
        }
        let venue_location = $('#venue_select2').val() ? $('#venue_select2').val() : null;
        if (venue_location == null) {

            $('#exampleModalCenter').modal('show');
        }

        function hidePopup() {
            $(".welcome-container-bg").hide();
        }

    </script>
    <script>
        function scrollToDiv() {
            let h = window.innerHeight/2;
            var divPosition = document.getElementById('us-scroll').offsetTop;
            console.log('jfoiwe',h);
            window.scrollTo({
                //top: divPosition h - 50, /* set the offset value */
                top: h + 250, /* set the offset value */
                behavior: 'smooth' /* set the scroll behavior to smooth */
            });
        }
    </script>
@stop
