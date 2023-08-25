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
@stop
@section('content')
    <div class="us-profile-container" style="max-width: 1440px;margin: 0 auto;">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head nk-block-head-md">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Make Bookings</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <div class="form-group">
                                        <label class="form-label">Students<sup class="text-danger">*</sup></label>
                                        <div class="form-control-wrap">
                                            <select name="status" onchange="selectStudent(event)"
                                                class="select2 form-control" data-search="on">
                                                <option value="" selected>- Select Student -</option>
                                                @foreach ($students as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if (request()->q == $item->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->

                    <!-- All Class Filters -->
                    <div class="nk-block nk-block-lg">
                        <form id="filter-form">
                            <div class="card" style="border-bottom: 1px solid #cfcfcf;">
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
                                                        <select name="venue_id" id="venue"
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class="select2 form-control">
                                                            <option value="">- Select Location -</option>
                                                            @foreach ($venues as $item)
                                                                <option value="{{ $item->id }}"
                                                                    location="{{ $item->name }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>
                                        <!-- Filter By Class Level -->
                                        <li class="preview-item">
                                            <span class="preview-title overline-title"><em
                                                    class="icon ni ni-list-thumb"></em>Filter Class
                                                Level</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-light"
                                                            data-toggle="dropdown">Select Class Level</a>
                                                        <div class="dropdown-menu">
                                                            <ul class="preview-list">
                                                                <!-- Select Levels -->
                                                                <li class="preview-item">
                                                                    <div class="dropdown-preview">
                                                                        <div class="dropdown-menu">
                                                                            <ul class="link-tidy">
                                                                                @if (isset($classes))
                                                                                    @foreach ($classes as $class)
                                                                                        <li>
                                                                                            <div class="custom-control custom-control-sm custom-radio  swimming_class"
                                                                                                swimming_class="{{ $class->name }}">
                                                                                                <input type="radio"
                                                                                                    class="custom-control-input swimming_class"
                                                                                                    name="swimming_class_id"
                                                                                                    onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                                                                    swimming_class="{{ $class->name }}"
                                                                                                    value="{{ $class->id }}"
                                                                                                    id="radio-{{ $class->id }}">
                                                                                                <label
                                                                                                    class="custom-control-label"
                                                                                                    for="radio-{{ $class->id }}">
                                                                                                    <span
                                                                                                        class="badge badge-dot"
                                                                                                        style="color: {{ $class->color }}!important;"><span>{{ $class->name }}</span></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                @endif

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- Select Levels -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>

                                        <!-- Fileter By Days -->

                                        <!-- Filter By Time -->
                                        {{-- <li class="preview-item">
                                            <span class="preview-title overline-title">Filter By Time</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-light"
                                                            data-toggle="dropdown">Select Time Slot</a>
                                                        <div class="dropdown-menu">
                                                            <!-- Time Cards -->
                                                            <ul class="link-tidy no-bdr">
                                                                <ul class="custom-control-group">
                                                                    @foreach ($timings as $timing)
                                                                        <li>
                                                                            <div
                                                                                class="custom-control custom-checkbox custom-control-pro no-control timings"  timing="{{ $timing->name .' '.date('h:i A', strtotime($timing->start_time)) . ' - ' . date('h:i A', strtotime($timing->end_time)) }}.">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input timing"
                                                                                    name="timing_id[]"
                                                                                    timing="{{ $timing->name .' '.date('h:i A', strtotime($timing->start_time)) . ' - ' . date('h:i A', strtotime($timing->end_time)) }}."
                                                                                    value={{ $timing->id }}
                                                                                    id="btnCheck{{ $timing->id }}">
                                                                                <label class="custom-control-label"
                                                                                    for="btnCheck{{ $timing->id }}">
                                                                                    <div class="card-inner">
                                                                                        <h5 class="card-title">
                                                                                            {{ $timing->name }}</h5>
                                                                                        <p class="card-text">
                                                                                            {{ date('h:i A', strtotime($timing->start_time)) }}
                                                                                            -
                                                                                            {{ date('h:i A', strtotime($timing->end_time)) }}.
                                                                                        </p>
                                                                                    </div>
                                                                                </label>

                                                                            </div>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                            </ul>
                                                            <!-- Time Cards -->
                                                        </div>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li> --}}
                                        <!-- Filter By Time -->

                                        <!-- Filter By Class Type -->
                                        <li class="preview-item">
                                            <span class="preview-title overline-title"><em
                                                    class="icon ni ni-tile-thumb"></em>Filter Class
                                                Type</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-light"
                                                            data-toggle="dropdown">Select Class Type</a>
                                                        <div class="dropdown-menu">
                                                            <ul class="link-tidy sm">
                                                                @foreach ($class_types as $item)
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox class_types"
                                                                            class_type="{{ $item->name }}">
                                                                            <input type="checkbox"
                                                                                value="{{ $item->id }}"
                                                                                onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                                                class="custom-control-input class_type"
                                                                                name="class_type_id[]"
                                                                                id="cb-{{ $item->id }}"
                                                                                class_type="{{ $item->name }}">
                                                                            <label class="custom-control-label"
                                                                                for="cb-{{ $item->id }}">{{ $item->name }}</label>
                                                                        </div>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>
                                        <!-- Fileter By Days -->
                                        <li class="preview-item">
                                            <span class="preview-title overline-title"><em
                                                    class="icon ni ni-calender-date"></em>Filter By Days</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-light"
                                                            data-toggle="dropdown"> Select Days</a>
                                                        <div class="dropdown-menu">
                                                            <ul class="link-tidy">
                                                                @foreach ($days as $day)
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox "
                                                                            day="{{ $day->name }}">
                                                                            <input type="checkbox"
                                                                                onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                                                name="day_id[]" day="{{ $day->name }}"
                                                                                value="{{ $day->id }}"
                                                                                class="custom-control-input days"
                                                                                id="cb-{{ $day->name }}">
                                                                            <label class="custom-control-label"
                                                                                for="cb-{{ $day->name }}">{{ $day->name }}</label>
                                                                        </div>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li>
                                        <!-- Filter By Class Type -->



                                        {{-- <li class="preview-item">
                                            <span class="preview-title overline-title">Filter By
                                                Season</span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown">
                                                        <select name="" id=""
                                                            class="select form-control">
                                                            <option value="">select season</option>
                                                        </select>
                                                    </div>
                                                </li><!-- li -->
                                            </ul>
                                        </li> --}}
                                        <!-- Filter By Class Level -->
                                        <li class="preview-item">
                                            <span class="preview-title overline-title"> <em
                                                    class="icon ni ni-filter"></em> Filter Record </span>
                                            <button type="button"
                                                onclick="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                class="btn  btn-primary"><span>Filter</span></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row filter-row mb-2">
                                    <div class="col-md-12 col-sm-12 mt-md-4 mt-4">
                                        <div class="col-md-2 clearall-filter float-right ">
                                            <span role="button" onclick="removeAllBage()"
                                                class="justify-content-center d-flex text-primary"><u>Clear All
                                                    Filters</u>
                                            </span>
                                        </div>
                                        <div id="badge">

                                        </div>

                                    </div>
                                </div>
                            </div><!-- .card-preview -->

                        </form>

                    </div><!-- .nk-block -->
                    <!-- All Class Filters -->
                    <!-- Class Types -->
                    {{-- <div id="filter-term"> --}}
                    <div id="filter-term" class="nk-block nk-block-lg pt-4">

                        @if (isset($terms) && !$terms->isEmpty())
                            @foreach ($class_types as $class_type)
                                <?php
                                $check = $terms->where('class_type_id', $class_type->id);
                                ?>
                                <div class="nk-block-head mb-4 mt-4">
                                    @if (isset($check) && !$check->isEmpty())
                                        <div class="nk-block-head-content">
                                            <h5 class="title nk-block-title">{{ $class_type->name }}</h4>
                                                <!-- <p>All classes schedule on selected date.</p> -->
                                        </div>
                                    @endif
                                </div>
                                <?php
                                ?>

                                <div class="row g-gs">
                                    @foreach ($terms as $key => $term)
                                        @if ($class_type->id == $term->class_type_id)
                                            <?php
                                            $total_slot = $term->tolalSlotBooked();
                                            ?>
                                            <!--<div class="col-sm-6 col-xl-3">-->
                                            <div class="col-3 col-sm-3">
                                                <div class="card card-bordered">

                                                    <div class="us-card">
                                                        <div class="us-venue-image">
                                                            <span
                                                                style="bottom: 3px;position: absolute;padding: 10px;padding: 10px;font-size: 12px;color: #fff;z-index: 1;">
                                                                <strong>{{ $term->venue->name }}</strong>
                                                            </span>

                                                            <span
                                                                style="top: 11px;right: 12px;position: absolute;background: #fff;color: #ff0000;font-size: 10px;padding: 2px 8px;border-radius: 10px;font-weight: 500;">
                                                                @foreach ($term->termBaseBookingDaysParent as $item)
                                                                    {{ $item->day->name }}
                                                                @endforeach
                                                            </span>

                                                            <strong
                                                                style="top: 12px;left: 12px;position: absolute;background: #fff;color: #ff0000;font-size: 10px;padding: 2px 8px;border-radius: 10px;font-weight: 500;">
                                                                {{ $term->timing->name . ' at ' . date('h:i A', strtotime($term->timing->start_time)) }}
                                                            </strong>

                                                            <div class="us-gradient">

                                                            </div>
                                                            @if ($term->venue?->image)
                                                                <img
                                                                    src="{{ $venue_image_url . '/' . $term->venue->image }}" />
                                                            @else
                                                                <img
                                                                    src="{{ asset('parent-assets/images/empty-venue.jpeg') }}" />
                                                            @endif
                                                        </div>
                                                        <div class="us-card-data">
                                                            <!--<div class="user-avatar lg bg-gray-dim">-->
                                                            <!--    <span>{{ substr($term->name, 0, 1) }}</span>-->
                                                            <!--    <div class="status dot dot-lg dot-success"></div>-->
                                                            <!--</div>-->
                                                            <div class="user-info" style="text-align: left;">
                                                                {{-- @dd($schedule) --}}
                                                                <h6>{{ $term->name }}
                                                                </h6>
                                                                <span>{{ $term->class->name . ' ' }}</span>
                                                                <hr />
                                                            </div>

                                                            <span>
                                                                Slots Booked{{ $total_slot }}/{{ $term->no_of_student }}
                                                            </span>
                                                            <?php
                                                            $total = ($total_slot / $term->no_of_student) * 100;
                                                            // dd(round($total,0));
                                                            $price = $term->class->price * $term->no_of_class;
                                                            $discount = ($price * $term->discount) / 100;
                                                            $term_price = $price - $discount;
                                                            $booked_term = App\Models\StudentTerm::where('term_id', $term->id)
                                                                ->where('type', 'term')
                                                                ->where('student_id', request()->q)
                                                                ->first();
                                                            
                                                            ?>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped @if ($total == 100) bg-success @else bg-danger @endif"
                                                                    data-progress="{{ $total }}">
                                                                </div>
                                                            </div>

                                                            <div class="us-data-list">
                                                                <span>{{ ' ' . date('F d, Y', strtotime($term->start_date)), ' ' }}</span>
                                                                <span> -
                                                                    {{ ' ' . date('F d, Y', strtotime($term->end_date)) }}</span>
                                                            </div>

                                                            <div class="us-data-list">
                                                                <span>Lessons: </span>
                                                                <span class="us-aed"> {{ $term->no_of_class }} |
                                                                    {{ $term->time_difference }} min each</span>
                                                            </div>

                                                            <div class="us-data-list">
                                                                <span>Fee: </span>
                                                                <span class="us-aed">AED{{ $term->total }}</span>
                                                            </div>
                                                        </div>

                                                        {{-- @dd($schedule->timing) --}}
                                                        <!--<ul class="team-info">-->
                                                        <!--    <li><span class="sub2-text">Start-->
                                                        <!--            Date{{ ' ' . $term->start_date, ' ' }}</span>-->
                                                        <!--        <span class="sub2-text">End-->
                                                        <!--            Date{{ ' ' . $term->end_date }}</span>-->
                                                        <!--    </li>-->
                                                        <!--    <li><span>Lessons:-->
                                                        <!--            {{ $term->no_of_class }}</span><span>{{ $term->time_difference }}-->
                                                        <!--            min-->
                                                        <!--            each</span>-->
                                                        <!--    </li>-->
                                                        <!--    <li><span>Fee</span><span>AED-->
                                                        <!--            {{ $term->total }}</span></li>-->
                                                        <!--</ul>-->
                                                        <?php
                                                        $term_check = false;
                                                        foreach ($carts as $cart) {
                                                            if ($cart->id == $term->id && $cart->options->student_id == request()->q && ($cart->options->type = 'term')) {
                                                                $term_check = true;
                                                            }
                                                        }
                                                        // dd($term_check);
                                                        ?>
                                                        <div class="team-view" style="padding-bottom: 18px;">
                                                            @if (request()->q)
                                                                @if (is_null($booked_term))
                                                                    @if ($total_slot < $term->no_of_student)
                                                                        <a href="javascript:void(0)"
                                                                            @if ($term_check == false) onclick="addToCart(event,'{{ url('parent/add-to-cart-term/' . $term->id . '-' . $request->q) }}')" @endif
                                                                            class="btn float-left btn-sm btn-dim btn-primary"><span>
                                                                                @if ($term_check == true)
                                                                                    Class added to
                                                                                    cart
                                                                                @else
                                                                                    Add To Cart
                                                                                @endif
                                                                            </span></a>
                                                                    @endif
                                                                @else
                                                                    <a
                                                                        href="javascript:void(0)"class="btn float-left btn-sm btn-dim btn-primary"><span>Already
                                                                            Booked</span></a>
                                                                @endif
                                                            @else
                                                                <a href="javascript:void(0)"
                                                                    class="btn float-left btn-sm btn-dim btn-primary"><span>First
                                                                        Select Student</span></a>
                                                            @endif
                                                            @if (!$term->termBaseBookingPackages->isEmpty())
                                                                <a class="btn btn-sm btn-dim btn-success float-right ml-2 dropdown"
                                                                    data-toggle="collapse"
                                                                    href="#demo{{ $term->id }}" type="button">
                                                                    Show Packages
                                                                </a>
                                                            @endif
                                                        </div>

                                                    </div><!-- .card -->
                                                    @foreach ($term->termBaseBookingPackages as $term_package)
                                                        <div class="card card-bordered collapse m-2"
                                                            style="background-color: rgba(0,0,0,.05)"
                                                            id="demo{{ $term->id }}">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $term_package->name }}</h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                    {{ $term->timing->name . ' at ' . date('h:i A', strtotime($term->timing->start_time)) }}
                                                                </h6>

                                                                <span class="sub-text"><strong>Start Date
                                                                    </strong>{{ date('M d, Y', strtotime($term_package->start_date)) }}
                                                                    </br>
                                                                    <strong>End Date :</strong>
                                                                    {{ date('M d, Y', strtotime($term_package->end_date)) }}</span>
                                                                <span class="sub-text">
                                                                    <strong>Lessons: </strong>
                                                                    <span>
                                                                        {{ $term_package->no_of_class }}
                                                                        {{ $term->time_difference }}
                                                                        min
                                                                        each
                                                                    </span>
                                                                </span>
                                                                <span class="sub-text">
                                                                    <strong>Fee : </strong>AED {{ $term_package->total }}
                                                                </span>
                                                                <?php
                                                                $check = false;
                                                                foreach ($carts as $cart) {
                                                                    if ($cart->id == $term_package->id && $cart->options->student_id == request()->q && ($cart->options->type = 'package')) {
                                                                        $check = true;
                                                                    }
                                                                }
                                                                $booked_package = App\Models\StudentTerm::where('term_id', $term_package->id)
                                                                    ->where('type', 'package')
                                                                    ->where('student_id', request()->q)
                                                                    ->first();
                                                                ?>
                                                                @if ($request->q)
                                                                    @if (is_null($booked_package))
                                                                        @if ($total_slot < $term->no_of_student)
                                                                            <a href="javascript:void(0)"
                                                                                @if ($check == false) onclick="addToCart(event,'{{ url('parent/add-to-cart-package/' . $term_package->id . '-' . $term->id . '-' . $request->q) }}')" @endif
                                                                                class="btn btn-sm float-right btn-primary mt-4"><span>
                                                                                    @if ($check == true)
                                                                                        Class added to
                                                                                        cart
                                                                                    @else
                                                                                        Add To Cart
                                                                                    @endif
                                                                                </span></a>
                                                                        @endif
                                                                    @else
                                                                        <a
                                                                            href="javascript:void(0)"class="btn btn-sm float-right btn-primary mt-4"><span>Already
                                                                                Booked</span></a>
                                                                    @endif
                                                                @else
                                                                    <a href="javascript:void(0)"
                                                                        class="btn btn-sm float-right btn-primary mt-4"><span>First
                                                                            Select Student</span></a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>


                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        @else
                            <div class="nk-block-head mb-4 mt-4 border">
                                <div class="nk-block-head-content">
                                    <h5 class="title nk-block-title m-2 center">No Record Found</h4>
                                        <!-- <p>All classes schedule on selected date.</p> -->
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="nk-block nk-block-lg p-4">

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
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

    <script src="{{ asset('parent-assets/js/us-slider.js') }}"></script>
    <script>
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
    </script>
@stop
