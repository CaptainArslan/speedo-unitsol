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
                            <h4 class="nk-block-title">Edit Staff Member</h4>
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
                                    <h5 class="nk-block-title">Edit Staff</h5>
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
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="first_name" value="{{ $user->first_name }}"
                                                        class="form-control" id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Middle
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="middle_name"
                                                        value="{{ $user->middle_name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Last
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="last_name" value="{{ $user->last_name }}"
                                                        class="form-control" id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="regular-price">Email</label>
                                                <div class="form-control-wrap">
                                                    <input type="email" name="email" value="{{ $user->email }}"
                                                        class="form-control" id="regular-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Contact</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="contact_number"
                                                        value="{{ $user->contact_number }}" class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Mobile
                                                    Number</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="mobile_number"
                                                        value="{{ $user->mobile_number }}" class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Salary</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" name="salary" value="{{ $user->salary }}"
                                                        class="form-control" id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">DOB</label>
                                                <div class="form-control-wrap">
                                                    <input type="date" name="dob" value="{{ $user->dob }}"
                                                        class="form-control" id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Passport
                                                    Number</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="passport_number"
                                                        value="{{ $user->passport_number }}" class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Gender</label>
                                                <div class="form-control-wrap">
                                                    <select name="gender" class="select2 form-control" data-search="on">
                                                        <option value="Male"
                                                            @if ($user->gender == 'Male') selected @endif>Male</option>
                                                        <option value="Female"
                                                            @if ($user->gender == 'Female') selected @endif>Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Select Nationality*</label>
                                                <div class="form-control-wrap">
                                                    <select name="nationality_id" required class="select2 form-control"
                                                        data-search="on">
                                                        <option value="event-primary">select nationality</option>
                                                        @foreach ($nationalities as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($user->nationality_id == $item->id) selected @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Designation*</label>
                                                <div class="form-control-wrap">
                                                    <select name="designation_id" required class="select2 form-control"
                                                        data-search="on">
                                                        <option value="">select designation</option>
                                                        @foreach ($designations as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($user->designation_id == $item->id) selected @endif>
                                                                {{ $item->name }}
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
                                                        <option value="event-primary">----</option>
                                                        <option value="event-primary">Admin</option>
                                                        <option value="event-success">Manager</option>
                                                        <option value="event-success">Employee</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Contract Start Date</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" name="contract_start_date"
                                                                value="{{ $user->contract_start_date }}"
                                                                id="event-end-date" class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Contract End Date</label>
                                                <div class="row gx-2">
                                                    <div class="w-100">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" name="contract_end_date"
                                                                value="{{ $user->contract_end_date }}"
                                                                id="event-end-date" class="form-control date-picker"
                                                                data-date-format="yyyy-mm-dd">
                                                        </div>
                                                    </div>
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
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control" id="SKU">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Address</label>
                                                <div class="form-control-wrap">
                                                    <textarea type="text" name="address" class="form-control" id="sale-price">{{ $user->address }}</textarea>
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
                                            <?php
                                            $image = $user_doc ? $user_doc->image : '';
                                            $emirate_front_img = $user_doc ? $user_doc->emirate_front_img : '';
                                            $emirate_back_img = $user_doc ? $user_doc->emirate_back_img : '';
                                            $emirate_back_img = $user_doc ? $user_doc->emirate_back_img : '';
                                            $nda = $user_doc ? $user_doc->nda : '';
                                            $employee_contract = $user_doc ? $user_doc->employee_contract : '';
                                            $employee_image = $user_doc ? $user_doc->employee_image : '';
                                            $insurance_doc = $user_doc ? $user_doc->insurance_doc : '';
                                            ?>
                                            <div class="h-25"></div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Profile
                                                    Picture</label>
                                                <input type="file" class="dropify form-control "
                                                    data-default-file="{{ $doc_image_url . '/' . $image }}"
                                                    data-height="100" name="image" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Emirates ID
                                                    Front*</label>
                                                <input type="file" class="dropify form-control"
                                                    data-default-file="{{ $doc_image_url . '/' . $emirate_front_img }}"
                                                    data-height="100" name="emirate_front" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Emirates ID
                                                    Back*</label>
                                                <input type="file" class="dropify form-control"
                                                    data-default-file="{{ $doc_image_url . '/' . $emirate_back_img }}"
                                                    data-height="100" name="emirate_back" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">NDA</label>
                                                <input type="file" class="dropify form-control"
                                                    data-default-file="{{ $doc_image_url . '/' . $nda }}"
                                                    data-height="100" name="nda" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Employee
                                                    Contract</label>
                                                <input type="file" class="dropify form-control"
                                                    data-default-file="{{ $doc_image_url . '/' . $employee_contract }}"
                                                    data-height="100" name="employee_contract" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Employee
                                                    ID</label>
                                                <input type="file" class="dropify form-control"
                                                    data-default-file="{{ $doc_image_url . '/' . $employee_image }}"
                                                    data-height="100" name="employee_image" required>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="product-title">Insurance
                                                    Documents</label>
                                                <input type="file" class="dropify form-control"
                                                    data-default-file="{{ $doc_image_url . '/' . $insurance_doc }}"
                                                    data-height="100" name="insurance_doc" required>
                                            </div>
                                        </div>
                                        <div class="h-25"></div>
                                        &nbsp;
                                        <div class="col-12">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('admin/staff-managements/' . $user->id) }}','{{ url('admin/staff-managements') }}','add-staff')"
                                                class="btn btn-primary">
                                                <em class="icon ni ni-edit"></em><span>Update</span></button>
                                            <button type="button"
                                                onclick="window.location='{{ url('admin/staff-managements') }}'"
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
