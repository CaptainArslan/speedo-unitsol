<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                style="font-size:1.5rem"   class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title">New Promo Code</h5>
            <div class="nk-block-des">
                <p>Add new promo code for your customers.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="add-promo-code">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Promo Code
                            Title<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="code" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="regular-price">Discount %<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="number" name="discount" required class="form-control" id="regular-price">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Start Date & Time<sup class="text-danger">*</sup></label>
                        <div class="row gx-2">
                            <div class="w-55">
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-calendar"></em>
                                    </div>
                                    <input type="text" name="start_date" required id="edit-event-start-date"
                                        class="form-control date-picker" data-date-format="yyyy-mm-dd" required>
                                </div>
                            </div>
                            <div class="w-45">
                                <div class="form-control-wrap">
                                    {{-- <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-clock"></em>
                                    </div> --}}
                                    <input type="time" name="start_time" required id="edit-event-start-time"
                                         class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label">End Date & Time<sup class="text-danger">*</sup></label>
                        <div class="row gx-2">
                            <div class="w-55">
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-calendar"></em>
                                    </div>
                                    <input type="text" name="end_date" required id="edit-event-end-date"
                                        class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                            <div class="w-45">
                                <div class="form-control-wrap">
                                    {{-- <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-clock"></em>
                                    </div> --}}
                                    <input type="time" name="end_time" required id="edit-event-end-time"
                                         class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="edit-event-description">Description<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" name="description" required id="edit-event-description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="button"
                        onclick="addFormData(event,'post','{{ url('admin/promo-codes') }}','{{ url('admin/promo-codes') }}','add-promo-code')"
                        class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                        <a href="#" id="closeModel" data-target="addProduct" class="closeModel btn btn-warning"><em
                            class='icon ni ni-cross'></em>Cancel</a>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>
