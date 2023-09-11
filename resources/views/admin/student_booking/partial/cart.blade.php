<div class="nk-add-product toggle-slide toggle-slide-right w-45" data-content="addProduct" id="addClass" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em style="font-size:1.5rem" class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title"> Your Cart </h5>
            <!-- <div class="nk-block-des">
                <p>You can add as many assessment as you want.</p>
            </div> -->
        </div>
    </div><!-- .nk-block-head -->
    <hr>
    <div class="nk-block">
        <div class="row g-3">
            <div class="col-12">

                <div class="form-group">
                    <div class="row gx-2">
                        <div class="w-100" id="cart_detail">
                            <div class="col-12">
                                <div>
                                    @if (Cart::count() > 0)
                                    @foreach (Cart::content() as $item)
                                    <?php
                                    if ($item->options->type == 'term') {
                                        $student = App\Models\Student::find($item->options->student_id);
                                        $term = App\Models\TermBaseBooking::find($item->id);
                                        $venue = $term->venue?->name;
                                        $class = $term->class?->name;
                                    }
                                    ?>
                                    <div class="p-2">
                                        @if ($item->options->type != 'product')
                                        <div class="row justify-content-between align-items-center">
                                            <div class="class-left-side">
                                                <div class="font-weight-bold">{{ $student->getFullName() }}</div>
                                                <div class="font-weight-bold">{{ $item->name }}</div>
                                                <div class="class-details">
                                                    <div>
                                                        <span class="text-muted">Class:</span> {{ $class }}
                                                    </div>
                                                    <div>
                                                        <span class="text-muted">Location:</span> {{ $venue }}
                                                    </div>
                                                    <div>
                                                        <span class="text-muted">Start Date:</span> {{ $item->options->start_date }}
                                                    </div>
                                                    <div>
                                                        <span class="text-muted">Day:</span> {{ $item->options->day }}
                                                    </div>
                                                    <div>
                                                        <span class="text-muted">Time:</span> {{ $item->options->time }}
                                                    </div>
                                                    <div>
                                                        <sup class="text-danger">*</sup>
                                                        <span class="text-muted">Lessons:</span>
                                                        {{ $item->options->no_of_class }} - {{ $item->options->time_total }} min
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="class-right-side">
                                                <div class="class-price">
                                                    AED {{ $item->price }}
                                                    <a href="javascript:void(0)" onclick="adminCartDelete(event, '{{ url('admin/cart/' . $item->id) }},{{ $item->rowId }}')" class="btn btn-link text-danger">
                                                        <em class="icon ni ni-trash"></em>
                                                    </a>
                                                </div>
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
                                                <span>{{ $item->qty }}
                                                    <a href="javascript:void(0)" class="pull-right" onclick="adminCartDelete(event,'{{ url('admin/cart/' . $item->id) }},{{ $item->rowId }}')">
                                                        <em class="icon ni ni-trash"></em>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- <script>
                                            $('#displayClassDetail' + @json($item -> id)).modal('show');
                                        </script> -->
                                    </div>
                                    @endforeach
                                    <script>
                                        $(".count").fadeOut(400, function() {
                                            $(this).text(0).fadeIn(400);
                                        });
                                    </script>
                                    @endif
                                </div>
                            </div>
                            @if (count(Cart::content()) > 0)
                            <div class="speedo-checkout">
                                {{-- <a href="{{ url('/admin/students/'.$id.'/checkout') }}" class="btn btn-primary">Checkout</a> --}}
                                <a href="{{ url('admin/customer-informations/'. $student->user->id .'/checkout') }}" class="btn btn-primary">Checkout</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->