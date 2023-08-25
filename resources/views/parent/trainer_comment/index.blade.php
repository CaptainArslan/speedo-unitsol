@extends('parent.layouts.master')
@section('content')
    <div class="us-profile-container" style="max-width: 1440px;margin: 0 auto;">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Students</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Select student to see the trainer's comments.</p>
                                </div>

                                <ul class="link-tidy no-bdr">
                                    <ul class="custom-control-group">
                                        @foreach ($students as $item)
                                            <?php
                                            $first = substr($item->name, 0, 1);
                                            ?>
                                            <li>
                                                <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                    <input type="checkbox" class="custom-control-input" name="btnCheck"
                                                        id="btnCheck{{$item->id}}">
                                                    <label class="custom-control-label" for="btnCheck{{$item->id}}">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar lg bg-gray-dim">
                                                                        <span>{{ $first }}</span>
                                                                        <div class="status dot dot-lg dot-success">
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <h6>{{ $item->name }}</h6>
                                                                        <span class="sub-text">Baby
                                                                            Ducks</span>

                                                                    </div>
                                                                </div>

                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-danger"
                                                                        data-progress="80" style="width: 80%;"></div>
                                                                </div>

                                                            </div><!-- .team -->
                                                        </div>
                                                    </label>

                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </ul>
                            </div><!-- .nk-block-head-content -->

                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid">
                                                <label class="custom-control-label" for="uid"></label>
                                            </div>
                                        </th>
                                        <th class="nk-tb-col"><span class="sub-text">Trainer Name</span>
                                        </th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></th>
                                        <th class="nk-tb-col tb-col-xl"><span class="sub-text">Trainer
                                                Comments</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid1">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-gray-dim d-none d-sm-flex">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">Abu Bin Ishtiyak <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>info@softnio.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>+971 847-4958</span>
                                        </td>

                                        <td class="nk-tb-col tb-col-md">
                                            this is the full comment and review from the trainer.
                                        </td>

                                    </tr>
                                    <!-- .nk-tb-item  -->
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('parent-assets/assets/js/libs/fullcalendar.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('parent-assets/assets/js/apps/calendar.js?ver=2.9.0') }}"></script>
@stop
