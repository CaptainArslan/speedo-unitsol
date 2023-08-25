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
                            <h4 class="nk-block-title">Add New Staff Member</h4>
                            <div class="nk-block-des">
                                <p>You have total 35 speedo members until now.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->

                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Add New Staff</h5>
                                    <div class="nk-block-des">
                                        <p>All fields are requried.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <form id="add-staff">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">First
                                                    Name <sup class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="first_name" required class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Middle
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="middle_name" required class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Last
                                                    Name<sup class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="last_name" required class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="regular-price">Email<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="email" name="email" required class="form-control"
                                                        id="regular-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Contact<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="contact_number" required
                                                        class="form-control" id="sale-price">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Mobile
                                                    Number<sup class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="mobile_number" required class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Salary<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="number" name="salary" required class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">DOB<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="date" name="dob" required class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Passport
                                                    Number<sup class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="passport_number" required
                                                        class="form-control" id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Gender<sup class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <select name="gender" required class="select2 form-control"
                                                        data-search="on">
                                                        <option value="">select gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Select Nationality<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <select name="nationality_id" required class="select2 form-control"
                                                        data-search="on">
                                                        <option value="">select nationality</option>
                                                        @foreach ($nationalities as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Designation<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <select name="designation_id" required class="select2 form-control"
                                                        data-search="on">
                                                        <option value="">select designation</option>
                                                        @foreach ($designations as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Employee Role(Optional)</label>
                                                <div class="form-control-wrap">
                                                    <select name="employee_role" required class="select2 form-control"
                                                        data-search="on">
                                                        <option value="">----</option>
                                                        @foreach ($roles as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Contract Start Date<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" name="contract_start_date" required
                                                                id="event-end-date" class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Contract End Date<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" name="contract_end_date" required
                                                                id="event-end-date" class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="stock">Password<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="password" name="password" required class="form-control"
                                                        id="stock">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="SKU">Confirm Password<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <input type="password" name="password_confirmation" required
                                                        class="form-control" id="SKU">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Address<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="form-control-wrap">
                                                    <textarea type="text" name="address" required class="form-control" id="sale-price"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="h-50"></div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title">Required Documents</h5>
                                                    <div class="nk-block-des">
                                                        <p>Please provide all the required documents.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="h-25"></div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Profile
                                                    Picture</label>
                                                <input type="file" class="dropify form-control " data-height="100"
                                                    name="image" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Emirates ID
                                                    Front</label>
                                                <input type="file" class="dropify form-control" data-height="100"
                                                    name="emirate_front" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Emirates ID
                                                    Back</label>
                                                <input type="file" class="dropify form-control" data-height="100"
                                                    name="emirate_back" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">NDA</label>
                                                <input type="file" class="dropify form-control" data-height="100"
                                                    name="nda" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Employee
                                                    Contract</label>
                                                <input type="file" class="dropify form-control" data-height="100"
                                                    name="employee_contract" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Employee
                                                    ID</label>
                                                <input type="file" class="dropify form-control" data-height="100"
                                                    name="employee_image" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Insurance
                                                    Documents</label>
                                                <input type="file" class="dropify form-control" data-height="100"
                                                    name="insurance_doc" required>
                                            </div>
                                        </div>
                                        <div class="h-25"></div>
                                        &nbsp;
                                        <div class="col-12">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('admin/staff-managements') }}','{{ url('admin/staff-managements') }}','add-staff')"
                                                class="btn btn-primary">
                                                <em class="icon ni ni-plus"></em><span>Register
                                                    Now</span></button>
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
