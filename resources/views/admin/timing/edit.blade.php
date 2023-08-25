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
                            <h3 class="nk-block-title page-title"> Edit Timing</h3>
                            <p>You can edit timing as you want.</p>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="nk-block-head">
                                <div class="nk-block">
                                    <form id="edit-venue">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" value="{{ $timing->name }}"
                                                            class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Start Time</label>
                                                    <div class="form-control-wrap">
                                                        <input type="time" name="start_time"
                                                            value="{{ $timing->start_time }}" class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">End Time</label>
                                                    <div class="form-control-wrap">
                                                        <input type="time" name="end_time"
                                                            value="{{ $timing->end_time }}" class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/timings/' . $timing->id) }}','{{ url('admin/timings') }}','edit-venue')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/timings') }}'"
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
        $(function() {
            // if (@json(isset($images))) {
            //     let imgArr = @json(isset($images) ? $images : '');
            //     if ($('.upload-zone')[0] != undefined) {
            //         let thisDropzone = $('.upload-zone')[0].dropzone;
            //         console.log(JSON.parse(imgArr));

            //         $.each(JSON.parse(imgArr), function(key, value) { //loop through it
            //             console.log(value);
            //             // var mockFile = { name: value.name, size: value.size }; // here we get the file name and size as response
            //             var mockFile = {
            //                 name: value.image,
            //                 dataURL: value.image
            //             }; // here we get the file name and size as response
            //             // thisDropzone.options.addedfile.call(thisDropzone, mockFile);
            //             thisDropzone.displayExistingFile(mockFile, null, 'anonymous');
            //         });
            //     }

            // }
        });
    </script>
@stop
