{{-- jQuery --}}
    {{-- <script type="text/javascript" src="{{ asset('assets/front/js/vendor/jquery.min.js') }}"></script> --}}
    {{-- modernizr js --}}
    {{-- <script type="text/javascript" src="{{ asset('assets/front/js/vendor/modernizr.min.js') }}"></script> --}}

    {{-- slick js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/slick.min.js') }}"></script>

    {{-- isotope-pkgd js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/isotope-pkgd-3.0.6.min.js') }}"></script>

    {{-- imagesloaded-pkgd js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/imagesloaded.pkgd.min.js') }}"></script>


    {{-- owl-carousel js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/owl-carousel.min.js') }}"></script>

    {{-- nice-select js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/jquery.nice-select.min.js') }}"></script>

    {{-- wow js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/wow.min.js') }}"></script>

    {{-- jquery-counterup js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/jquery.counterup.min.js') }}"></script>

    {{-- waypoints js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/waypoints.min.js') }}"></script>

    {{-- datatables js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/datatables-1.10.23.min.js') }}"></script>

    {{-- datatables bootstrap js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/datatables.bootstrap4.min.js') }}"></script>

    {{-- jQuery-ui js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/jquery-ui.min.js') }}"></script>


    {{-- highlight js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/highlight.pack.js') }}"></script>

    {{-- Highligh js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/jquery-syotimer.min.js') }}"></script>
        {{-- lazy load js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/lazyload.min.js') }}"></script>
    @if($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6)
    <!-- Header-footer CSS -->
       <script src="{{ asset('assets/front/theme_4_5_6/assets/js/header-footer.js')}}"></script>
    
    @endif


    {{-- new main js --}}
    <script type="text/javascript" src="{{ asset('assets/tenant/js/front-main.js') }}"></script>