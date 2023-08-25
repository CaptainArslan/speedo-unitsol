<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                    style="font-size:1.5rem" class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title">New Product</h5>
            <div class="nk-block-des">
                <p>Add information and add new product.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="add-product">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Product Title<sup
                                class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Sale Price<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="number" name="sale_price" required class="form-control" id="sale-price">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="stock">Stock<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="number" name="stock" required class="form-control" id="stock">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="SKU">SKU<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="sku" required class="form-control" id="SKU">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="description">Description<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <textarea type="text" col="3" rows="1" name="description" required class="form-control"
                                id="product-title"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="form-group">
                        <label class="form-label" for="SKU">Product Sizes<sup class="text-danger">*</sup></label>

                        <table class="table table-striped table-bordered " id="dynamicTable2">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="product_size[0][name]" required class="form-control"
                                            id="product-title">
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr">
                                            <em class="icon ni ni-cross"></em></button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" name="add2" id="add2"
                                            class="btn btn-sm btn-success  d-none d-md-inline-flex"><em
                                                class="icon ni ni-plus"></em>Add
                                            More</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <div class="image-uploader small bg-lighter my-2"></div>
                </div>
                <div class="col-12">
                    <button type="button"
                        onclick="addFormData(event,'post','{{ url('admin/products') }}','{{ url('admin/products') }}','add-product')"
                        class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                    <a href="#" id="closeModel" data-target="addProduct" class="closeModel btn btn-warning"><em
                            class='icon ni ni-cross'></em>Cancel</a>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>
