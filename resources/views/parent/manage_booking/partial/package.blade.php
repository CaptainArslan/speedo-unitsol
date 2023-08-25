<div class="row g-gs">
    @foreach ($term->termBaseBookingPackagesParent as $term_package)
        <?php
        $package_book_slot = 0;
        foreach ($term_package->orderDetail as $data) {
            $package_book_slot += $data->qty;
        }
        ?>
        <div class="col-sm-6 col-xl-4">
            <div class="card card-bordered m-4 fade" id="detail1">
                <div class="card-inner">
                    <div class="user-card user-card-s2">
                        <div class="user-avatar lg bg-gray-dim">
                            <span>{{ substr($term_package->name, 0, 1) }}</span>
                            <div class="status dot dot-lg dot-success"></div>
                        </div>
                        <div class="user-info">
                            {{-- @dd($schedule) --}}
                            <h6>{{ $term_package->name }}</h6>
                            <span
                                class="sub-text">{{ $term->class->name . ' ' . $term->class->timing->name . ' at ' . date('h:i A', strtotime($term->class->timing->start_time)) }}
                            </span>

                        </div>
                    </div>
                    <span class="sub-text">Slots Booked
                        {{ $package_book_slot }}/{{ $term->no_of_student }}</span>
                    <?php
                    $progress = ($package_book_slot / $term->no_of_student) * 100;
                    // dd(round($total,0));
                    ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped @if ($progress == 100) bg-success @else bg-danger @endif"
                            data-progress="{{ $progress }}">
                        </div>
                    </div>
                    {{-- @dd($schedule->timing) --}}
                    <ul class="team-info">
                        <li><span>{{ $term_package->start_date }}</span><span>{{ $term_package->end_date }}</span>
                        </li>
                        <li><span>Lessons:
                                {{ $term_package->no_of_class }}</span><span>{{ $term->time_difference }}
                                min
                                each</span>
                        </li>
                        <li><span>Fee</span><span>AED
                                {{ $term_package->total }}</span>
                        </li>
                    </ul>
                </div>
                @if ($package_book_slot < $term->no_of_student)
                    <div class="team-view">
                        <a href="javascript:void(0)"
                            onclick="addToCart(event,'{{ url('parent/add-to-cart-package/' . $term_package->id) }}')"
                            class="btn btn-dim btn-primary"><span>Add
                                to Cart</span></a>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
