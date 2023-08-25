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
                            <h3 class="nk-block-title page-title"> Edit Promo Code</h3>
                            <p>You can edit promo code as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-promo-code">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Promo Code
                                                        Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="code" value="{{ $promo_code->code }}"
                                                            class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="regular-price">Discount %</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" name="discount"
                                                            value="{{ $promo_code->discount }}" class="form-control"
                                                            id="regular-price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Start Date & Time</label>
                                                <div class="row gx-2">
                                                    <div class="w-55">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" name="start_date"
                                                                value="{{ $promo_code->start_date }}"
                                                                id="edit-event-start-date" class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd" required>
                                                        </div>
                                                    </div>
                                                    <div class="w-45">
                                                        <div class="form-control-wrap">
                                                            {{-- <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-clock"></em>
                                                            </div> --}}
                                                            <input type="time" name="start_time"
                                                                value="{{ $promo_code->start_time }}"
                                                                id="edit-event-start-time" class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">End Date & Time</label>
                                                <div class="row gx-2">
                                                    <div class="w-55">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" name="end_date"
                                                                value="{{ $promo_code->end_date }}" id="edit-event-end-date"
                                                                class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd">
                                                        </div>
                                                    </div>
                                                    <div class="w-45">
                                                        <div class="form-control-wrap">
                                                            {{-- <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-clock"></em>
                                                            </div> --}}
                                                            <input type="time" name="end_time"
                                                                value="{{ $promo_code->end_time }}" id="edit-event-end-time"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="">Description</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control" name="description">{{ $promo_code->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="col-12">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('admin/promo-codes/' . $promo_code->id) }}','{{ url('admin/promo-codes') }}','edit-promo-code')"
                                                class="btn btn-primary"><em
                                                    class="icon ni ni-edit"></em><span>Update</span></button>
                                            <button type="button"
                                                onclick="window.location='{{ url('admin/promo-codes') }}'"
                                                class="btn btn-warning"><em
                                                    class="icon ni ni-cross"></em><span>Cancel</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .card-preview -->
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@stop
