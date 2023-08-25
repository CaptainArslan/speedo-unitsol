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
                            <h3 class="nk-block-title page-title"> Edit Booking</h3>
                            <p>You can edit booking as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-class">
                                        <div class="row g-3">

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Change Venue<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <select name="venue_id"
                                                            onchange="getTiming(event,'{{ url('admin/get_timings') }}','{{$term_base_booking?->id}}')"
                                                            required class="form-select2 form-control" data-search="on">
                                                            <option value="">- Change Venue -</option>
                                                            @foreach ($venues as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($order_detail->swimming_class_id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Change Timings<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <select name="timing_id"
                                                            onchange="checkSlots(event,'{{ url('admin/check-slots') }}')"
                                                            class="form-select2 form-control" id="timings" data-search="on">
                                                            <option value="" >- select venue first -</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Available Slots<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="slots" name="slots" readonly
                                                            required class="form-control" value="0" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/bookings/' . $order_detail->id) }}','{{ url('admin/bookings') }}','edit-class')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/bookings') }}'"
                                                    class="btn btn-warning"><em
                                                        class="icon ni ni-cross"></em><span>Cancel</span></button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div><!-- .card-preview -->
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>Booking#</th>
                                        <th>Booking Name</th>
                                        <th>Venue</th>
                                        <th>Student Name</th>
                                        <th>Booking Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach ($student_terms as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{!! html_entity_decode($item->bookingName()) !!}</td>
                                            <td>{{ $item->venueName() }}</td>
                                            <td>{{ $item->student?->name }}</td>
                                            <td>{{ $item->created_at->format('M d, Y') }}</td>
                                            <td>{!! html_entity_decode($item->getStatus()) !!}</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>

@stop
