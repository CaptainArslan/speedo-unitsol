 <!-- Fav Icon  -->
 <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.png') }}">
 <!-- Page Title  -->

 <!-- StyleSheets  -->
 <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dashlite.css?ver=2.9.0') }}">
 <link id="skin-default" rel="stylesheet" href="{{ asset('admin-assets/assets/css/theme.css?ver=2.9.0') }}">
 <link href="{{ asset('assets/dropify/css/dropify.min.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/image-uploader/image-uploader.min.css') }}" rel="stylesheet">
 <link href="{{ asset('js/select2/css/select2.min.css') }}" rel="stylesheet">

 <style>
     #toast-container>div {
         width: 300px;
         text-align: center;
         border-radius: 25px;
     }

     .dot {
         height: 25px;
         width: 25px;
         background-color: #bbb;
         border-radius: 50%;
         display: inline-block;
     }

     .select2-selection__rendered {
         line-height: 16px !important;
     }

     .dropify-wrapper .dropify-message p {
         font-size: initial;
     }
 </style>
 @yield('style')
