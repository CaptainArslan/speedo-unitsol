@extends('parent.layouts.master')
@section('content')
<div class="us-profile-container" style="max-width: 1440px;margin: 0 auto;">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-content-wrap">
                <div class="nk-block-head nk-block-head-md">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">My Bookings</h3>
                        </div><!-- .nk-block-head-content -->
                        <!-- <div class="nk-block-head-content">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addEventPopup"><em class="icon ni ni-plus"></em><span>Add New Slot</span></a>
                            </div>.nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>#Order Number</th>
                                        <th>Account Name</th>
                                        <th>Swimmer Name</th>
                                        <th>Term</th>
                                        <th>Amount</th>
                                        {{-- <th>Created At</th> --}}
                                        <th>Attachment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $order)
                                    <?php
                                    // $i = 1;
                                    ?>
                                    <tr>


                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->first_name . ' ' . $order->user->last_name }}</td>
                                        <td>{{ '('.$order->getStudentNames().')' }}</td>
                                        <td>{{ '('.$order->getTermName().')' }}</td>
                                        <td>{{ $order->getTotal() }}</td>
                                        {{-- <td>{{ $order->created_at->format('M d ,Y') }}</td> --}}
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#invoice{{ $order->id }}">
                                                <em class="icon ni ni-invest"></em>
                                            </button>
                                            {{-- <a href="{{ url('parent/order_details/' . $order->id) }}"
                                            class="btn btn-sm btn-info">
                                            <em class="icon ni ni-eye "></em>
                                            </a> --}}
                                            <div class="modal" id="invoice{{ $order->id }}" tabindex="-{{ $order->id }}" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-body center" role="document">
                                                    <div class="modal-content w-95">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                Invoice
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <h4 class="float-end font-size-16">
                                                                                        Order #
                                                                                        {{ $order->id }}
                                                                                    </h4>

                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="mb-4">
                                                                                        <h4 class="float-right">
                                                                                            SpeedoSwim</h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <h6>Billed To:</h6>
                                                                                    <p>{{ $order->user?->first_name . ' ' . $order->user?->last_name }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <h6>Payment Method:</h6>
                                                                                    <p>Card</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="py-2 mt-3">
                                                                                <h3 class="font-size-15 font-weight-bold">
                                                                                    Order summary</h3>
                                                                            </div>
                                                                            <div class="table-responsive">
                                                                                {{-- <table class="datatable-init-export nowrap table" data-export-title="Export"> --}}
                                                                                <table class="table table-nowrap">
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
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $sub_total = 0;
                                                                                        $i = 1;
                                                                                        ?>
                                                                                        @foreach ($order->orderDetail as $item)
                                                                                        <tr>
                                                                                            <td>{{ $i }}
                                                                                            </td>
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
                                                                                            <td>{{ $item->name }}
                                                                                            </td>

                                                                                            @foreach ($item->studentTerms->where('status', 'on') as $student_term)
                                                                                            <td>{{ $student_term->student ? $student_term->student->name : '' }}
                                                                                            </td>
                                                                                            @if ($student_term->type == 'term')
                                                                                            <td>{{ $student_term->term?->venue->name }}
                                                                                            </td>
                                                                                            <td>{{ $student_term->day }}</td>
                                                                                            {{-- <td>{{ $student_term->term?->dayNames() }}
                                        </td> --}}
                                        <td>{{ $student_term->term?->timing->name . ' at ' . date('h:i A', strtotime($student_term->term?->timing->start_time)) }}
                                        </td>

                                        <td>{{ $student_term->no_of_class }}
                                        </td>
                                        <td>{{ date('M d, Y', strtotime($student_term->term?->start_date)) }}
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
                                        <td>{{ date('M d, Y', strtotime($student_term->package?->start_date)) }}
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

                                        {{-- <td></td> --}}

                                    </tr>
                                    <?php
                                    $i++;
                                    $sub_total += $item->price * $item->qty;
                                    ?>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="10" class="border-0 ">
                                        </td>
                                        <td colspan="1" class="border-0 ">
                                            <h6>Sub Total
                                            </h6>
                                        </td>
                                        <td>
                                            {{ $sub_total }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10">
                                        </td>
                                        <td colspan="1">
                                            <h6>Discount
                                            </h6>
                                        </td>
                                        <td>
                                            {{ $order->discount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" class="border-0 ">
                                        </td>
                                        <td colspan="1">
                                            <h6>Tax</h6>
                                        </td>
                                        <td> {{ $order?->tax }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" class="border-0 ">
                                        </td>
                                        <td colspan="1">
                                            <h6>Total</h6>
                                        </td>
                                        <td>AED
                                            {{ $sub_total + $order?->tax - $order->discount }}
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</td>
</tr>
@endforeach

</tbody>

</table>
</div>
</div><!-- .card-preview -->
</div>
</div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('parent-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
<script>
    // if (session('message')){
    //     showSuccess(session('message'))
    // }
</script>
@stop