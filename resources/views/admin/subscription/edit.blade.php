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
                            <h3 class="nk-block-title page-title"> Edit Subscription</h3>
                            <p>You can edit product as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-product">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Subscription
                                                        Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name"
                                                            value="{{ $subscription->name }}" class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Select Class</label>
                                                    <div class="form-control-wrap">
                                                        <select name="swimming_class_id" required
                                                            class="select2 form-control" data-search="on">
                                                            <option value="">select class</option>
                                                            @foreach ($classes as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($subscription->id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Select Timing</label>
                                                    <div class="form-control-wrap">
                                                        <select id="event-theme" name="timing_id" required
                                                            class="form-select2 form-control" data-search="on">
                                                            <option value="">select Timing</option>
                                                            @foreach ($timings as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($subscription->id == $item->id) selected @endif>
                                                                    {{ $item->getName() }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale-price">Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" name="price"
                                                            value="{{ $subscription->price }}" class="form-control"
                                                            id="sale-price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/subscriptions/' . $subscription->id) }}','{{ url('admin/subscriptions') }}','edit-product')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/subscriptions') }}'"
                                                    class="btn btn-warning"><em
                                                        class="icon ni ni-cross"></em><span>Cancel</span></button>
                                            </div>
                                        </div>
                                    </form>
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
    <script>
        $('.form-select2').select2();
    </script>
@stop
