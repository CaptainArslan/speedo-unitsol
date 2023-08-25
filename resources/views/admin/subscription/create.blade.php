<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                style="font-size:1.5rem"   class='icon ni ni-cross'></em></a>
            <h5 class="nk-block-title">New Subscription Model</h5>
            <div class="nk-block-des">
                <p>All fields are required.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="add-package">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Subscription
                            Title<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" required class="form-control" id="product-title">
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Select Class<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <select name="swimming_class_id" required class="select2 form-control">
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

                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Select Timing<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <select id="event-theme" name="timing_id" required class="form-select2 form-control"
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
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Price<sup class="text-danger">*</sup></label>
                        <div class="form-control-wrap">
                            <input type="number" name="price" required class="form-control" id="sale-price">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="button"
                        onclick="addFormData(event,'post','{{ url('admin/subscriptions') }}','{{ url('admin/subscriptions') }}','add-package')"
                        class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                        <a href="#" id="closeModel" data-target="addProduct" class="closeModel btn btn-warning"><em
                            class='icon ni ni-cross'></em>Cancel</a>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>
>
