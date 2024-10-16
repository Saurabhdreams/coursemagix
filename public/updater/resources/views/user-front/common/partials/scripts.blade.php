<script>
    "use strict";
    const baseURL = "{{ url('/') }}";
    const vapid_public_key = "{!! env('VAPID_PUBLIC_KEY') !!}";
    const langDir = {{ $currentLanguageInfo->rtl }};
    const rtl = {{ $currentLanguageInfo->rtl }};

    var mainurl = "{{ route('front.user.shop', getParam()) }}";
    var textPosition = "{{ $userBs->base_currency_text_position }}";
    var currSymbol = "{{ $userBs->base_currency_symbol }}";
    var position = "{{ $userBs->base_currency_symbol_position }}";
</script>

    {{-- jQuery --}}
    <script type="text/javascript" src="{{ asset('assets/front/js/vendor/jquery.min.js') }}"></script>
    {{-- modernizr js --}}
    <script type="text/javascript" src="{{ asset('assets/front/js/vendor/modernizr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/popper.min.js') }}"></script>
    {{-- magnific-popup js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/jquery.magnific-popup.min.js') }}"></script>
    {{-- toastr js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/toastr.min.js') }}"></script>
    {{-- pluging js --}}
    <script type="text/javascript" src="{{ asset('assets/front/js/plugin.min.js') }}"></script>
 

    {{-- -All theme Required This --- --}}
    @include('user-front.common.partials.themes_js')



@if (session()->has('success'))
    <script>
        "use strict";
        toastr['success']("{{ __(session('success')) }}");
    </script>
@endif

@if (session()->has('error'))
    <script>
        "use strict";
        toastr['error']("{{ __(session('error')) }}");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        "use strict";
        toastr['warning']("{{ __(session('warning')) }}");
    </script>
@endif

@if (request()->routeIs('customer.my_course.curriculum'))
    {{-- video js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/video.min.js') }}"></script>
@endif

{{-- whatsapp init code --}}
@if ($websiteInfo->whatsapp_status == 1)
    <script type="text/javascript">
        var whatsapp_popup = {{ $websiteInfo->whatsapp_popup_status }};
        var whatsappImg = "{{ asset('assets/front/img/whatsapp.svg') }}";
        $(function() {
            $('#WAButton').floatingWhatsApp({
                phone: "{{ $websiteInfo->whatsapp_number }}", //WhatsApp Business phone number
                headerTitle: "{{ $websiteInfo->whatsapp_header_title }}", //Popup Title
                popupMessage: `{!! nl2br($websiteInfo->whatsapp_popup_message) !!}`, //Popup Message
                showPopup: whatsapp_popup == 1 ? true : false, //Enables popup display
                buttonImage: '<img src="' + whatsappImg + '" />', //Button Image
                position: "right"
            });
        });
    </script>
@endif
