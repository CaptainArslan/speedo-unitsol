@extends('parent.layouts.master')
@section('style')
<link rel="stylesheet" href="{{ asset('parent-assets/assets/css/jquery.bootstrap-touchspin.min.css') }}">
<style>
    .btn-primary {
        color: #fff;
        background-color: #ff0000;
        border-color: #ff0000;
    }

    .datatable-filter {
        display: none;
    }
</style>
@stop
@section('content')
<div class="us-profile-container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-content-wrap">
                <div class="nk-block-head nk-block-head-lg">
                    {{-- <div class="nk-block-head-sub"><button class="back-to" onclick="history.back()"><em
                                    class="icon ni ni-arrow-left"></em><span>Continue
                                    Shopping</span></a></div> --}}
                    <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Check out</h2>
                            <div class="nk-block-des">
                                <p>Your cart items will be removed in 24 hours.<span class="text-soft">(23h
                                        remaining)</span> <span class="text-primary"><em class="icon ni ni-info"></em></span></p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools justify-content-md-end g-4 flex-wrap">
                                <li class="order-md-last">
                                    @if (!$records->isEmpty())
                                    <a href="#" class="btn btn-auto btn-dim btn-danger" onclick="emptyCart(event,'{{ url('parent/empty-cart') }}')"><em class="icon ni ni-cross"></em><span>Empty
                                            Cart</span></a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <form id="add-checkout">
                        <div class="row">

                            <div class="col-xl-9">
                                <!-- Product List @s -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table id="cabintable" class="datatable-init-export nowrap table" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th></th>
                                                        <th colspan="2">Product Name</th>
                                                        <th>Student</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>No of Classes</th>
                                                        <th>Total Price</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>

                                                @if (!$records->isEmpty())
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $student_discount = [];
                                                    $ids = [];
                                                    $credit = 0;
                                                    ?>
                                                    @foreach ($records as $item)
                                                    <?php
                                                    if ($item->options->type == 'term') {
                                                        $term = App\Models\TermBaseBooking::find($item->id);
                                                        $time = $term->timing?->name . ' at ' . date('h:i A', strtotime($term->timing?->start_time));
                                                        $venue = $term->venue?->name;
                                                        $start_date = date('M d ,Y', strtotime($term->start_date));
                                                        $end_date = date('M d ,Y', strtotime($term->end_date));
                                                    } elseif ($item->options->type == 'package') {
                                                        $package = App\Models\TermBaseBookingPackage::find($item->id);
                                                        $time = $package->term->timing?->name . ' at ' . date('h:i A', strtotime($package->term->timing?->start_time));
                                                        $venue = $package->term->venue?->name;
                                                        $start_date = date('M d,Y', strtotime($package->start_date));
                                                        $end_date = date('M d,Y', strtotime($package->end_date));
                                                    }
                                                    // dd($term);
                                                    ?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td colspan="2">
                                                            @if ($item->options->type == 'product')
                                                            <div class="user-avatar sq">
                                                                <img src="{{ $image_url . '/' . $item->options->image }}" alt="" class="thumb">
                                                            </div>
                                                            @else
                                                            <div class="user-avatar sq bg-gray-dim">
                                                                <span>{{ substr($item->name, 0, 1) }}</span>
                                                            </div>
                                                            @endif
                                                        </td>
                                                        @if ($item->options->type != 'product')
                                                        <td>
                                                            {{ $item->name }}<br>
                                                            {{ $time }}<br>
                                                            {{ $venue }}<br>
                                                            {{ $start_date . ' to ' . $end_date }}
                                                            {{-- <span>SP230</span> --}}
                                                        </td>
                                                        @else
                                                        <td>
                                                            {{ $item->name }}
                                                        </td>
                                                        @endif
                                                        @if ($item->options->type != 'product')
                                                        <td>
                                                            <select required name="student_id" class="select2 student from-control">
                                                                {{-- <option value="">select student</option> --}}
                                                                {{-- @foreach ($students as $student) --}}

                                                                <?php

                                                                if ($ids != []) {
                                                                    // $student;
                                                                    foreach ($ids as $id) {
                                                                        if ($id != $item->options->student_id) {
                                                                            $student = $students->where('id', $item->options->student_id)->first();
                                                                            $ids[] = $student->id;
                                                                            $credit += $student->credit;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $student = $students->where('id', $item->options->student_id)->first();
                                                                    $ids[] = $student->id;
                                                                    $credit += $student->credit;
                                                                }

                                                                ?>

                                                                <option value="{{ $item->options->student_id . '.' . $item->rowId }}" selected>
                                                                    {{-- value="{{ $student->id . '.' . $item->rowId }}"> --}}
                                                                    {{ $student?->name }}
                                                                </option>
                                                                {{-- @endforeach --}}
                                                            </select>
                                                        </td>
                                                        @else
                                                        <td></td>
                                                        @endif
                                                        @if ($item->options->type == 'product')
                                                        <td><span>{{ $item->price }}</span></td>
                                                        @else
                                                        <td><span>{{ $item->options->price }}</span></td>
                                                        @endif
                                                        @if ($item->options->type == 'product')
                                                        <td>
                                                            <input type="text" value="{{ $item->qty }}" min="1" max="{{ $item->options->stock }}" class="form-control w-70px" onchange="quantityUpdate(this,event,'{{ url('parent/change-qty') }}','{{ $item->rowId }}')" name="demo_vertical">
                                                        </td>
                                                        @else
                                                        <td>
                                                            1
                                                        </td>
                                                        @endif
                                                        @if ($item->options->type != 'product')
                                                        <?php
                                                        $price = $item->options->price * $item->options->no_of_class;
                                                        $discount = ($price * $item->options->discount) / 100;
                                                        $term_price = $price - $discount;
                                                        ?>
                                                        <td><span>{{ $item->options->no_of_class }}</span>
                                                        </td>
                                                        <td><span>{{ $price }}</span></td>
                                                        @else
                                                        <td><span>0</span></td>
                                                        <td><span>{{ $item->price * $item->qty }}</span>
                                                        </td>
                                                        {{-- <td><span>0</span></td> --}}
                                                        @endif
                                                        {{-- <td><span>{{ $item->qty }}</span></td> --}}
                                                        <td>
                                                            <span>AED
                                                                {{ ' ' . $item->price * $item->qty }}</span>
                                                            <div class="m"></div><a href="javascript:void(0)" onclick="cartDelete(event,'{{ url('parent/cart/' . $item->id) }},{{ $item->rowId }}')">
                                                                <em class="icon ni ni-trash"></em></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                    ?>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>

                                                        <td colspan="5"></td>
                                                        <td colspan="4">Subtotal</td>
                                                        <?php
                                                        // $sub_value = explode(',', Cart::subtotal());
                                                        // // dd(Cart::subtotal());
                                                        // $sub_price = explode('.', $sub_value[0] . $sub_value[1]);
                                                        // $sub_total = round($sub_price[0], 2);
                                                        ?>
                                                        <td><strong>{{ 'AED ' . Cart::subtotal() }}</strong></td>
                                                    </tr>

                                                    <tr>
                                                        <?php

                                                        $value = explode(',', Cart::subtotal());

                                                        if (count($value) > 1) {
                                                            $price = explode('.', $value[0] . $value[1]);
                                                        } else {
                                                            $price = explode('.', $value[0]);
                                                        }

                                                        // dd($price);
                                                        $total_discount = round(($price[0] * $discount_apply) / 100, 2);
                                                        // $tolat_price = $price[0] - $discount;
                                                        ?>
                                                        <td colspan="5"></td>
                                                        <td class="text-success" colspan="4" id="discount_name">{{ $discount_name }}
                                                        </td>
                                                        <td class="text-success"><strong id="discount">{{ 'AED - ' . $total_discount }}</strong>
                                                        </td>
                                                    </tr>

                                                    <tr>

                                                        <td colspan="5"></td>
                                                        <td colspan="4">Annual Fee</td>

                                                        <td><strong>{{ 'AED ' . $annual_fee }}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5"></td>
                                                        <td colspan="4">VAT 5%</td>
                                                        <?php
                                                        // dd($price);
                                                        // $tax_value = explode(',', Cart::tax());
                                                        // $tax_price = explode('.', $tax_value[0]);
                                                        // $tax_total = round($tax_price[0], 2);
                                                        $total = round($price[0] - $total_discount + $annual_fee, 2);
                                                        // dd($tax_price);
                                                        $tax_total = round(($total * 5) / 100, 2);
                                                        ?>
                                                        <td id="tax">{{ 'AED ' . $tax_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <?php

                                                        // $value = explode(',', Cart::total());
                                                        // if (count($value) > 1) {
                                                        //     $price = explode('.', $value[0] . $value[1]);
                                                        // } else {
                                                        //     $price = explode('.', $value[0]);
                                                        // }
                                                        // $discount = ($price[0] * $discount_apply) / 100;
                                                        // $tolat_price = round($price[0] - $discount, 2);
                                                        $tolat_price = $total + $tax_total;
                                                        ?>
                                                        <td colspan="5"></td>
                                                        <td colspan="4">Grand Total</td>
                                                        <input type="number" hidden id="totalCart" value="{{ $price[0] }}">
                                                        <td><strong id="totalAmount">{{ 'AED ' . $tolat_price - $credit }}</strong>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                                @endif

                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div>

                                <!-- Product List @e -->
                            </div>
                            <!-- Card Info & Pay Now -->
                            <div class="col-xl-3">
                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="sp-plan-head-group">
                                                <div class="sp-plan-head">
                                                    <h6 class="title">Promo Code</h6>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" id="promo-code" name="promo_code" placeholder="Add Promo Code Here">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="sp-plan-head-group">
                                                <div class="sp-plan-amount">
                                                    @if (!$payment_informations->isEmpty())
                                                    <button type="button" onclick="checkPromoCode(event,'{{ url('parent/promo-code') }}')" class="btn btn-secondary"><span>Apply</span>
                                                        <em class="icon ni ni-arrow-long-right"></em></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->

                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="sp-plan-head-group">
                                                <div class="sp-plan-head">
                                                    <h6 class="title">Payment</h6>
                                                </div>
                                            </div>
                                            <div class="sp-plan-payopt">
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
                                            <p class=" text-blue">Agree Term & Conditions : <input type="checkbox" name="term_condition"> </p>
                                            <div class="sp-plan-head-group">

                                                <div class="sp-plan-amount">
                                                    @if (!$records->isEmpty())
                                                    @if (!$payment_informations->isEmpty())
                                                    <button type="button" onclick="addCheckout(event,'post','{{ url('parent/checkouts') }}','{{ url('parent/my-bookings') }}','add-checkout')" class="btn btn-secondary"><span>Pay
                                                            Now</span>
                                                        <em class="icon ni ni-arrow-long-right"></em></button>
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->

                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                            </div>

                            <!-- Card Info & Pay Now -->
                        </div>
                    </form>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('parent-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
{{-- <script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('parent-assets/assets/js/ecommerce-cart.init.js') }}"></script> --}}
<script>
    let discount_apply = @json($discount_apply);

    function addCheckout(e, method, url, redirectUrl, data) {
        loadingStart()

        let from = document.getElementById(data);
        console.log(from)
        let record = new FormData(from)
        var students = [];
        $("#cabintable > tbody > tr").each(function() {
            students.push($(this).find('.student').val());
        });
        $.each(students, function(i, v) {
            if (v != undefined) {
                record.append('students[]', v)
            }
        });
        e.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: method,
            url: url,
            data: record,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                loadingStop()
                showSuccess(response.message, )
                $(':input', data)
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                if ($('.upload-zone')[0] != undefined) {
                    $('.upload-zone')[0].dropzone.removeAllFiles(true)
                }
                setTimeout(function() {
                    window.location = redirectUrl;
                }, 1000);
            },
            error: function(xhr) {
                loadingStop()
                console.log((xhr.responseJSON.errors));
                let data = '';
                $.each(xhr.responseJSON.errors, function(key, value) {
                    data += '</br>' + value
                })
                showWarn(data)

            }
        });

    }

    function checkPromoCode(e, url) {
        let code = $("#promo-code").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            method: "post",
            data: {
                code: code,
            },
            success: function(response) {
                // let total = $('#totalCart').val();
                let total = @json($price);
                let annual_fee = @json($annual_fee);
                let credit = @json($credit);
                if (response.data != undefined) {
                    let promo_discount = response.data;
                    if (promo_discount > discount_apply) {
                        let discount = (parseInt(total) * response.data) / 100;
                        console.log(discount);

                        let tolat_price = (total[0] - discount) + annual_fee;
                        let tax_total = (tolat_price * 5) / 100;
                        $('#discount_name').html('');
                        $('#discount_name').html('Discount Applied Promo');
                        $('#discount').html('');
                        $('#discount').html('AED ' + discount.toFixed(2));
                        let price = (tolat_price - credit) + tax_total;
                        total = $('#tax').html('AED ' + tax_total.toFixed(2));
                        total = $('#totalAmount').html('');
                        total = $('#totalAmount').html('AED ' + price.toFixed(2));
                    }
                }
                if (response.data == undefined) {
                    showWarn(response.message, 'error')
                }
            },
        });
    }
</script>

<script></script>
@stop