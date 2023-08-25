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
                                    <form id="add-schedule">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" value="{{ $schedule->class_name }}"
                                                            name="class_name" class="form-control" id="product-title">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Number of Students</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" name="no_of_student"
                                                            value="{{ $schedule->no_of_student }}" class="form-control"
                                                            id="product-title">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Session Days</label>
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
                                                                        @foreach ($schedule->days as $schedule_day) @if ($schedule_day->day_id == $item->id)
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

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Select Class</label>
                                                    <div class="form-control-wrap">
                                                        <select name="class_id"
                                                            onchange="scheduleClass(event,'{{ url('admin/class-subscription') }}')"
                                                            class="select2 form-control" data-search="on">
                                                            @foreach ($classes as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($schedule->swimming_class_id == $item->id) selected @endif>
                                                                    {{ $item->name . ' - ' . $item->timing->getName() . '- AED ' . $item->price }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Select Venue</label>
                                                    <div class="form-control-wrap">
                                                        <select name="venue_id" class="select2 form-control"
                                                            data-search="on">
                                                            @foreach ($venues as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($schedule->venue_id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">

                                                <div class="form-group">
                                                    <label class="form-label">Assign Trainer</label>
                                                    <select name="trainer_id" class="select2 form-control" data-search="on">
                                                        @foreach ($trainers as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($schedule->trainer_id == $item->id) selected @endif>
                                                                {{ $item->first_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                                                <input type="text" value="{{ $schedule->start_date }}"
                                                                    name="start_date" id="event-end-date"
                                                                    class="form-control date-picker"
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
                                                                <input type="text" value="{{ $schedule->end_date }}"
                                                                    name="end_date" id="event-end-date"
                                                                    class="form-control date-picker"
                                                                    data-date-format="yyyy-mm-dd">
                                                            </div>
                                                        </div>
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
                                                    onclick="addFormData(event,'post','{{ url('admin/schedules/' . $schedule->id) }}','{{ url('admin/schedules') }}','add-schedule')"
                                                    class="btn btn-primary"><em
                                                        class="icon ni ni-edit"></em><span>Update</span></button>
                                                <button type="button"
                                                    onclick="window.location='{{ url('admin/schedules') }}'"
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
