<div class="col-12">
    <div class="form-group">
        <label class="form-label">Duration (Start Date -- End Date)</label>
        <div class="row gx-2">
            <div class="w-50">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-left">
                        <em class="icon ni ni-calendar"></em>
                    </div>
                    <input type="text" id="start_date" readonly value="{{ $record->start_date }}" name="start_date"
                        class="form-control " data-date-format="yyyy-mm-dd">
                </div>
            </div>
            <div class="w-50">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-left">
                        <em class="icon ni ni-calendar"></em>
                    </div>
                    <input type="text" readonly id="end_date" value="{{ $record->end_date }}" name="end_date"
                        class="form-control " data-date-format="yyyy-mm-dd">
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-12" id="blackout">
    <div class="form-group">
        <label class="form-label">Blackout Periods (Start Date -- End Date)</label>
        @foreach ($record->termBalackouts as $item)
            <div class="row gx-2">
                <div class="w-50">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-left">
                            <em class="icon ni ni-calendar"></em>
                        </div>
                        <input type="text" id="blackout_start_date" readonly value="{{ $item->start_date }}"
                            name="blackout_start_date[]" class="form-control " data-date-format="yyyy-mm-dd">
                    </div>
                </div>
                <div class="w-50">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-left">
                            <em class="icon ni ni-calendar"></em>
                        </div>
                        <input type="text" id="blackout_end_date" readonly value="{{ $item->end_date }}"
                            name="blackout_end_date[]" class="form-control" data-date-format="yyyy-mm-dd">
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    </div>
</div>
