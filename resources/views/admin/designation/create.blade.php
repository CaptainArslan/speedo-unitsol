<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                style="font-size:1.5rem"   class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title">New Designations Details</h5>
            <div class="nk-block-des">
                <p>All fields are required.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="add-designation">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Name<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="button"
                        onclick="addFormData(event,'post','{{ url('admin/designations') }}','{{ url('admin/designations') }}','add-designation')"
                        class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                        <a href="#" id="closeModel" data-target="addProduct" class="closeModel btn btn-warning"><em
                            class='icon ni ni-cross'></em>Cancel</a></a>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>
