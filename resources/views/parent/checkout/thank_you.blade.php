@extends('parent.layouts.master')
@section('content')
    <div class="us-profile-container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-content-wrap">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between-md g-4">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title fw-normal">Thank You,
                                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h2>
                                <div class="nk-block-des">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae
                                        dolorum assumenda veniam nisi, numquam inventore soluta? Sequi
                                        ipsum, explicabo, modi odit eius corrupti vitae laborum quae
                                        autem illo, iure impedit?</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@stop
