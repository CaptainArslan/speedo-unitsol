@extends('parent.layouts.master')
@section('style')
    <style>
        .sup-tag {
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
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Products</h3>
                        </div><!-- .nk-block-head-content -->

                        <div class="nk-block-head-content">

                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text"
                                                    onkeyup="searchProduct(event,'{{ url('parent/search-product') }}')"
                                                    class="form-control" name="name"
                                                    placeholder="Search Product by Name">
                                            </div>
                                        </li>
                                        {{-- <li>
                                            <div class=" center-block" data-dismiss="modal" data-toggle="modal"
                                                data-target="#cartView">
                                                <div style="width: 100%;text-align: center;font-weight: 600;">
                                                    <div class="">
                                                        <div class="us-inner-add-student">
                                                            <div class="user-avatar sm"
                                                                style="border-radius: 30px!important; width: 80px;
                                                            height: 40px; background-color:#3097FF !important">
                                                                <em class="icon ni ni-cart "><sup
                                                                        class="sup-tag count">{{ Cart::count() }}</sup></em>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> --}}

                                    </ul>
                                </div>
                            </div>

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div id="filter-product">
                        <div class="row g-gs">
                            @foreach ($products as $product)
                                <div class="col-xxl-2 col-lg-2 col-sm-3">
                                    <div class="card card-bordered product-card"
                                        style="object-fit: contain;
                                            aspect-ratio: 1/2;">
                                        <div class="product-thumb"
                                            style="height: 250px; display: flex; justify-content: center;">
                                            <a href="{{ url('parent/shops/' . $product->id) }}">
                                                <img class="card-img-top"
                                                    src="{{ $image_url . '/' . $product->getFirstImage() }}" alt=""
                                                    style="height: 100%; width: auto;">
                                            </a>
                                            <ul class="product-badges">
                                                <li><span class="badge badge-success">{{ $product->status }}</span></li>
                                            </ul>

                                        </div>
                                        <div class="card-inner text-center">

                                            <h5 class="product-title"
                                                style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap"><a
                                                    href="{{ url('parent/shops/' . $product->id) }}">{{ $product->name }}</a>
                                            </h5>
                                            <div class="product-price text-primary h5"
                                                style="ont-size: 14px;color: #0075ff !important;margin-bottom: 20px;">
                                                <small class="text-muted del fs-13px"></small> AED
                                                {{ $product->sale_price }}

                                            </div>

                                            <div class="us-add-to-cart"
                                                style="width: 100%;float: left;display: flex;justify-content: center;margin-top: auto;flex-direction: column;">
                                                <a href="javascript:void(0)"
                                                    class="btn float-left btn-sm btn-dim btn-primary"
                                                    onclick="addToCart(event,'{{ url('parent/add-to-cart-product/' . $product->id) }}')"
                                                    style="width: 100%;background: #ff0000;color: #fff;">
                                                    <span>Add to Cart</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- .col -->
                            @endforeach
                        </div>


                    </div>
                </div><!-- .nk-block -->
                {{-- <div class="modal " id="cartView">
                    <div role="document">
                        <div class="us-cart-modal" style="padding: 25px;overflow-y: scroll;">
            
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
                                            <div style="font-size: 16px;font-weight: 500;">
                                                {{ $student->getFullName() }} </div>
                                            <div style="font-size: 16px;font-weight: 500;">{{ $item->name }} 
                                            </div>
                                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                                {{'Class: '. $class }} </div>
                                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                                {{'Location: '.$venue }} </div>
                                                
                                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                                {{'Start Date: '. $item->options->start_date }}
                                            </div> 
                                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                                {{'Day: '. $item->options->day }}
                                            </div>
                                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                                {{'Time: '. $item->options->time }} </div>
                                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;"><sup class="text-danger">*</sup> Lessons:
                                                {{ $item->options->no_of_class }} - {{ $item->options->time_total }} min
                                            </div>
                                           
                                                 
                                        </div>
                                       
                                        <div class="class-right-side">
                                            <sup class="text-danger">*</sup>
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
            
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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
@stop
