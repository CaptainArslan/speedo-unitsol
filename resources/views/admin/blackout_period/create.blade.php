<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Add Blackout Period</h5>
            <div class="nk-block-des">
                <p>You can schedule blackout period for upcoming days.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <form id="add-blackout">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Blackout Period
                            Name</label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" required class="form-control" id="product-title">
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
                                    <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                        <input type="checkbox" value="{{ $item->id }}" class="custom-control-input"
                                            name="day_id[]" id="btnCheckControl{{ $id }}">
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
                                    <input type="text" id="event-end-date" required name="start_date"
                                        class="form-control date-picker" data-date-format="yyyy-mm-dd">
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
                                    <input type="text" id="event-end-date" required name="end_date"
                                        class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="button"
                        onclick="addFormData(event,'post','{{ url('admin/blackout-periods') }}','{{ url('admin/blackout-periods') }}','add-blackout')"
                        class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                </div>
            </div>
        </form>
    </div><!-- .nk-block -->
</div>
