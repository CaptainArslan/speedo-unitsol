<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" id="addClass"
    data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                    style="font-size:1.5rem" class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title">Add New Assessment</h5>
            <div class="nk-block-des">
                <p>You can add as many assessment as you want.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="add-class">

            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Name<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" required class="form-control" value=""
                                id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Select Class<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <select name="class_id" required class="form-select2 form-control" data-search="on">
                                <option value="">select class</option>
                                @foreach ($classes as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-12">
            <button type="button"
                onclick="addFormData(event,'post','{{ url('admin/assessments') }}','{{ url('admin/assessments') }}','add-class')"
                class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add
                    New</span></button>
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel btn btn-warning"><em
                    class='icon ni ni-cross'></em>Cancel</a>
        </div>
    </div>
</div><!-- .nk-block -->
</div>
