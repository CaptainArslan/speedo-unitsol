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
                            <h3 class="nk-block-title page-title"> Edit Product</h3>
                            <p>You can edit product as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-product">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Product Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" value="{{ $product->name }}"
                                                            class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale-price">Sale Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" name="sale_price"
                                                            value="{{ $product->sale_price }}" class="form-control"
                                                            id="sale-price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="stock">Stock</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" name="stock" value="{{ $product->stock }}"
                                                            class="form-control" id="stock">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="SKU">SKU</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="sku" value="{{ $product->sku }}"
                                                            class="form-control" id="SKU">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="description">Description<sup class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <textarea type="text" col="3" rows="1" name="description" required class="form-control"
                                                            id="product-title">{{ $product->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="SKU">Product Sizes<sup
                                                            class="text-danger">*</sup></label>
                                                    <table class="table table-striped table-bordered " id="dynamicTable2">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            ?>
                                                            @foreach ($product->productSizes as $item)
                                                                <tr>
                                                                    <td>
                                                                        <input type="number" hidden
                                                                            id="product_id-{{ $i }}"
                                                                            name="product_size[{{ $i }}][product_id]"
                                                                            value="{{ $item->id }}"
                                                                            class="form-control">
                                                                        <input type="text" id="name-{{ $i }}"
                                                                            name="product_size[{{ $i }}][name]"
                                                                            value="{{ $item->name }}" required
                                                                            class="form-control" id="product-title">
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr">
                                                                            <em class="icon ni ni-cross"></em></button>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                ?>
                                                            @endforeach
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
                                                <div class="edit-images" style="padding-top: .5rem;"></div>
                                                <input type="text" hidden name="my_image[]" value="{{ $images }}"
                                                    id="my_image" multiple>
                                            </div>
                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/products/' . $product->id) }}','{{ url('admin/products') }}','edit-product')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/products') }}'"
                                                    class="btn btn-warning"><em
                                                        class="icon ni ni-cross"></em><span>Cancel</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card-preview -->
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        var data = {!! json_encode($images, JSON_HEX_TAG) !!};
        var url = {!! json_encode($image_url, JSON_HEX_TAG) !!};
        var ar = [];
        $.each(data, function(index, value) {
            let obj = {
                id: value.id,
                src: `${url+'/'+value.image}`
            }
            ar.push(obj);
        });
        var imag = $('#edit-images').val() == ar

        $('.edit-images').imageUploader({
            preloaded: ar,
            imagesInputName: 'images',
            preloadedInputName: 'old',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10
        });
    </script>
    <script>
        var i = parseInt('{{ $i }}');
        $("#add2").click(function() {
            ++i;
            $("#dynamicTable2").append('<tr>' +
                '<td> <input type="text"  id="name-' + i + '" name="product_size[' + i +
                '][name]" class="form-control" /></td>' +
                '<td><button  type="button"   class="btn btn-sm btn-danger  d-none d-md-inline-flex remove-tr"><em class="icon ni ni-cross"></em></button></td>' +
                '</tr>');
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@stop
