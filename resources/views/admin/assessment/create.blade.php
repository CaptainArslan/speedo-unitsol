<div class="nk-add-product toggle-slide toggle-slide-right w-45" data-content="addProduct" id="addClass"
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
                        <div class="row gx-2">
                            <div class="w-100">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="product-title">Class<sup
                                                class="text-danger">*</sup></label>
                                        <div class="form-control-wrap">
                                            <select name="class_id"
                                            class="form-control select2" id="">
                                            <option value="">select class</option>
                                            @foreach ($classes as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <table class="table table-striped table-bordered " id="dynamicTable2">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" name="assessment[0][name]" required class="form-control"
                                                        id="product-title">
                                                    </td>
                                                    <td>
                                                        <textarea type="text" col="4" rows="1" name="assessment[0][description]" required class="form-control"
                                                        id="product-title"></textarea>
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
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-12 mt-4">
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
