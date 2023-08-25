<td class="us-class-schedule">
    <?php
             $check=false;
            ?>
    @foreach ($group_term as $parent_term)
        <?php
        $child_terms = $parent_term->tranierDetails->where('venue_id', isset($venue_id) ? $venue_id : request()->location);
        $student_record = isset($assessment_requests)
            ? $assessment_requests
                ->where('swimming_class_id', $parent_term->swimming_class_id)
                ->where('status', 'Enroll Now')
                ->first()
            : null;
        if (isset($days_id)) {
            $data = array_filter($days_id, function ($item) {
                return $item == '1';
            });
            $day = $parent_term->termBaseBookingDays->whereIn('day_id', $data != [] ? $data : 0)->first();
        } else {
            $day = $parent_term->termBaseBookingDays->where('day_id', 1)->first();
            $other_days = $parent_term->termBaseBookingDays->where('day_id', '!=', 1)->first();
        }
        
        ?>
        @if (!is_null($day))
        <?php
             $check=true;
            ?>
            @forelse ($child_terms as $term)
                <?php
                // get total slots
                $total_slot = $term->tolalSlotBooked();
                $total = ($total_slot / $term->no_of_student) * 100;
                $price = $term->class->price * $term->no_of_class;
                $discount = ($price * $term->discount) / 100;
                $term_price = $price - $discount;
                // filter days for get number of class and price
                $days = collect($term->countDays($term->start_date));
                $total_term_price = $term->getTotal($days);
                $no_of_class = $term->getNumberOfClass($days);
                $booked_term = $term->getBookedTerm($student_id);
                // check term already add to cart or Not
                $term_check = false;
                foreach ($carts as $cart) {
                    if ($cart->id == $term->id && ($cart->options->type = 'term')) {
                        $term_check = true;
                    }
                }
                ?>
                @if ($term->timing)
                    <div class="us-class-list box" id="us-scroll{{ $term->id }}" onclick="scrollToDiv(event,'{{ $term->id }}')"
                        style="border: 2px solid {{ $term?->class->color }}!important;" data-dismiss="modal"
                        data-toggle="modal" data-target="#displayClassMondayDetail{{ $term->id }}" >
                        <span class="us-clss-timing">{{ $term?->timing->getTime() }}</span>
                    </div>

                    
                @else
                    <div class="us-class-list no-class">
                        <span class="us-clss-timing">No Class Available</span>
                    </div>
                @endif
                <div class="modal modal_close" id="displayClassMondayDetail{{ $term->id }}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content us-model-content">
                            <div class="modal-body" style="padding: 10;">
                                <div class="nk-modal">
                                    <div class="row">
                                        <div class="col-4">
                                            {!! $term->venue?->getVenueImage() !!}
                                        </div>
                                        <div class="col-5 text-justify mt-5">
                                            <h4 style="color: #1e1e1e;">
                                                {{ $term->name }}</h4>
                                            <p>{{ $term->getDate() }}
                                            </p>
                                            <p class="us-class-data">
                                                <strong>Class:</strong>
                                                {{ $term->class->name }}
                                            </p>
                                            <p class="us-class-data">
                                                <strong>Venue:</strong>
                                                {{ $term->venue->name }}
                                            </p> 
                                            <p class="us-class-data">
                                                <strong>Day:</strong>
                                                {{ 'Monday'}}
                                            </p>
                                            <p class="us-class-data">
                                                <strong>{!! $days != [] ?html_entity_decode('<sup class="text-danger">*</sup>'):''!!}Lessons:</strong>
                                                {{ $no_of_class }}
                                                |
                                                {{ $term->time_difference }}
                                                min each
                                            </p>

                                            <p class="us-class-data">
                                                <strong>{!! $days != [] ?html_entity_decode('<sup class="text-danger">*</sup>'):''!!}Fee: AED</strong>{{ ' ' . $total_term_price }}
                                            </p>
                                            <p class="us-class-data">
                                                <strong class="text-danger ">
                                                    <sup>*</sup>{{ $days != [] ? 'Prorated calculation from '.$current_date  : '' }}
                                                    </strong>
                                            </p>
                                        </div>
                                        <div class="col-3" style="align-self: flex-end;">
                                            <div class="container">
                                                <div class="row align-items-end">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            @if ($student_id != [])
                                                                <div class="col-12">
                                                                    <div class="us-booked-slots">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                {!! $student_record?->student->getStudentImage() !!}
                                                                            </div>
                                                                            <div class="col-8 mt-2">
                                                                                <h6>{{ $student_record?->student->getFullName() }}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="col-12">
                                                                <div class="us-booked-slots">
                                                                    Slots Booked
                                                                    {{ $total_slot }}/{{ $term->no_of_student }}
                                                                    <div class="progress">
                                                                        <div class="progress-bar progress-bar-striped @if ($total == 100) bg-success @else bg-danger @endif"
                                                                            data-progress="{{ $total }}"
                                                                            style="width: 80%;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                @if ($student_id != [])
                                                                    @if (is_null($booked_term))
                                                                        @if ($total_slot < $term->no_of_student)
                                                                            <button type="button"
                                                                                @if ($term_check == false) onclick="addToCart(event,'{{ url('parent/add-to-cart-term/' . $term->id . '-' . $student_record?->student_id.'-'.'Monday') }}')" @endif
                                                                                class="btn btn-lg btn-primary"
                                                                                style="background-color: #3097FF;border: none;width: 191px;display: flex;justify-content: center;float: right;margin-left: 10px;">
                                                                                @if ($term_check == true)
                                                                                    Class added to cart
                                                                                @else
                                                                                    Add To Cart
                                                                                @endif
                                                                            </button>
                                                                        @endif
                                                                    @else
                                                                        <button class="btn btn-lg btn-primary"
                                                                            style="background-color: #3097FF;border: none;width: 191px;display: flex;justify-content: center;float: right;margin-left: 10px;">
                                                                            AlreadyBooked
                                                                        </button>
                                                                    @endif
                                                                @else
                                                                    <button class="btn btn-lg btn-primary" onclick="selectStudent(event)"
                                                                        style="background-color: #3097FF;border: none;width: 191px;display: flex;justify-content: center;float: right;margin-left: 10px;">
                                                                        First Select Student
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty

                <div class="us-class-list no-class">
                    <span class="us-clss-timing">No Class Available</span>
                </div>
            @endforelse
        @endif
    @endforeach
    @if ($check == false)
        <div class="us-class-list no-class">
            <span class="us-clss-timing">No Class Available</span>
        </div>
    @endif
</td>
