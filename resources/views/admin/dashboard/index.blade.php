@extends('admin.layouts.master')
@section('style')
    <title>Dashboard | Swimming Pool Management System</title>
@stop
@section('content')
    @can('view_dashboard')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to Swimming Pool Management System</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class=" col-7">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            {{-- <div class="dropdown">
                                                <a href="#"
                                                    class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                    data-toggle="dropdown"><em
                                                        class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span
                                                            class="d-none d-md-inline">Last</span> 30 Days</span><em
                                                        class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                    </ul>
                                                </div> --}}
                                            </li>
                                        </li>
                                        <div class="mr-1 col-4">
                                            <select name="venue" id="venue_id"  onchange="getVenue(event)" class="select2 mb-3 select2" style="width: 100%">
                                                <option value="">Select Venue</option>
                                                @foreach ($venues as $venue)
                                                    <option value="{{ $venue->id }}" @if (request()->venue_id == $venue->id) selected @endif>{{ $venue->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mr-1 col-4">
                                            <select name="classes" id="class_id" onchange="getClass(event)" class="select2 mb-3 select2" style="width: 100%">
                                                <option value="">Select Level</option>
                                                 @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}" @if (request()->class_id == $class->id) selected @endif>{{ $class->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                            {{-- <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em
                                                    class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                    </ul> --}}
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-xxl-8 col-lg-8 col-md-8 col-sm-8">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start gx-3 mb-3">
                                            <div class="card-title">
                                                <h6 class="title">Bookings</h6>
                                                {{-- @dd($sales) --}}
                                                <p>In 30 days sales of swimming product. <a href="{{url('admin/sales')}}">See Details</a></p>
                                            </div>
                                            <div class="card-tools">
                                                <div class="dropdown">
                                                    {{-- <a href="#" class="btn btn-primary btn-dim d-none d-sm-inline-flex"
                                                        data-toggle="dropdown"><em
                                                            class="icon ni ni-download-cloud"></em><span><span
                                                                class="d-none d-md-inline">Download</span> Report</span></a> --}}
                                                    <a href="#" class="btn btn-icon btn-primary btn-dim d-sm-none"
                                                        data-toggle="dropdown"><em class="icon ni ni-download-cloud"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>Download Mini Version</span></a></li>
                                                            <li><a href="#"><span>Download Full Version</span></a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><em class="icon ni ni-opt-alt"></em><span>More
                                                                        Options</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                                            <div class="nk-sale-data">
                                                <span class="amount">AED {{ $sales?->sum('price') }} </span>
                                            </div>
                                            {{-- @dd($sales,$sales_prices,$sales_labels) --}}
                                            <div class="nk-sale-data">
                                                <span class="amount sm">{{ count($sales?->toArray()) }}
                                                    <small>Bookings</small></span>
                                            </div>
                                        </div>
                                        <div class="nk-sales-ck large pt-4">
                                            <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-4">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start gx-3 mb-3">
                                            <div class="card-title">
                                                <h6 class="title">Sales Overview</h6>
                                                {{-- @dd($sales) --}}
                                                <p>In 30 days sales of swimming product. <a href="{{url('admin/sales')}}">See Details</a></p>
                                            </div>
                                            <div class="card-tools">
                                                <div class="dropdown">
                                                    {{-- <a href="#" class="btn btn-primary btn-dim d-none d-sm-inline-flex"
                                                        data-toggle="dropdown"><em
                                                            class="icon ni ni-download-cloud"></em><span><span
                                                                class="d-none d-md-inline">Download</span> Report</span></a> --}}
                                                    <a href="#" class="btn btn-icon btn-primary btn-dim d-sm-none"
                                                        data-toggle="dropdown"><em class="icon ni ni-download-cloud"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>Download Mini Version</span></a></li>
                                                            <li><a href="#"><span>Download Full Version</span></a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><em
                                                                        class="icon ni ni-opt-alt"></em><span>More
                                                                        Options</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                                            <div class="nk-sale-data">
                                                <span class="amount">AED  </span>
                                            </div>
                                            {{-- @dd($sales,$sales_prices,$sales_labels) --}}
                                            <div class="nk-sale-data">
                                                <span class="amount sm">0
                                                    <small>Sales</small></span>
                                            </div>
                                        </div>
                                        <div class="nk-sales-ck large pt-4">
                                            <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            {{-- Transito --}}
                            <div class="col-xxl-12">
                                <div class="card card-preview">
                                    <div class="card-inner">
                                        <table id="myTable" class="table datatable-init-export nowrap table"
                                            data-export-title="Export">
                                            <thead>
                                                <tr>
                                                    <th>Booking#</th>
                                                    <th>Customer Name</th>
                                                    <th>Student Name</th>
                                                    <th>Booking Name</th>
                                                    <th>Venue</th>
                                                    <th>Booking Date</th>
                                                    <th>Booking Fee</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                   $i=1;
                                                    ?>
                                                @foreach ($bookings as $booking)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{!! html_entity_decode($booking?->customerName()) !!}</td>
                                                        <td>{{$booking->studentTermsActive?->student->name}}</td>
                                                        <td>{!! html_entity_decode($booking->studentTermsActive?->bookingName()) !!}</td>
                                                        <td>{{$booking->studentTermsActive?->venueName()}}</td>
                                                        <td>{{$booking->created_at->format('M d,Y')}}</td>
                                                        <td>{!! html_entity_decode($booking->getPrice()) !!}</td>
                                                        <td>{!! html_entity_decode($booking->getStatus()) !!}</td>
                                                    </tr>
                                                    <?php
                                                        $i++
                                                    ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- .card-preview -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    @endcan
