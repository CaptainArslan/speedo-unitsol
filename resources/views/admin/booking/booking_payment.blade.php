@extends('admin.layouts.master')
@section('style')
<title>{{ $title }} | Swimming Pool Management System</title>
@stop

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
            <div class="nk-block nk-block-lg">
                <div class="card card-preview">
                    <div class="nk-content-wrap">
                        <div class="nk-block">
                            <form id="add-checkout">
                                <div class="col-xl-12 p-4 ">
                                    <!-- Product List @s -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="table-responsive">
                                                    <table id="cabintable" class="datatable-init-export nowrap table" data-export-title="Export">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Product Name</th>
                                                                <th>Student</th>
                                                                <th>Price</th>
                                                                <th>Qty</th>
                                                                <th>No of Classes</th>
                                                                <th>Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (!empty($records))
                                                            <?php
                                                            $total = 0;
                                                            $student_discount = [];
                                                            ?>
                                                            @foreach ($records->orderDetail as $key => $record)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $record->name }}</td>
                                                                <td>{{ $record->studentTermsActive?->student->name }} {{ $record->studentTermsActive?->student->last_name }}</td>
                                                                <td>{{ $record->price }}</td>
                                                                <td>{{ $record->qty }}</td>
                                                                <td></td>
                                                                <td>AED {{ $record->qty * $record->price }}</td>
                                                            </tr>
                                                            <?php
                                                            $total += $record->qty * $record->price;
                                                            ?>
                                                            @endforeach
                                                            @endif
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="4"></td>
                                                                <td colspan="2">Grand Total</td>
                                                                <td><strong>AED {{ $total }}</strong></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div>
                                    <!-- Product List @e -->
                                </div>

                                <div class="container mb-4">
                                    <div class="row">
                                        <!-- First Half - Card 1 -->
                                        <div class="col-lg-6 col-md-12">
                                            <div class="col-xl-12">

                                            </div>
                                        </div>

                                        <!-- Second Half - Card 2 -->
                                        <div class="col-lg-6 col-md-12">
                                            <div class="col-xl-12">
                                                <!-- Card Info 2 -->
                                                <div class="card card-bordered">
                                                    <div class="card-inner-group">
                                                        <div class="card-inner">
                                                            <div class="sp-plan-head-group">
                                                                <div class="sp-plan-head">
                                                                    <h6 class="title">Payment</h6>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner">
                                                            <select name="payment_type" id="payment_method" class="form-control method_select2">
                                                                <option value="cash">cash</option>
                                                                <option value="card">Card</option>
                                                            </select>
                                                            <!-- <p class=" text-blue">Agree Term & Conditions : <input type="checkbox" name="term_condition"> </p> -->
                                                            <div class="sp-plan-head-group mt-4">
                                                                <div class="sp-plan-amount">
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-inner -->

                                                    </div><!-- .card-inner-group -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Info & Pay Now -->
                            </form>
                        </div><!-- .nk-block -->
                    </div>
                </div><!-- .card-preview -->
            </div> <!-- nk-block -->
        </div>
    </div>
</div>
@endsection

@section('scripts')

@stop