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
                            <h4 class="nk-block-title">Edit Trainer</h4>
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
                                    <h5 class="nk-block-title">Edit Trainer</h5>
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
                                                        value="{{ $trainer->first_name }}" class="form-control"
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
                                                        value="{{ $trainer->middle_name }}" class="form-control"
                                                        id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Last
                                                    Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="last_name" value="{{ $trainer->last_name }}"
                                                        class="form-control" id="product-title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="regular-price">Email</label>
                                                <div class="form-control-wrap">
                                                    <input type="email" name="email" value="{{ $trainer->email }}"
                                                        class="form-control" id="regular-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Contact</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="contact_number"
                                                        value="{{ $trainer->contact_number }}" class="form-control"
                                                        id="sale-price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Salary</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" name="salary" value="{{ $trainer->salary }}"
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
                                                    <textarea type="text" name="address" class="form-control" id="sale-price">{{ $trainer->address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="h-50"></div>

                                        <div class="col-12">

                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title">Required Documents</h5>
                                                <div class="nk-block-des">
                                                    <p>Please provide all the required documents.</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="h-25"></div>
                                        <?php
                                        $image = $user_doc ? $user_doc->image : '';
                                        $emirate_front_img = $user_doc ? $user_doc->emirate_front_img : '';
                                        $emirate_back_img = $user_doc ? $user_doc->emirate_back_img : '';
                                        $emirate_back_img = $user_doc ? $user_doc->emirate_back_img : '';
                                        $nda = $user_doc ? $user_doc->nda : '';
                                        $employee_contract = $user_doc ? $user_doc->employee_contract : '';
                                        $employee_image = $user_doc ? $user_doc->employee_image : '';
                                        $insurance_doc = $user_doc ? $user_doc->insurance_doc : '';
                                        $certification_doc = $user_doc ? $user_doc->certification_doc : '';
                                        $achivement_doc = $user_doc ? $user_doc->achivement_doc : '';
                                        ?>
                                        <div class="col-3">
                                            <label class="form-label" for="product-title">Profile
                                                Picture</label>
                                            <input type="file" class="dropify form-control "
                                                data-default-file="{{ $doc_image_url . '/' . $image }}" data-height="100"
                                                name="image" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="product-title">Emirates ID
                                                Front*</label>
                                            <input type="file" class="dropify form-control"
                                                data-default-file="{{ $doc_image_url . '/' . $emirate_front_img }}"
                                                data-height="100" name="emirate_front" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="product-title">Emirates ID
                                                Back*</label>
                                            <input type="file" class="dropify form-control"
                                                data-default-file="{{ $doc_image_url . '/' . $emirate_back_img }}"
                                                data-height="100" name="emirate_back" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="product-title">NDA</label>
                                            <input type="file" class="dropify form-control"
                                                data-default-file="{{ $doc_image_url . '/' . $nda }}" data-height="100"
                                                name="nda" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="product-title">Employee
                                                Contract</label>
                                            <input type="file" class="dropify form-control"
                                                data-default-file="{{ $doc_image_url . '/' . $employee_contract }}"
                                                data-height="100" name="employee_contract" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="product-title">Employee
                                                ID</label>
                                            <input type="file" class="dropify form-control"
                                                data-default-file="{{ $doc_image_url . '/' . $employee_image }}"
                                                data-height="100" name="employee_image" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="product-title">Insurance
                                                Documents</label>
                                            <input type="file" class="dropify form-control"
                                                data-default-file="{{ $doc_image_url . '/' . $insurance_doc }}"
                                                data-height="100" name="insurance_doc" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="product-title">Acheivement
                                                Documents</label>
                                            <input type="file" class="dropify form-control"
                                                data-default-file="{{ $doc_image_url . '/' . $achivement_doc }}"
                                                data-height="100" name="achivement_doc" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="product-title">Certification
                                                Documents</label>
                                            <input type="file" class="dropify form-control"
                                                data-default-file="{{ $doc_image_url . '/' . $certification_doc }}"
                                                data-height="100" name="certification_doc" required>
                                        </div>

                                        <div class="col-4">
                                            <button type="button"
                                                onclick="addFormData(event,'post','{{ url('admin/trainers/' . $trainer->id) }}','{{ url('admin/trainers') }}','edit-trainer')"
                                                class="btn btn-primary">
                                                <em class="icon ni ni-plus"></em><span>Update</span></button>
                                            <button type="button"
                                                onclick="window.location='{{ url('admin/trainers') }}'"
                                                class="btn btn-warning"><em
                                                    class="icon ni ni-cross"></em><span>Cancel</span></button>
                                        </div>
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
