<link rel="stylesheet" href="{{ asset('parent-assets/assets/css/dashlite.css?ver=2.9.0') }}">
<link rel="stylesheet" href="{{ asset('parent-assets/assets/css/unitsol.css') }}">
<link href="{{ asset('assets/dropify/css/dropify.min.css') }}" rel="stylesheet">
<link id="skin-default" rel="stylesheet" href="{{ asset('parent-assets/assets/css/theme.css?ver=2.9.0') }}">
<style>
     #toast-container>div {
         width: 300px;
         text-align: center;
         border-radius: 25px;
     }
    .page-item.active .page-link {
        background-color:#f00 !important;
        border-color:#f00 !important;
    }
    .dropify-wrapper .dropify-message p {
         font-size: initial;
     }
</style>
@yield('style')
