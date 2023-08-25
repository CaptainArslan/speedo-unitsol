<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
            data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <a href="#" id="closeModel" data-target="addProduct" class="closeModel float-right"><em
                            style="font-size:1.5rem" class='icon ni ni-cross'></em></a>
                    <h5 class="nk-block-title">Add New Session</h5>
                    <div class="nk-block-des">
                        <p>You can schedule class sessions for students and trainers.</p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <form id="add-schedule">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="product-title">Class Name<sup
                                        class="text-danger">*</sup></label>
                                <div class="form-control-wrap">
                                    <input type="text" name="class_name" class="form-control" id="product-title">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="product-title">Number of Students<sup
                                        class="text-danger">*</sup></label>
                                <div class="form-control-wrap">
                                    <input type="number" name="no_of_student" required class="form-control"
                                        id="product-title">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="product-title">Session Days<sup
                                        class="text-danger">*</sup></label>
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


                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Select Class<sup class="text-danger">*</sup></label>
                                <div class="form-control-wrap">
                                    <select name="class_id"
                                        onchange="scheduleClass(event,'{{ url('admin/class-subscription') }}')"
                                        class="select2 form-control" data-search="on">
                                        <option value="">select class</option>
                                        @foreach ($classes as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name . '- AED ' . $item->price }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Select Venue<sup class="text-danger">*</sup></label>
                                <div class="form-control-wrap">
                                    <select name="venue_id" class="form-select2 form-control" data-search="on">
                                        <option value="">select venue</option>
                                        @foreach ($venues as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">

                            <div class="form-group">
                                <label class="form-label">Assign Trainer<sup class="text-danger">*</sup></label>
                                <select name="trainer_id" class="select2 form-control" data-search="on">
                                    <option value="">assign trainer</option>
                                    @foreach ($trainers as $item)
                                        <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Start Date<sup class="text-danger">*</sup></label>
                                <div class="row gx-2">
                                    <div class="w-100">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" name="start_date" id="event-end-date"
                                                class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">End Date<sup class="text-danger">*</sup></label>
                                <div class="row gx-2">
                                    <div class="w-100">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" name="end_date" id="event-end-date"
                                                class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="image-uploader small bg-lighter my-2"></div>
                        </div>
                        <div class="col-12">
                            <button type="button"
                                onclick="addFormData(event,'post','{{ url('admin/schedules') }}','{{ url('admin/schedules') }}','add-schedule')"
                                class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add
                                    New</span></button>
                            <a href="#" id="closeModel" data-target="addProduct"
                                class="closeModel btn btn-warning"><em class='icon ni ni-cross'></em>Cancel</a>
                        </div>
                    </div>
                </form>
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
