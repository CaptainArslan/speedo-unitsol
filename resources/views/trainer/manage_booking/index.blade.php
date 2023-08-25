@extends('trainer.layouts.master')
@section('style')
  
@stop
@section('content')
    <div class="nk-content-wrap">
        <div class="nk-block-head nk-block-head-md">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Manage Bookings</h3>
                </div>
                <!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="form-group">
                        <label class="form-label">Enter Date Check Class</label>
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-left">
                                <em class="icon ni ni-calendar"></em>
                            </div>
                            <?php
                            if (request()->date) {
                                $date = request()->date;
                            } else {
                                $now = Carbon\Carbon::now();
                                $date = $now->format('Y-m-d');
                            }
                            // dd($date);
                            ?>
                            <input type="text" id="end_date" onchange="checkClass(event)" value="{{ $date }}"
                                class="form-control date-picker" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        {{-- <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div id="calendar" class="nk-calendar"></div>
                </div>
            </div>
        </div> --}}
        @if (!$collections->isEmpty())

            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="title nk-block-title">Schedule Classes</h4>
                        <p>All classes schedule on selected date.</p>
                    </div>
                </div>
                <div class="row g-gs">
                    @foreach ($collections as $term)
                        <div class="col-sm-6 col-xl-4">
                            <div class="card card-bordered round">
                                <div class="us-card">
                                    
                                    <div class="us-card-data">
                                        <div class="user-info" style="text-align: left;">
                                            {{-- @dd($schedule) --}}
                                            <h6 class="text-center">{{ $term['name'] }}</h6>
                                             <hr>
                                            <span><strong>Class : </strong> {{ $term['class'] }}</span> <br>
                                            <span><strong>Venue : </strong> {{ $term['venue'] }}</span><br>
                                            <span><strong>Timing : </strong> {{ $term['timing'] }}</span><br>
                                            <span><strong>Day : </strong> {{ $term['day'] }}</span>
                                        </div>
                                        <div class="us-data-list">
                                            <span><strong>Date : </strong> {{ $term['date'] }}</span>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="us-data-list">
                                                    <span><strong>Lessons:</strong> </span>
                                                    <span class="us-aed"> 12 / 13</span>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="us-data-list">
                                                    <span><strong>Students:</strong> </span>
                                                    <span class="us-aed">{{ $term['students'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                    <div class="team-view" style="padding-bottom: 18px;">
                                        <a href="javascript:void(0)" class="btn w-85 btn-sm  btn-primary" style="background-color: #798bff">
                                            <span>
                                                Student List
                                            </span>
                                        </a>

                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="col-sm-12 col-xl-12">
                <div class="nk-block-head mb-4 mt-4 border">
                    <div class="nk-block-head-content">
                        <h5 class="title nk-block-title m-2 text-center">No Record Found</h4>
                            <!-- <p>All classes schedule on selected date.</p> -->
                    </div>
                </div>
            </div>
        @endif
    </div>



    <div class="modal fade" id="previewEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div id="preview-event-header" class="modal-header">
                    <h5 id="preview-event-title" class="modal-title">Placeholder Title</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="row gy-3 py-1">
                        <div class="col-sm-6">
                            <h6 class="overline-title">Start Time</h6>
                            <p id="preview-event-start"></p>
                        </div>
                        <div class="col-sm-6" id="preview-event-end-check">
                            <h6 class="overline-title">End Time</h6>
                            <p id="preview-event-end"></p>
                        </div>
                        <div class="col-sm-10" id="preview-event-description-check">
                            <h6 class="overline-title">Description</h6>
                            <p id="preview-event-description"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('trainer-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    {{-- @include('trainer.manage_booking.partial.term_calendar') --}}
    <script>
        function checkClass(e) {
            let date = e.target.value;
            // let class_id = $('#class_id').val();
            window.location.href = "{{ url('trainer/manage-bookings?date=') }}" + date;
        }
    </script>
@endsection
