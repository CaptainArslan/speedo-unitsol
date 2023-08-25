<div class="us-footer-student">
    <div style="width: 100%;text-align: center;font-weight: 600;">
        <div class="">

            <div class="us-inner-add-student" data-dismiss="modal" data-toggle="modal" data-target="#addNewStudent">
                <object class="cart-icon" data="{{ asset('parent-assets/images/my-cart.svg') }}" width="19"
                    height="17"> </object>
                <div class="cart-total-items"> {{ Cart::count() }} </div>
                <div class="cart-left">View Cart</div>
            </div>
        </div>
    </div>
</div>

<div class="us-footer">
    <div style="width: 100%;float: left;color: #ffffff !important;">
        <div class="">
            <div class="us-inner-data"> <span style="font-weight: 600;">&copy; 2022 Speedo Swim Squad. </span>
                <!--Desinged & Developed by <a href="https://unitxsol.com/" target="_blank">UnitSol</a>-->
            </div>
        </div>
    </div>
</div>
<div class="modal " id="addNewStudent">
    <div  role="document">
        <div class="us-cart-modal" style="padding: 25px;">
        
            <a href="#" class="close" id="close-cart" >
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Items in cart</h5>
            </div>
            
            @foreach (Cart::content() as $item)
                @if ($item->options->type != 'product')
                    <div class="speedo-class">
                        <div class="class-left-side">
                            <div style="font-size: 16px;font-weight: 500;">{{ $item->name }}</div>
                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                {{ $item->options->start_date }} -
                                {{ $item->options->end_date }}</div>
                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
                                {{ $item->options->time }}</div>
                            <div style="width: 100%;font-size: 12px;color: #949494;float: left;">Lessons:
                                {{ $item->options->no_of_class }} - {{ $item->options->time_total }} min
                                each
                            </div>
                        </div>
                        <div class="class-right-side">
                            <div class="class-price">AED {{ $item->price }}</div>
                        </div>
                    </div>
                @else
                    <div class="mt-2 speedo-product">
                        <?php
                        $image_url = env('APP_IMAGE_URL') . 'product';
                        ?>
                        <div class="product-left">
                            <img src="{{ $image_url . '/' . $item->options->image }}" width="40" height="auto"
                                style="overflow: hidden;" />
                            <span style="font-size: 15px;font-weight: 500;">{{ $item->name }}</span>
                        </div>

                        <div class="product-right">
                            <span>AED {{ $item->price }}</span>
                            <span>X</span>
                            <span>{{ $item->qty }}</span>
                        </div>
                    </div>
                @endif
            @endforeach
            @if (count(Cart::content()) > 0)
            <div class="speedo-checkout">
                <a href="{{ url('parent/checkouts') }}">Checkout-></a>
            </div>
            @endif

        </div>
    </div>
</div>
