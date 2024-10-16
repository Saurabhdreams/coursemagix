
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/vendors/bootstrap.min.css') }}">
<!-- Fontawesome Icon CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/fonts/fontawesome/css/all.min.css') }}">
<!-- Icomoon Icon CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/fonts/icomoon/style.css') }}">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/vendors/magnific-popup.min.css') }}">
<!-- Swiper Slider -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/vendors/swiper-bundle.min.css') }}">
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/vendors/nice-select.css') }}">
<!-- AOS Animation CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/vendors/aos.min.css') }}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/vendors/animate.min.css') }}">
@include('user-front.common.partials.plugin_style')
<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/style.css') }}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/responsive.css') }}">

@if ($currentLanguageInfo->rtl == 1)
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/rtl.css') }}">
@endif
