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
                            <h3 class="nk-block-title page-title"> Edit Classes</h3>
                            <p>You can edit class as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-class">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Class Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $class->name }}" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale-price">Age Group</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="age_group"
                                                            value="{{ $class->age_group }}" required id="sale-price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale-price">Color<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <input type="color" class="form-control" name="color"
                                                            value="{{ $class->color }}" id="sale-price">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select Timing</label>
                                                    <div class="form-control-wrap">
                                                        <select id="event-theme" name="timing_id" required
                                                            class="form-select2 form-control" data-search="on">
                                                            <option value="">select Timing</option>
                                                            @foreach ($timings as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($class->id == $item->id) selected @endif>
                                                                    {{ $item->getName() }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale-price">Price<sup
                                                            class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" value="{{ $class->price }}" name="price"
                                                            value="Hello" id="sale-price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="sale-price">No of Students<sup class="text-danger">*</sup></label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" value="{{ $class->no_of_student }}" class="form-control" name="no_of_student" required id="sale-price">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-12">
                                                <div class="edit-images" style="padding-top: .5rem;"></div>
                                                <input type="text" hidden name="my_image[]" value="{{ $images }}"
                                                    id="my_image" multiple>
                                            </div>
                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/classes/' . $class->id) }}','{{ url('admin/classes') }}','edit-class')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/classes') }}'"
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
