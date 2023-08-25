<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                 style="font-size:1.5rem"   class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title">New Inventory</h5>
            <div class="nk-block-des">
                <p>Add all of your office inventory.</p>
            </div>

        </div>
    </div>
    <div class="nk-block">
        <form id="add-inventory">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Asset Name<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="asset_name" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Asset Type<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <select name="asset_type_id" required class="select2 form-control" data-search="on">
                                <option value="">select asset type</option>
                                @foreach ($asset_types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Asset Number<sup
                                class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="asset_number" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Asset Location<sup
                                class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <select name="venue_id" required class="select2 form-control" data-search="on">
                                <option value="">select location</option>
                                @foreach ($venues as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Asset Owner<sup
                                class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <select name="staff_id" required class="form-select2  form-control" data-search="on">
                                <option value="">select owner</option>
                                @foreach ($staffs as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Price</label>
                        <div class="form-control-wrap">
                            <input type="number" name="price" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Quantity</label>
                        <div class="form-control-wrap">
                            <input type="number" name="qty" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Description</label>
                        <div class="form-control-wrap">
                            <textarea type="text" name="description" required class="form-control" id="product-title"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="image-uploader small bg-lighter my-2"></div>
                </div>
                <div class="col-12">
                    <button type="button"
                        onclick="addFormData(event,'post','{{ url('admin/inventories') }}','{{ url('admin/inventories') }}','add-inventory')"
                        class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>

                    <a href="#" id="closeModel" data-target="addProduct" class="closeModel btn btn-warning"><em
                            class='icon ni ni-cross'></em>Cancel</a>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>
