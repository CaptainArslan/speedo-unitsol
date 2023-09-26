@foreach (Cart::content() as $item)
<?php
if ($item->options->type == 'term') {
    $student = App\Models\Student::find($item->options->student_id);
    $term = App\Models\TermBaseBooking::find($item->id);
    $venue = $term->venue?->name;
    $class = $term->class?->name;
}
?>
@if ($item->options->type != 'product')
<div class="speedo-class">
    <div class="class-left-side">
        <div style="font-size: 16px;font-weight: 500;">
            {{ $student->getFullName() }}
        </div>
        <div style="font-size: 16px;font-weight: 500;">{{ $item->name }}
        </div>
        <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
            {{ 'Class: ' . $class }}
        </div>
        <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
            {{ 'Location: ' . $venue }}
        </div>

        <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
            {{ 'Start Date: ' . $item->options->start_date }}
        </div>
        <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
            {{ 'Day: ' . $item->options->day }}
        </div>
        <div style="width: 100%;font-size: 12px;color: #949494;float: left;">
            {{ 'Time: ' . $item->options->time }}
        </div>
        <div style="width: 100%;font-size: 12px;color: #949494;float: left;"><sup class="text-danger">*</sup>
            Lessons:
            {{ $item->options->no_of_class }} - {{ $item->options->time_total }} min
        </div>


    </div>

    <div class="class-right-side">
        <sup class="text-danger">*</sup>
        <div class="class-price">AED {{ $item->price }} </div>
    </div>
    <div class="class-right-side">
        <div class="class-price"> <a href="javascript:void(0)" class="pull-right" onclick="cartDelete(event,'{{ url('parent/cart/' . $item->id) }},{{ $item->rowId }}')">
                <em class="icon ni ni-trash"></em></a></div>
    </div>

</div>
@else
<div class="mt-2 speedo-product">
    <div class="product-left">
        <img src="" width="40" height="auto" style="overflow: hidden;" />
        <span style="font-size: 15px;font-weight: 500;">{{ $item->name }}</span>
    </div>

    <div class="product-right">
        <span>AED {{ $item->price }}</span>
        <span>X</span>
        <span>{{ $item->qty }} <a href="javascript:void(0)" class="pull-right" onclick="cartDelete(event,'{{ url('parent/cart/' . $item->id) }},{{ $item->rowId }}')">
                <em class="icon ni ni-trash"></em></a></span>
    </div>

</div>
@endif
<script>
    $('#displayClassDetail' + @json($item -> id)).modal('show');
</script>
@endforeach

<script>
    $(".count").fadeOut(400, function() {
        $(this).text(@json($count)).fadeIn(400);
    });
</script>