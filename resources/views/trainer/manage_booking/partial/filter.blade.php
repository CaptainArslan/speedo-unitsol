<link rel="stylesheet" href="{{ asset('trainer-assets/assets/css/dashlite.css?ver=2.9.0') }}">
<link id="skin-default" rel="stylesheet" href="{{ asset('trainer-assets/assets/css/theme.css?ver=2.9.0') }}">
<script src="{{ asset('trainer-assets/assets/js/bundle.js?ver=2.9.0') }}"></script>
<script src="{{ asset('trainer-assets/assets/js/scripts.js?ver=2.9.0') }}"></script>
@foreach ($collections as $item)
    <?php
    $first = substr($item['name'], 0, 1);
    // $last = substr($class->last_name, 0, 1);
    ?>
    <div class="col-sm-6 col-xl-4">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="team">
                    <div class="user-card user-card-s2">
                        <div class="user-avatar lg bg-primary">
                            <span>{{ $first }}</span>
                            <div class="status dot dot-lg dot-success"></div>
                        </div>
                        <div class="user-info">
                            <h6>{{ $item['name'] }}</h6>
                            <span class="sub-text">{{ date('M d,Y', strtotime($item['date'])) }}</span>
                        </div>
                    </div>
                    <ul class="team-info">
                        <li><span>Students</span><span>{{ $item['students'] }}</span></li>
                    </ul>
                    {{-- <div class="team-view">
                        <a href="trainer/students-attendance.html"
                            class="btn btn-block btn-dim btn-primary"><span>Student
                                List</span></a>
                    </div> --}}
                </div><!-- .team -->
            </div><!-- .card-inner -->
        </div><!-- .card -->
    </div><!-- .col -->
@endforeach