@endsection
@section('scripts')
    <script src="{{ asset('admin-assets/assets/js/libs/datatable-btns.js?ver=2.9.0') }}"></script>
    <script>
        function getVenue(e) {
            let venue_id = e.target.value;
            let class_id = $('#class_id').val();
            window.location.href = "{{ url('admin/dashboard?venue_id=') }}" + venue_id + "&class_id=" +
            class_id;
        } function getClass(e) {
            let class_id = e.target.value;
            let venue_id = $('#venue_id').val();
            window.location.href = "{{ url('admin/dashboard?venue_id=') }}" + venue_id + "&class_id=" +
            class_id;
        }
        const d1 = new Date();
        const d2 = new Date(new Date().setDate(d1.getDate() - 30));

        function getDatesInRange(startDate, endDate) {
            const date = new Date(startDate.getTime());

            // ✅ Exclude start date
            date.setDate(date.getDate() + 1);

            const dates = [];

            // ✅ Exclude end date
            while (date < endDate) {
                dates.push(new Date(date).getDate());
                date.setDate(date.getDate() + 1);
            }

            return dates;
        }

        let dArray  = @json($sales_prices);
        dArray.unshift(0);
        var salesOverview = {
            labels: getDatesInRange(d2, d1).reverse(),
            // labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
            dataUnit: 'AED',
            lineTension: 0.1,
            datasets: [{
            label: "Sales Overview",
            color: "#798bff",
            background: NioApp.hexRGB('#798bff', .3),
                data: dArray,
            //   data: [8200, 7800, 9500, 5500, 9200, 9690, 8200, 7800, 9500, 5500, 9200, 9690, 8200, 7800, 9500, 5500, 9200, 9690, 8200, 7800, 9500, 5500, 9200, 9690, 8200, 7800, 9500, 5500, 9200, 9690]
            }]
        };

        function lineSalesOverview(selector, set_data) {
            var $selector = selector ? $(selector) : $('.sales-overview-chart');
            $selector.each(function () {
            var $self = $(this),
                _self_id = $self.attr('id'),
                _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

            var selectCanvas = document.getElementById(_self_id).getContext("2d");
            var chart_data = [];

            for (var i = 0; i < _get_data.datasets.length; i++) {
                chart_data.push({
                label: _get_data.datasets[i].label,
                tension: _get_data.lineTension,
                backgroundColor: _get_data.datasets[i].background,
                borderWidth: 2,
                borderColor: _get_data.datasets[i].color,
                pointBorderColor: "transparent",
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: _get_data.datasets[i].color,
                pointBorderWidth: 2,
                pointHoverRadius: 3,
                pointHoverBorderWidth: 2,
                pointRadius: 3,
                pointHitRadius: 3,
                data: _get_data.datasets[i].data
                });
            }

            var chart = new Chart(selectCanvas, {
                type: 'line',
                data: {
                labels: _get_data.labels,
                datasets: chart_data
                },
                options: {
                legend: {
                    display: _get_data.legend ? _get_data.legend : false,
                    labels: {
                    boxWidth: 30,
                    padding: 20,
                    fontColor: '#6783b8'
                    }
                },
                maintainAspectRatio: false,
                tooltips: {
                    enabled: true,
                    rtl: NioApp.State.isRTL,
                    callbacks: {
                    title: function title(tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function label(tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
                    }
                    },
                    backgroundColor: '#eff6ff',
                    titleFontSize: 13,
                    titleFontColor: '#6783b8',
                    titleMarginBottom: 6,
                    bodyFontColor: '#9eaecf',
                    bodyFontSize: 12,
                    bodySpacing: 4,
                    yPadding: 10,
                    xPadding: 10,
                    footerMarginTop: 0,
                    displayColors: false
                },
                scales: {
                    yAxes: [{
                    display: true,
                    stacked: _get_data.stacked ? _get_data.stacked : false,
                    position: NioApp.State.isRTL ? "right" : "left",
                    ticks: {
                        beginAtZero: true,
                        fontSize: 11,
                        fontColor: '#9eaecf',
                        padding: 10,
                        callback: function callback(value, index, values) {
                        return '$ ' + value;
                        },
                        min: 100,
                        stepSize: 3000
                    },
                    gridLines: {
                        color: NioApp.hexRGB("#526484", .2),
                        tickMarkLength: 0,
                        zeroLineColor: NioApp.hexRGB("#526484", .2)
                    }
                    }],
                    xAxes: [{
                    display: true,
                    stacked: _get_data.stacked ? _get_data.stacked : false,
                    ticks: {
                        fontSize: 9,
                        fontColor: '#9eaecf',
                        source: 'auto',
                        padding: 10,
                        reverse: NioApp.State.isRTL
                    },
                    gridLines: {
                        color: "transparent",
                        tickMarkLength: 0,
                        zeroLineColor: 'transparent'
                    }
                    }]
                }
                }
            });
            });
        }


    </script>
@stop
