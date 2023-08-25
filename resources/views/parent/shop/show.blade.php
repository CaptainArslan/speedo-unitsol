@extends('parent.layouts.master')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <style>
        .carousel-indicators li {
            width: 130px;
            height: 100%;
            /* opacity: 0.8; */
        }
        .carousel-indicators li img {
            widows: 70%!important;
            height: 70px!important;
        }

        .carousel-indicators button[data-bs-target] {
            width: 200px;
        }
        

        .carousel-indicators button[data-bs-target]:not(.active) {
            /* opacity: 0.8; */
        }

        .carousel-indicators {
            position: static;
        }
    </style>
@stop
@section('content')
    <div class="us-profile-container" style="max-width: 1440px;margin: 0 auto;">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Product Details</h3>
                            <div class="nk-block-des text-soft">
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ url('parent/shops') }}"
                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ url('parent/shops') }}"
                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                    class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row pb-5">
                                <div class="col-lg-6">
                                    <div class="product-imgs">
                                        <!-- Carousel wrapper -->
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($images as $item)
                                                    @if ($loop->first)
                                                        <div class="carousel-item active">
                                                            <img src="{{ $image_url . '/' . $item->image }}"
                                                                class="d-block w-100" style="height:400px!important;object-fit:contain;" alt="...">
                                                        </div>
                                                    @else
                                                        <div class="carousel-item ">
                                                            <img src="{{ $image_url . '/' . $item->image }}"
                                                                class="d-block w-100" alt="..." style="height:400px!important;object-fit:contain;">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                            <ol class="carousel-indicators">
                                                @foreach ($images as $key => $item)
                                                    @if ($loop->first)
                                                        <li data-target="#carouselExampleIndicators"
                                                            data-slide-to="{{ $key }}" class="active">
                                                            <img style="object-fit:contain;" src="{{ $image_url . '/' . $item->image }}"
                                                                class="d-block w-100">
                                                        </li>
                                                    @else
                                                        <li data-target="#carouselExampleIndicators"
                                                            data-slide-to="{{ $key }}">
                                                            <img style="object-fit:contain;" src="{{ $image_url . '/' . $item->image }}"
                                                                class="d-block w-100">
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                        </div>

                                        <!-- Carousel Navigatiom -->

                                    </div>
                                    <!-- card right -->
                                </div><!-- .col -->
                                <div class="col-lg-6">
                                    <div class="product-info mt-5 mr-xxl-5">
                                        <h4 class="product-price text-primary">{{ 'AED ' . $product->sale_price }}</h4>
                                        <h2 class="product-title">{{ $product->name }}</h2>
                                        <div class="product-excrept text-soft">
                                            <p class="lead">{{ $product->description }}</p>
                                        </div>
                                        <div class="product-meta">
                                            <h6 class="title">Size</h6>
                                            <ul class="custom-control-group">
                                                @foreach ($product->productSizes as $key=>$size)
                                                    <li>
                                                        <div
                                                            class="custom-control custom-radio custom-control-pro no-control">
                                                            <input type="radio" class="custom-control-input"
                                                                name="sizeCheck" id="sizeCheck{{ $key}}" checked>
                                                            <label class="custom-control-label"
                                                                for="sizeCheck{{ $key }}">{{ $size->name }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div><!-- .product-meta -->
                                        <div class="product-meta">
                                            <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                                {{-- <li class="w-140px">
                                                    <div class="form-control-wrap number-spinner-wrap">
                                                        <button
                                                            class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                            data-number="minus"><em class="icon ni ni-minus"></em></button>
                                                        <input type="number" class="form-control number-spinner"
                                                            value="0">
                                                        <button
                                                            class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                            data-number="plus"><em class="icon ni ni-plus"></em></button>
                                                    </div>
                                                </li> --}}
                                                <li>
                                                    <button class="btn btn-primary"
                                                        onclick="addToCart(event,'{{ url('parent/add-to-cart-product/' . $product->id) }}')">Add
                                                        to Cart</button>
                                                </li>
                                            </ul>
                                        </div><!-- .product-meta -->
                                    </div><!-- .product-info -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                            <hr class="hr border-light">

                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
@stop
