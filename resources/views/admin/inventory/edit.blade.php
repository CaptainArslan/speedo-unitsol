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
                            <h3 class="nk-block-title page-title"> Edit Inventory</h3>
                            <p>You can edit inventory as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-inventory">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Asset Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="asset_name"
                                                            value="{{ $inventory->asset_name }}" class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Asset Number</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="asset_number"
                                                            value="{{ $inventory->asset_number }}" class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Asset Type</label>
                                                    <div class="form-control-wrap">
                                                        <select  name="asset_type_id" required
                                                            class="select2 form-control" data-search="on">
                                                            <option value="">select asset type</option>
                                                            @foreach ($asset_types as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($inventory->asset_type_id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Asset Location</label>
                                                    <div class="form-control-wrap">
                                                        <select name="venue_id" required
                                                            class="select2 form-control" data-search="on">
                                                            <option value="">select asset location</option>
                                                            @foreach ($venues as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($inventory->venue_id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Asset Owner</label>
                                                    <div class="form-control-wrap">
                                                        <select  name="staff_id" required
                                                            class="select2 form-control" data-search="on">
                                                            <option value="">select asset owner</option>
                                                            @foreach ($staffs as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($inventory->staff_id == $item->id) selected @endif>
                                                                    {{ $item->first_name . '' . $item->last_name }}
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
                                                        <input type="number" name="price" value="{{ $inventory->price }}"
                                                            class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Quantity</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" name="qty" value="{{ $inventory->qty }}"
                                                            class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea type="text" name="description" required class="form-control" id="product-title">{{ $inventory->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="edit-images" style="padding-top: .5rem;"></div>
                                                <input type="text" hidden name="my_image[]"
                                                    value="{{ $images }}" id="my_image" multiple>
                                            </div>

                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/inventories/' . $inventory->id) }}','{{ url('admin/inventories') }}','edit-inventory')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/inventories') }}'"
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
@stop
