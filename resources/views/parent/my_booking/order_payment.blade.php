@extends('parent.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Order Booking Payment</h3>
                        <div class="nk-block-des text-soft">
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <form id="payment-update">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="nk-content-wrap">
                            <div class="nk-block">
                                <!-- Product List @s -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Student</th>
                                                        <th>Venue</th>
                                                        <th>Day</th>
                                                        <th>Time</th>
                                                        <th>Lessons</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                @if (!empty($order))
                                                <tbody>
                                                    <?php
                                                    $sub_total = 0;
                                                    $i = 1;
                                                    ?>
                                                    <?php
                                                    $total = 0;
                                                    $student_discount = [];
                                                    ?>
                                                    @foreach ($order->orderDetail as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>
                                                            @if ($item->type == 'product')
                                                            <div class="user-avatar sq">
                                                                <img src="{{ $image_url . '/' . $item->product->getFirstImage() }}" alt="" class="thumb">
                                                            </div>
                                                            @else
                                                            <div class="user-avatar sq bg-gray-dim">
                                                                <span>{{ substr($item->name, 0, 1) }}</span>
                                                            </div>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        @foreach ($item->studentTerms->where('status', 'on') as $student_term)
                                                        <td>
                                                            {{ $student_term->student ? $student_term->student->name : '' }}
                                                        </td>
                                                        @if ($student_term->type == 'term')
                                                        <td>{{ $student_term->term->venue->name }}</td>
                                                        <td>{{ $student_term->day }}</td>
                                                        <td>
                                                            {{ $student_term->term?->timing->name . ' at ' . date('h:i A', strtotime($student_term->term?->timing->start_time)) }}
                                                        </td>
                                                        <td>
                                                            {{ $student_term->no_of_class }}
                                                        </td>
                                                        <td>
                                                            {{ date('M d, Y', strtotime($item->created_at)) }}
                                                        </td>
                                                        <td>{{ date('M d, Y', strtotime($student_term->term?->end_date)) }}
                                                        </td>
                                                        @endif
                                                        @if ($student_term->type == 'package')
                                                        <td>{{ $student_term->package?->term->venue->name }}
                                                        </td>
                                                        <td>{{ $student_term->package?->term->dayNames() }}
                                                        </td>
                                                        <td>{{ $student_term->package?->term->timing->name . ' at ' . date('h:i A', strtotime($student_term->package?->term->timing->start_time)) }}
                                                        </td>
                                                        <td>{{ $student_term->package?->no_of_class }}
                                                        </td>
                                                        <td>
                                                            {{-- date('M d, Y', strtotime($student_term->package?->start_date)) --}}
                                                            {{ date('M d, Y', strtotime($item->created_at)) }}
                                                        </td>
                                                        <td>{{ date('M d, Y', strtotime($student_term->package?->end_date)) }}
                                                        </td>
                                                        @endif
                                                        <td>{{ $item->price }}
                                                        </td>
                                                        <td>{{ $item->qty }}
                                                        </td>
                                                        <td>{{ $item->price }}
                                                        </td>
                                                        @endforeach
                                                        @if ($item->type == 'product')
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $item->price }}
                                                        </td>
                                                        <td>{{ $item->qty }}
                                                        </td>
                                                        <td>{{ $item->price * $item->qty }}
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                    $sub_total += $item->price * $item->qty;
                                                    ?>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="9" class="border-0 ">
                                                        </td>
                                                        <td colspan="3" class="border-0 ">
                                                            <h6>Sub Total
                                                            </h6>
                                                        </td>
                                                        <td>
                                                            {{ $sub_total }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" class="border-0">
                                                        </td>
                                                        <td colspan="3">
                                                            <h6>Discount
                                                            </h6>
                                                        </td>
                                                        <td>
                                                            {{ $order->discount }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" class="border-0 ">
                                                        </td>
                                                        <td colspan="3">
                                                            <h6>Tax</h6>
                                                        </td>
                                                        <td> {{ $order?->tax }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" class="border-0 ">
                                                        </td>
                                                        <td colspan="3">
                                                            <h6>Total</h6>
                                                        </td>
                                                        <td>AED
                                                            {{ $sub_total + $order?->tax - $order->discount }}
                                                        </td>
                                                    </tr>

                                                </tfoot>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-preview">
                        <div class="nk-content-wrap">
                            <div class="nk-block">
                                <div class="container">
                                    <div class="row mt-4 mb-4">
                                        <div class="col-xl-6">
                                            <div class="card card-bordered">
                                                <div class="card-inner-group">
                                                    <div class="card-inner">
                                                        <div class="sp-plan-head-group">
                                                            <div class="sp-plan-head">
                                                                <h6 class="title text-danger">Remaining Balance: AED {{ $order->CustomerOrderBalance->last()?->balance }}</h6>
                                                                @if ($order->CustomerOrderBalance->last()?->balance != 0)
                                                                <h6 class="title">Enter Amount to Pay</h6>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card-inner-group">
                                                @if ($order->CustomerOrderBalance->last()?->balance != 0)
                                                <!-- <div class="card-inner">
                                                            <div class="form-row align-items-center">
                                                                <div class="col-sm-5 my-1">
                                                                    <label class="sr-only" for="payment-amount">Amouont</label>
                                                                    <input type="number" class="form-control" name="payment_amount" id="payment-amount" placeholder="Jane Doe" min="1" max="{{ $order->CustomerOrderBalance->last()?->balance }}">
                                                                </div>
                                                                <div class="col-sm-5 my-1">
                                                                    <label class="sr-only" for="payment-type">Payment Type</label>
                                                                    <select name="payment_type" id="payment-type" class="form-control select2">
                                                                        <option value="">Please Select</option>
                                                                        <option value="cash">Cash</option>
                                                                        <option value="card">Card</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <button type="button" class="btn btn-primary" onclick="orderPaymentUpdate(event, 'post', '{{ url('parent/order/'.$order->id.'/payment/update')}}', '{{ url('parent/order_payment/'.$order->id)}}', 'payment-update')"> Submit</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                <div class="card card-bordered">
                                                    <div class="card-inner-group">
                                                        <div class="card-inner">
                                                            <div class="sp-plan-head-group">
                                                                <div class="sp-plan-head">
                                                                    <h6 class="title">Payment</h6>
                                                                </div>
                                                            </div>

                                                            <div class="sp-plan-payopt" id="card-payment">
                                                                <div class="mb-3">
                                                                    <span for="payment_amount">Enter Amount to Pay </span>
                                                                    <input type="number" class="form-control" name="payment_amount" value="0" min="100" max="{{ $order->CustomerOrderBalance->last()?->balance }}">
                                                                    <input type="hidden" class="form-control" name="max_amount" value="{{ $order->CustomerOrderBalance->last()?->balance }}">
                                                                </div>
                                                                <div class="cc-pay">
                                                                    {{-- <h6 class="title">Pay With</h6> --}}
                                                                    <ul class="cc-pay-method">
                                                                        <li class="cc-pay-dd dropdown" style="min-width: 240px !important">
                                                                            @if ($payment_informations->isEmpty())
                                                                            <a href="{{ url('parent/payment/?q=1') }}" class="btn btn-white border">
                                                                                <span class="cc-pay-item-name">
                                                                                    <span class="cc-pay-item-method-new">Add
                                                                                        New Credit
                                                                                        Card</span>
                                                                                </span>
                                                                            </a>
                                                                            @else
                                                                            @if (!is_null($latest_payment))
                                                                            <a href="#" class="btn btn-white btn-outline-light dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                                                                                <input type="checkbox" checked name="user_payment_information_id" value="{{ $latest_payment->id }}" class="from-control mr-2">
                                                                                <em class="icon ni ni-visa"></em>
                                                                                <span><span class="cc-pay-star">****
                                                                                        **** ****</span> 4242</span>
                                                                            </a>
                                                                            @else
                                                                            @foreach ($payment_informations->take(1) as $item)
                                                                            <a href="#" class="btn btn-white btn-outline-light dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                                                                                <input type="checkbox" checked name="user_payment_information_id" value="{{ $item->id }}" class="from-control mr-4">
                                                                                <em class="icon ni ni-visa"></em>
                                                                                <span><span class="cc-pay-star">****
                                                                                        **** ****</span> 4242</span>
                                                                            </a>
                                                                            @endforeach
                                                                            @endif
                                                                            @endif
                                                                            <div class="dropdown-menu dropdown-menu-auto" style="">
                                                                                <ul class="link-list-plain">
                                                                                    @foreach ($payment_informations as $item)
                                                                                    @if ($item->id != $latest_payment?->id)
                                                                                    <li>
                                                                                        <a class="cc-pay-item">
                                                                                            <input type="checkbox" name="user_payment_information_id" value="{{ $item->id }}" class="from-control mr-4">
                                                                                            <em class="cc-pay-item-icon icon ni ni-cc-visa"></em>
                                                                                            <span class="cc-pay-item-name">
                                                                                                <span class="cc-pay-item-method"><span class="cc-pay-star">****
                                                                                                        **** ****</span>
                                                                                                    4242</span>
                                                                                                <span class="cc-pay-item-meta">Card
                                                                                                    Added
                                                                                                    {{ $item->created_at->format('M d,Y') }}</span>
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    @endif
                                                                                    @endforeach
                                                                                    <li>
                                                                                        <a href="{{ url('parent/payment?q=1') }}" class="cc-pay-item">
                                                                                            <span class="cc-pay-item-name">
                                                                                                <span class="cc-pay-item-method-new">Add
                                                                                                    New Credit
                                                                                                    Card</span>
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner">
                                                            <label class=" text-blue" for="term_condition">Agree Term & Conditions : <input type="checkbox" name="term_condition" id="term_condition"> </label>
                                                            <div class="sp-plan-head-group">

                                                                <div class="sp-plan-amount">
                                                                    {{-- @if (!$payment_informations->isEmpty()) --}}
                                                                    <button type="button" onclick="orderPaymentUpdate(event, 'post', '{{ url('parent/order/'.$order->id.'/payment/update')}}', '{{ url('parent/order_payment/'.$order->id)}}', 'payment-update')" class="btn btn-secondary">
                                                                        {{-- <button type="button" onclick="addCheckout(event,'post','{{ url('parent/checkouts') }}','{{ url('parent/my-bookings') }}','add-checkout')" class="btn btn-secondary"> --}}
                                                                        <span id="btn-payment">Pay Now</span>
                                                                        <em class="icon ni ni-arrow-long-right"></em>
                                                                    </button>
                                                                    {{-- @endif --}}
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-inner -->

                                                    </div><!-- .card-inner-group -->
                                                </div><!-- .card -->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Info & Pay Now -->

                    <div class="card card-preview">
                        <div class="nk-content-wrap">
                            <div class="nk-block">
                                <div class="nk-block nk-block-lg">
                                    <div class="card-body">
                                        <h5>Order Payment History</h5>

                                        <div class="table-responsive">
                                            <table id="cabintable" class=" table" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Amount Received</th>
                                                        <th>Balanace Remaining</th>
                                                        <th>Payment type</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $key = 1;
                                                    ?>
                                                    @foreach ($order->CustomerOrderBalance as $balance)
                                                    <tr>
                                                        <td>{{ $key }}</td>
                                                        <td>{{ $balance->order->getUserName() }}</td>
                                                        <td>AEB.{{ $balance->received_amount }}</td>
                                                        <td>AEB.{{ $balance->balance }}</td>
                                                        <td>{{ $balance->payment_type ?? 'N/A'}}</td>
                                                        <td>{{ $balance->created_at->format('d, M, Y') }}</td>
                                                    </tr>
                                                    <?php
                                                    $key++;
                                                    ?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product List @e -->
                            </div><!-- .nk-block -->
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.select2').select2();
</script>
<script src="{{ asset('parent-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
<script>
    // if (session('message')){
    //     showSuccess(session('message'))
    // }
</script>
@stop