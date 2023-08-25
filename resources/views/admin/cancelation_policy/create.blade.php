<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                style="font-size:1.5rem"   class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title">New Policy</h5>
            <div class="nk-block-des">
                <p>Create new cancelation policy.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="add-policies">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Policy Title<sup
                                class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="title" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="regular-price">Polciy Content<sup
                                class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <textarea type="textarea" name="content" required class="form-control" id="regular-price"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="regular-price">Pdf<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="file" class="dropify form-control" data-height="100" name="pdf"
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="button"
                        onclick="addFormData(event,'post','{{ url('admin/cancelation-policies') }}','{{ url('admin/cancelation-policies') }}','add-policies')"
                        class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Submit</span></button>
                        <a <a href="#" id="closeModel" data-target="addProduct" class="closeModel btn btn-warning"><em
                            class='icon ni ni-cross'></em>Cancel</a>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>
