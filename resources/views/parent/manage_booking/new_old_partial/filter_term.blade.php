{{-- <script src="{{ asset('parent-assets/assets/js/bundle.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/scripts.js?ver=2.9.0') }}"></script> --}}
<script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
<link rel="stylesheet" href="{{ asset('parent-assets/assets/css/dashlite.css?ver=2.9.0') }}">
<link rel="stylesheet" href="{{ asset('parent-assets/assets/css/unitsol.css') }}">
<link href="{{ asset('assets/dropify/css/dropify.min.css') }}" rel="stylesheet">
<link id="skin-default" rel="stylesheet" href="{{ asset('parent-assets/assets/css/theme.css?ver=2.9.0') }}">
<style>
    .sub2-text {
        display: block;
        font-size: 11px;
        color: #8094ae;
    }
</style>
<style>
    .us-days-bg {
        background: #f00;
        color: #fff;
        text-align: center;
        height: 50px;
    }
    .us-days-bg-light {
            background: #fe7171;
            font-weight: 700;
            color: #fff;
            text-align: center;
            height: 50px;
        }

    .us-class-row-bg {
        background-color: #FAFAFA;
        min-height: 200px;
        height: 200px;
        text-align: center;
        font-size: 15px;
        font-weight: 500;
    }
    .us-table-header{
                position: sticky;
                top: 75px;
                z-index: 1;
                font-size: 16px;
                font-weight: 500;
        }

    .us-bottom-border {
        border-bottom: 1px solid #f00;
    }

    .us-class-schedule {
        background: #fff;
        border: 1px solid #f1f1f1;
        padding: 15px;
    }

    .us-class-list {

        line-height: 35px;
        margin-bottom: 5px;
        cursor: pointer;
        border: 1px solid #f00;
        border-radius: 25px;
    }

    .us-class-list>.us-clss-timing {
        font-size: 12px;
    }

    .us-class-color {
        width: 10px;
        height: 10px;
        background: #6576ff;
        border-radius: 5px;
    }

    .no-class {
        border: none;
    }

    .us-class-data {
        margin-bottom: 4px;
        color: #1e1e1e;
        font-size: 15px;
        font-weight: 200;
    }


    .us-booked-slots {
        background: #f8f8f8;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .btn_style {
        background-color: #E6E6E6;
        border: none;
        color: #424242;
        width: 180px;
        display: flex;
        justify-content: center;
        float: right;
    }
</style>
{{-- @dd($parent_records) --}}
@if (isset($parent_records) && $parent_records != [])
    <div class="">
        <table style="width: 100%;">
            <thead class="us-table-header"> 
            <th>
                <tr>
                    <td style="width: 12%;">

                    </td>
                    <td class="us-days-bg">
                        Monday
                    </td>
                    <td class="us-days-bg-light">
                        Tueday
                    </td>
                    <td class="us-days-bg">
                        Wednesday
                    </td>
                    <td class="us-days-bg-light">
                        Thursday
                    </td>
                    <td class="us-days-bg">
                        Friday
                    </td>
                    <td class="us-days-bg-light">
                        Saturday
                    </td>
                    <td class="us-days-bg">
                        Sunday
                    </td>
                </tr>
            </th>
        </thead> 
            <tbody>
                @foreach ($parent_records as $parent_term)
                    <?php
                    $child_terms = $parent_term->tranierDetails->where('venue_id', $venue_id);

                    $student_record = isset($assessment_requests) ? $assessment_requests->where('swimming_class_id', $parent_term->swimming_class_id)->where('status','Enroll Now')->first() : null;
                    // dd($student);
                    ?>
                    <tr class="us-class-row-bg">
                        <td class="us-bottom-border">
                            {{ $parent_term?->class->name.' - '.$parent_term->name }}
                        </td>
                        @include('parent.manage_booking.partial.monday_term')
                        @include('parent.manage_booking.partial.tuesday_term')
                        @include('parent.manage_booking.partial.wednesday_term')
                        @include('parent.manage_booking.partial.thursday_term')
                        @include('parent.manage_booking.partial.friday_term')
                        @include('parent.manage_booking.partial.saturday_term')
                        @include('parent.manage_booking.partial.sunday_term')
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@else
    <div class="nk-block-head mb-4 mt-4 border">
        <div class="nk-block-head-content">
            <h5 class="title nk-block-title m-2 center">No Record Found</h4>
                <!-- <p>All classes schedule on selected date.</p> -->
        </div>
    </div>
@endif

<script>
    $(document).on("click", '.filter_close', function() {
        $(this).next().collapse('toggle');
    });
    if (@json($venue_id) == null) {


    }
</script>
