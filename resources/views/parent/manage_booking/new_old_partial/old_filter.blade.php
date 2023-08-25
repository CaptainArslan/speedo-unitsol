{{-- <script src="{{ asset('parent-assets/assets/js/bundle.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/scripts.js?ver=2.9.0') }}"></script> --}}
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
<script>
    
</script>
@if (isset($records) && !$records->isEmpty())
    @foreach ($class_types as $class_type)
        <?php
        $check = $records->where('class_type_id', $class_type->id);
        ?>
        <div class="nk-block-head mb-4 mt-4">
            @if (isset($check) && !$check->isEmpty())
                <div class="nk-block-head-content">
                    <h5 class="title nk-block-title">{{ $class_type->name }}</h4>
                        <!-- <p>All classes schedule on selected date.</p> -->
                </div>
            @endif
        </div>
        <?php
        ?>

        <div class="row g-gs">
            @foreach ($records as $key => $term)
                @if ($class_type->id == $term->class_type_id)
                    <?php
                    $total_slot = $term->tolalSlotBooked();
                    ?>

                    <!--<div class="col-sm-6 col-xl-3">-->
                    <div class="col-3 col-sm-3">
                        <div class="card card-bordered">
                            <div class="us-card">
                                <div class="us-venue-image">
                                    <span
                                        style="bottom: 3px;position: absolute;padding: 10px;padding: 10px;font-size: 12px;color: #fff;z-index: 1;">
                                        <strong>{{ $term->venue->name }}</strong>
                                    </span>

                                    <span
                                        style="top: 11px;right: 12px;position: absolute;background: #fff;color: #ff0000;font-size: 10px;padding: 2px 8px;border-radius: 10px;font-weight: 500;">
                                        @foreach ($term->termBaseBookingDaysParent as $item)
                                            {{ $item->day->name }}
                                        @endforeach
                                    </span>

                                    <strong
                                        style="top: 12px;left: 12px;position: absolute;background: #fff;color: #ff0000;font-size: 10px;padding: 2px 8px;border-radius: 10px;font-weight: 500;">
                                        {{ $term->timing->name . ' at ' . date('h:i A', strtotime($term->timing->start_time)) }}
                                    </strong>

                                    <div class="us-gradient">

                                    </div>
                                    @if ($term->venue?->image)
                                        <img src="{{ $venue_image_url . '/' . $term->venue->image }}" />
                                    @else
                                        <img src="{{ asset('parent-assets/images/empty-venue.jpeg') }}" />
                                    @endif
                                </div>
                                <div class="us-card-data">
                                    <!--<div class="user-avatar lg bg-gray-dim">-->
                                    <!--    <span>{{ substr($term->name, 0, 1) }}</span>-->
                                    <!--    <div class="status dot dot-lg dot-success"></div>-->
                                    <!--</div>-->
                                    <div class="user-info" style="text-align: left;">
                                        {{-- @dd($schedule) --}}
                                        <h6>{{ $term->name }}
                                        </h6>
                                        <span>{{ $term->class->name . ' ' }}</span>
                                        <hr />
                                    </div>

                                    <span>
                                        Slots Booked{{ $total_slot }}/{{ $term->no_of_student }}
                                    </span>
                                    <?php
                                    $total = ($total_slot / $term->no_of_student) * 100;
                                    // dd(round($total,0));
                                    $price = $term->class->price * $term->no_of_class;
                                    $discount = ($price * $term->discount) / 100;
                                    $term_price = $price - $discount;
                                    
                                    $check = false;
                                    foreach ($carts as $cart) {
                                        if ($cart->id == $term->id && $cart->options->student_id == $student_id && ($cart->options->type = 'term')) {
                                            $check = true;
                                        }
                                    }
                                    $booked_term = App\Models\StudentTerm::where('term_id', $term->id)
                                        ->where('type', 'term')
                                        ->where('student_id', $student_id)
                                        ->first();
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped @if ($total == 100) bg-success @else bg-danger @endif"
                                            data-progress="{{ $total }}">
                                        </div>
                                    </div>

                                    <div class="us-data-list">
                                        <span>{{ ' ' . date('F d, Y', strtotime($term->start_date)), ' ' }}</span>
                                        <span> -
                                            {{ ' ' . date('F d, Y', strtotime($term->end_date)) }}</span>
                                    </div>

                                    <div class="us-data-list">
                                        <span>Lessons: </span>
                                        <span class="us-aed"> {{ $term->no_of_class }} |
                                            {{ $term->time_difference }} min each</span>
                                    </div>

                                    <div class="us-data-list">
                                        <span>Fee: </span>
                                        <span class="us-aed">AED{{ $term->total }}</span>
                                    </div>
                                </div>

                                {{-- @dd($schedule->timing) --}}
                                <!--<ul class="team-info">-->
                                <!--    <li><span class="sub2-text">Start-->
                                <!--            Date{{ ' ' . $term->start_date, ' ' }}</span>-->
                                <!--        <span class="sub2-text">End-->
                                <!--            Date{{ ' ' . $term->end_date }}</span>-->
                                <!--    </li>-->
                                <!--    <li><span>Lessons:-->
                                <!--            {{ $term->no_of_class }}</span><span>{{ $term->time_difference }}-->
                                <!--            min-->
                                <!--            each</span>-->
                                <!--    </li>-->
                                <!--    <li><span>Fee</span><span>AED-->
                                <!--            {{ $term->total }}</span></li>-->
                                <!--</ul>-->
                                <div class="team-view" style="padding-bottom: 18px;">
                                    @if ($student_id != 'null')
                                        @if (is_null($booked_term))
                                            @if ($total_slot < $term->no_of_student)
                                                <a href="javascript:void(0)"
                                                    @if ($check == false) onclick="addToCart(event,'{{ url('parent/add-to-cart-term/' . $term->id . '-' . $request->q) }}')" @endif
                                                    class="btn float-left btn-sm btn-dim btn-primary"><span>
                                                        @if ($check == true)
                                                            Class added to
                                                            cart
                                                        @else
                                                            Add To Cart
                                                        @endif
                                                    </span></a>
                                            @endif
                                        @else
                                            <a
                                                href="javascript:void(0)"class="btn float-left btn-sm btn-dim btn-primary"><span>Already
                                                    Booked</span></a>
                                        @endif
                                    @else
                                        <a href="javascript:void(0)"
                                            class="btn float-left btn-sm btn-dim btn-primary"><span>First
                                                Select Student</span></a>
                                    @endif
                                    @if (!$term->termBaseBookingPackages->isEmpty())
                                        <a class="btn btn-sm btn-dim btn-success float-right ml-2 dropdown"
                                            data-toggle="collapse" href="#demo{{ $term->id }}" type="button">
                                            Show Packages
                                        </a>
                                    @endif
                                </div>

                            </div><!-- .card -->
                            @foreach ($term->termBaseBookingPackages as $term_package)
                                <div class="card card-bordered collapse m-2" style="background-color: rgba(0,0,0,.05)"
                                    id="demo{{ $term->id }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $term_package->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            {{ $term->timing->name . ' at ' . date('h:i A', strtotime($term->timing->start_time)) }}
                                        </h6>
                                        <?php
                                        $check = false;
                                        foreach ($carts as $cart) {
                                            if ($cart->id == $term_package->id && $cart->options->student_id == $student_id && ($cart->options->type = 'package')) {
                                                $check = true;
                                            }
                                        }
                                        $booked_package = App\Models\StudentTerm::where('term_id', $term_package->id)
                                            ->where('type', 'package')
                                            ->where('student_id', $student_id)
                                            ->first();
                                        ?>
                                        <span class="sub-text"><strong>Start Date
                                            </strong>{{ date('M d, Y', strtotime($term_package->start_date)) }}
                                            </br>
                                            <strong>End Date :</strong>
                                            {{ date('M d, Y', strtotime($term_package->end_date)) }}</span>
                                        <span class="sub-text">
                                            <strong>Lessons: </strong>
                                            <span>
                                                {{ $term_package->no_of_class }}
                                                {{ $term->time_difference }}
                                                min
                                                each
                                            </span>
                                        </span>
                                        <span class="sub-text">
                                            <strong>Fee : </strong>AED {{ $term_package->total }}
                                        </span>
                                        @if ($request->q)
                                            @if (is_null($booked_package))
                                                @if ($total_slot < $term->no_of_student)
                                                    <a href="javascript:void(0)"
                                                        @if ($check == false) onclick="addToCart(event,'{{ url('parent/add-to-cart-package/' . $term_package->id . '-' . $term->id . '-' . $request->q) }}')" @endif
                                                        class="btn btn-sm float-right btn-primary mt-4"><span>
                                                            @if ($check == true)
                                                                Class added to
                                                                cart
                                                            @else
                                                                Add To Cart
                                                            @endif
                                                        </span></a>
                                                @endif
                                            @else
                                                <a
                                                    href="javascript:void(0)"class="btn btn-sm float-right btn-primary mt-4"><span>Already
                                                        Booked</span></a>
                                            @endif
                                        @else
                                            <a href="javascript:void(0)"
                                                class="btn btn-sm float-right btn-primary mt-4"><span>First
                                                    Select Student</span></a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
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
</script>
