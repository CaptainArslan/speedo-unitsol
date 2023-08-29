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
        .us-dot {
            position: relative;
            display: inline-block;
            border-radius: 50%;
            height: 8px;
            width: 8px;
        }
        .sup-tag{
            font-family: 'Roboto';
            font-size: 13px;
            font-weight: 500;
        }
        .box_highlight{
            box-shadow:1px 1px 15px #ff0000 !important;
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
                                                Location <sup class="text-danger">*</sup></span>
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
                                                        <?php
                                                         $color=$student->assessmentRequest?->class?->color
                                                        ?>
                                                    <li>
                                                        <input type="checkbox"
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class="" name="student_id[]" value="{{ $student->id }}"
                                                            placeholder="Search Product by Name">
                                                        <div class="us-dot" style="background-color: {{$color}} !important;"></div>
                                                        {{ $student->name .' '.$student->last_name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="preview-list">
                                        <!-- Filter By Class Level -->
                                        <li class="preview-item">

                                            <span class="preview-title overline-title"><em class="icon ni ni-map-pin"></em>
                                                Filter By Term<sup class="text-danger">*</sup></span>
                                            <ul class="d-flex g-3">
                                                <li>
                                                    <div class="dropdown" style="width: 300px;">
                                                        <select name="term_id" id="term_select2" 
                                                            onchange="filterTerm(event,'post','{{ url('parent/filter-terms') }}','filter-form')"
                                                            class="select2 form-control">
                                                            <option value="">- Select term -</option>
                                                            @foreach ($filter_terms as $record)
                                                                <option value="{{ $record->id }}"  @if (request()->term == $record->id) selected @endif>{{ $record->name }}
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
                                                    Tuesday
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
                                        @foreach ($terms as $group_term_by_term_id)
                                         @foreach ($group_term_by_term_id->groupBy('swimming_class_id') as $group_term)
                                                <?php
                                                $term = $group_term->first();
                                                ?>
                                                <tr class="us-class-row-bg">
                                                    <td class="us-bottom-border">
                                                        {{ $term?->class->name }}
                                                        <br>
                                                        {{'('.$term->name .')'}}
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Options</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('parent/manage-bookings')}}" method="get">

                    <div class="modal-body">
                       <div class="form-group">
                        <select id="venue_select3" name="location" required class="select2 form-control">
                            <option value="">- Select Location - <sup class="text-danger">*</sup></option>
                            @foreach ($venues as $item)
                                <option value="{{ $item->id }}" >{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                       </div>
                       <div class="form-group">
                        <select id="term_select3" name="term" required class="select2 form-control">
                            <option value="">- Select term - <sup class="text-danger">*</sup></option>
                            @foreach ($filter_terms as $filter_term)
                                <option value="{{ $filter_term->id }}" >{{ $filter_term->name }}
                                </option>
                            @endforeach
                        </select>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Save
                            changes</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal | Cart View @s -->
    
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
        $('#term_select3').select2();

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
            $('.modal_close').modal('hide');
            window.scrollTo({top:0,behavior:'smooth'});
        }

        function selectVenue(e) {
            window.location.href = "{{ url('parent/manage-bookings?location=') }}" + $('#venue_select3').val();
        }
        let venue_location = $('#venue_select2').val() ? $('#venue_select2').val() : null;
        let term_location = $('#term_select2').val() ? $('#term_select2').val() : null;
        if (venue_location == null || term_location == null) {

            $('#exampleModalCenter').modal('show');
        }

        function hidePopup() {
            $(".welcome-container-bg").hide();
        }

    </script>
    <script>
        function scrollToDiv(e,id) {
            let h = window.innerHeight/2;
            var divPosition = $('#us-scroll'+id).offsetTop;
            console.log('jfoiwe',h);
            window.scrollTo({
                //top: divPosition h - 50, /* set the offset value */
                top: h + 250, /* set the offset value */
                behavior: 'smooth' /* set the scroll behavior to smooth */
            });
            let selcid='us-scroll'+id;
            $('.box').each(function(i, obj) {
                let term_id=$(obj).attr('id');
                if(term_id == selcid){
                    $(obj).addClass('box_highlight')
                }
                else{
                    $(obj).removeClass('box_highlight')
                }

            });
        }
    </script>
@stop
