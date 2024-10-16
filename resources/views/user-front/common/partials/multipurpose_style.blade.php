{{-- animate css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/animate.min.css') }}">

{{-- fontawesome css --}}
<link rel="stylesheet" href="{{ asset('assets/front/css/all.min.css') }}">

{{-- flaticon css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/flaticon.css') }}">
@if($userBs->theme_version == 1 || $userBs->theme_version == 2 || $userBs->theme_version == 3)

{{-- bootstrap css --}}
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">

@endif

{{-- magnific-popup css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/magnific-popup.css') }}">

{{-- owl-carousel css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/owl-carousel.min.css') }}">

{{-- nice-select css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/nice-select.css') }}">

{{-- slick css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/slick.css') }}">

{{-- toastr css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/toastr.min.css') }}">

{{-- datatables css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/datatables-1.10.23.min.css') }}">

{{-- whatsapp css --}}
<link rel="stylesheet" href="{{ asset('assets/front/css/whatsapp.min.css') }}">

{{-- jQuery-ui css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/jquery-ui.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/tenant/css/monokai-sublime.css') }}">

@if (request()->routeIs('customer.my_course.curriculum'))
  {{-- video css --}}
  <link rel="stylesheet" href="{{ asset('assets/tenant/css/video.min.css') }}">
@endif

{{-- default css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/default.min.css') }}">
@if($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version ==6)
<!-- Header-footer CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/theme_4_5_6/assets/css/header-footer.css')}}">

@endif

{{-- mega-menu css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/mega-menu.css') }}">

{{-- new main css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/main.css') }}">

{{-- responsive css --}}
<link rel="stylesheet" href="{{ asset('assets/tenant/css/responsive.css') }}">

@if ($currentLanguageInfo->rtl == 1)
  {{-- right-to-left css --}}
  <link rel="stylesheet" href="{{ asset('assets/tenant/css/rtl.css') }}">

  {{-- right-to-left-responsive css --}}
  <link rel="stylesheet" href="{{ asset('assets/tenant/css/rtl-responsive.css') }}">
@endif

