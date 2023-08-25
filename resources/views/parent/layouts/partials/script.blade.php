<script src="{{ asset('parent-assets/assets/js/bundle.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/scripts.js?ver=2.9.0') }}"></script>
<script src="{{ asset('parent-assets/assets/js/example-toastr.js') }}"></script>
<script src="{{ asset('parent-assets/assets/js/example-sweetalert.js') }}"></script>
<script src="{{ asset('js/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('js/my-custom.js') }}"></script>
<script>
    $('.select2').select2();

    $('.dropify').dropify({
        messages: {
            'default': 'Drag',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });
</script>
@yield('scripts')
