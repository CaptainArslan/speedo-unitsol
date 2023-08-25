@extends('parent.layouts.master')
@section('style')

@stop
@section('content')
    <div class="us-profile-container" style="max-width: 1440px;margin: 0 auto;">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            {{-- <h3 class="nk-block-title page-title">Products</h3> --}}
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <img src="{{asset('my_privilege.png')}}" alt="">
                    {{-- <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="{{asset('my_privilege.pdf')}}" frameborder="1"  height="1100" width="850" ></iframe> --}}
                    {{-- <iframe id="iframepdf" src="{{asset('my_privilege.pdf')}}"></iframe> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
