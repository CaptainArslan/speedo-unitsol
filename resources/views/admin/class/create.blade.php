<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" id="addClass"
    data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                    style="font-size:1.5rem" class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title">Add New Class</h5>
            <div class="nk-block-des">
                <p>You can add as many classes as you want.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="add-class">

            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Class Name<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" required class="form-control"
                                value="{{ isset($class) ? $class->name : '' }}" id="product-title">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Age Group<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="age_group" required id="sale-price">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Color<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="color" class="form-control" name="color" required id="sale-price">
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Select Timing<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <select name="timing_id" required class="form-select2 form-control"
                                data-search="on">
                                <option value="">select timing</option>
                                @foreach ($timings as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->getName() }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">No of Students<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="number" class="form-control" name="no_of_student" required id="sale-price">
                        </div>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Price<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="number" class="form-control" name="price" required id="sale-price">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="image-uploader small bg-lighter my-2"></div>
                </div>
        </form>

        <div class="col-12">
            <button type="button"
                onclick="addFormData(event,'post','{{ url('admin/classes') }}','{{ url('admin/classes') }}','add-class')"
                class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add
                    New</span></button>
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel btn btn-warning"><em
                    class='icon ni ni-cross'></em>Cancel</a>
        </div>
    </div>
</div><!-- .nk-block -->
</div>
