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
                            <h3 class="nk-block-title page-title"> Edit Assessment Request</h3>
                            <p>You can edit assessment as you want.</p>
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

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label">Assign Class<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <select name="class_id" required class="form-select2 form-control"
                                                            data-search="on">
                                                            <option value="">assign class</option>
                                                            @foreach ($classes as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($assesment_request->swimming_class_id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Discount<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" name="discount" required class="form-control"
                                                            value="{{ $assesment_request->discount }}" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Discount Till Date<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" name="till_date" required class="form-control"
                                                            value="{{ $assesment_request->till_date }}" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/assessment-requests/' . $assesment_request->id) }}','{{ url('admin/assessment-requests') }}','edit-class')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/assessment-requests') }}'"
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
    <script></script>
@stop
