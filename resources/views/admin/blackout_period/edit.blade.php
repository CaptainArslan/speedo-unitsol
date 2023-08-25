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
                                    <form id="add-blackout">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Blackout Period
                                                        Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name"
                                                            value="{{ $blackout_period->name }}" class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Blackout Period
                                                        Applied on Days</label>
                                                    <ul class="custom-control-group">
                                                        @foreach ($days as $item)
                                                            <?php
                                                            $id = 0;
                                                            if ($item->id != 6 && $item->id != 7) {
                                                                $id = $item->id;
                                                            } else {
                                                                $id = 5;
                                                            }
                                                            
                                                            ?>

                                                            <li>
                                                                <div
                                                                    class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                                                    <input type="checkbox" value="{{ $item->id }}"
                                                                        @foreach ($blackout_period->days as $blackout_period_day) @if ($blackout_period_day->day_id == $item->id)
                                                                          checked 
                                                                         @endif @endforeach
                                                                        class="custom-control-input" name="day_id[]"
                                                                        id="btnCheckControl{{ $id }}">
                                                                    <label class="custom-control-label"
                                                                        for="btnCheckControl{{ $item->id }}">{{ $item->name }}</label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label">Start Date</label>
                                                    <div class="row gx-2">
                                                        <div class="w-100">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" id="event-end-date"
                                                                    value="{{ $blackout_period->start_date }}"
                                                                    name="start_date" class="form-control date-picker"
                                                                    data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label">End Date</label>
                                                    <div class="row gx-2">
                                                        <div class="w-100">
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" id="event-end-date"
                                                                    value="{{ $blackout_period->end_date }}" name="end_date"
                                                                    class="form-control date-picker"
                                                                    data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="button"
                                                    onclick="addFormData(event,'post','{{ url('admin/blackout-periods/' . $blackout_period->id) }}','{{ url('admin/blackout-periods') }}','add-blackout')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-plus"></em><span>Edit</span></button>
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
            if (@json(isset($images))) {
                let imgArr = @json(isset($images) ? $images : '');
                if ($('.upload-zone')[0] != undefined) {
                    let thisDropzone = $('.upload-zone')[0].dropzone;
                    console.log(imgArr)
                    $.each(JSON.parse(imgArr), function(key, value) { //loop through it
                        var mockFile = {
                            name: value.image,
                            dataURL: value.image
                        }; // here we get the file name and size as response
                        thisDropzone.displayExistingFile(mockFile, value.image);
                    });
                }

            }
        });
    </script>
@stop
