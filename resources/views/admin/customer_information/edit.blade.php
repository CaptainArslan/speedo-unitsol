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
                            <h4 class="nk-block-title">Edit Customer</h4>
                            <div class="nk-block-des">

                            </div>
                        </div><!-- .nk-block-head-content -->

                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Edit Customer</h5>
                                    <div class="nk-block-des">
                                        <p>All fields are requried.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <form id="edit-trainer">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">First
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="first_name"
                                                        value="{{ $customer->first_name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Middle
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="middle_name"
                                                        value="{{ $customer->middle_name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Last
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="last_name"
                                                        value="{{ $customer->last_name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="regular-price">Email</label>
                                                <div class="form-control-wrap">
                                                    <input type="email" name="email" value="{{ $customer->email }}"
                                                        class="form-control" id="regular-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Contact</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="contact_number"
                                                        value="{{ $customer->contact_number }}" class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Date Of Birth</label>
                                                <div class="form-control-wrap">
                                                    <input type="date" name="dob" value="{{ $customer->dob }}"
                                                        class="form-control" id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="stock">Password</label>
                                                <div class="form-control-wrap">
                                                    <input type="password" name="password" class="form-control"
                                                        id="stock">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="SKU">Confirm Password</label>
                                                <div class="form-control-wrap">
                                                    <input type="password" name="password_confirmation" class="form-control"
                                                        id="SKU">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Address</label>
                                                <div class="form-control-wrap">
                                                    <textarea type="text" name="address" class="form-control" id="sale-price">{{ $customer->address }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('admin/customer-informations/' . $customer->id) }}','{{ url('admin/customer-informations') }}','edit-trainer')"
                                                class="btn btn-primary">
                                                <em class="icon ni ni-plus"></em><span>Update</span></button>
                                            <button type="button"
                                                onclick="window.location='{{ url('admin/customer-informations') }}'"
                                                class="btn btn-warning"><em
                                                    class="icon ni ni-cross"></em><span>Cancel</span></button>
                                        </div>
                                    </div>
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
