
<!--====== Style color ======-->
<link rel="stylesheet" href="{{asset('assets/tenant/ecommerce/assets/css/default.css')}}" />
<link rel="stylesheet" href="{{asset('assets/tenant/ecommerce/assets/css/style.css') }}" />
<link rel="stylesheet" href="{{asset('assets/tenant/ecommerce/assets/css/custom-style.css') }}" />

@if ($currentLanguageInfo->rtl == 1)
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{ asset('assets/tenant/ecommerce/assets/css/rtl.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/tenant/ecommerce/assets/css/rtl-responsive.css')}}">
@endif
