@if (!$records->isEmpty())
    <div class="row g-gs">
        @foreach ($records as $product)
            <div class="col-xxl-2 col-lg-2 col-sm-3">
                <div class="card card-bordered product-card"
                    style="object-fit: contain;
                                            aspect-ratio: 1/2;">
                    <div class="product-thumb" style="height: 250px; display: flex; justify-content: center;">
                        <a href="{{ url('parent/shops/' . $product->id) }}">
                            <img class="card-img-top" src="{{ $image_url . '/' . $product->getFirstImage() }}"
                                alt="" style="height: 100%; width: auto;">
                        </a>
                        <ul class="product-badges">
                            <li><span class="badge badge-success">{{ $product->status }}</span></li>
                        </ul>

                    </div>
                    <div class="card-inner text-center">

                        <h5 class="product-title" style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap"><a
                                href="{{ url('parent/shops/' . $product->id) }}">{{ $product->name }}</a>
                        </h5>
                        <div class="product-price text-primary h5"
                            style="ont-size: 14px;color: #0075ff !important;margin-bottom: 20px;">
                            <small class="text-muted del fs-13px"></small> AED
                            {{ $product->sale_price }}

                        </div>

                        <div class="us-add-to-cart"
                            style="width: 100%;float: left;display: flex;justify-content: center;margin-top: auto;flex-direction: column;">
                            <a href="javascript:void(0)" class="btn float-left btn-sm btn-dim btn-primary"
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
@else
    <div class="nk-block-head mb-4 mt-4 border">
        <div class="nk-block-head-content">
            <h5 class="title nk-block-title m-2 center">No Record Found</h4>
                <!-- <p>All classes schedule on selected date.</p> -->
        </div>
    </div>
@endif
