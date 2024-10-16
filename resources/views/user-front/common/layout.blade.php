<!DOCTYPE html>
<html lang="{{ $currentLanguageInfo->code }}" @if ($currentLanguageInfo->rtl == 1) dir="rtl" @endif>

<head>
    {{-- required meta tags --}}
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- csrf-token for ajax request --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- title --}}
    @if (isset($websiteInfo) && isset($websiteInfo->website_title))
    <title>{{ $websiteInfo->website_title }} - @yield('pageHeading') </title>
    @else
    <title> {{ config('app.name') }} - @yield('pageHeading')</title>
    @endif

    <meta name="keywords" content="@yield('metaKeywords')">
    <meta name="description" content="@yield('metaDescription')">

    {{-- fav icon --}}
    <link rel="shortcut icon" type="image/png" href="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FAVICON, $websiteInfo->favicon, $userBs, 'assets/front/img/' . $bs->favicon) }}">

    {{-- include styles --}}
    @include('user-front.common.partials.styles')
    @yield('style')

    {{-- website-color css using a php file --}}
    {{-- -condition wise style loadd --}}
    @php
    $primaryColor = '2079FF';

    if (!empty($userBs->primary_color)) {
    $primaryColor = $userBs->primary_color;
    }

    $secondaryColor = 'F16001';

    if (!empty($userBs->secondary_color)) {
    $secondaryColor = $userBs->secondary_color;
    }

    $footerBackgroundColor = '001B61';

    if (!empty($footerInfo->footer_background_color)) {
    $footerBackgroundColor = $footerInfo->footer_background_color;
    }

    $copyrightBackgroundColor = '003A91';

    if (!empty($footerInfo->copyright_background_color)) {
    $copyrightBackgroundColor = $footerInfo->copyright_background_color;
    }

    $breadcrumbOverlayColor = '001B61';

    if (!empty($userBs->breadcrumb_overlay_color)) {
    $breadcrumbOverlayColor = $userBs->breadcrumb_overlay_color;
    }

    $breadcrumbOverlayOpacity = 0.5;

    if (!empty($userBs->breadcrumb_overlay_opacity)) {
    $breadcrumbOverlayOpacity = $userBs->breadcrumb_overlay_opacity;
    }
    @endphp
    <link rel="stylesheet" href="{{ asset("assets/tenant/css/website-color.php?primary_color=$primaryColor&secondary_color=$secondaryColor&footer_background_color=$footerBackgroundColor&copyright_background_color=$copyrightBackgroundColor&breadcrumb_overlay_color=$breadcrumbOverlayColor&breadcrumb_overlay_opacity=$breadcrumbOverlayOpacity") }}">
</head>
@php
$activeThemeClass = '';
@endphp

<body>
    {{-- preloader start --}}
    @if ($userBs->theme_version == 1 || $userBs->theme_version == 2 || $userBs->theme_version == 3)
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>
    @else
    <div id="preLoader">
        <div class="loader"></div>
    </div>
    @endif
    {{-- preloader end --}}

    {{-- --request Loader- --}}
    <div class="request-loader" style="display:none">
        <img src="{{ asset('assets/front/img/loader.svg') }}" alt="">
    </div>
    {{-- --request Loader- --}}

    {{-- header start --}}
    @if (!request()->routeIs('customer.my_course.curriculum'))
    @if ($userBs->theme_version == 1)
    <header class="header-area header-area-one">
        {{-- include header-top --}}

        @includeIf('user-front.common.partials.header.header-top-v1')

        {{-- include header-nav --}}
        @includeIf('user-front.common.partials.header.header-nav-v1')
    </header>
    @elseif ($userBs->theme_version == 2)
    <header class="header-area header-area-two">
        {{-- include header-nav --}}
        @includeIf('user-front.common.partials.header.header-nav-v2')
    </header>
    @elseif($userBs->theme_version == 3)
    <header class="header-area header-area-three">
        {{-- include header-top --}}
        @includeIf('user-front.common.partials.header.header-top-v3')

        {{-- include header-nav --}}
        @includeIf('user-front.common.partials.header.header-nav-v3')
    </header>
    @elseif($userBs->theme_version == 4)
    <header class="header-area header-area_v1 @if (request()->routeIs('front.user.blog_details')) no-breadcrumb @endif">
        {{-- -include header-top--- --}}
        @include('user-front.common.partials.header.header-top-v4')
        {{-- --include header-nav- --}}
        @include('user-front.common.partials.header.header-nav-v4')
    </header>
    @elseif($userBs->theme_version == 5)
    <header class="header-area header-area_v2 @if (request()->routeIs('front.user.blog_details')) no-breadcrumb @endif">
        {{-- -include header-top--- --}}
        @include('user-front.common.partials.header.header-top-v5')
        {{-- --include header-nav- --}}
        @include('user-front.common.partials.header.header-nav-v5')
    </header>
    @elseif($userBs->theme_version == 6)
    <header class="header-area header-area_v1 @if (request()->routeIs('front.user.blog_details')) no-breadcrumb @endif">
        {{-- -include header-top--- --}}
        @include('user-front.common.partials.header.header-top-v6')
        {{-- --include header-nav- --}}
        @include('user-front.common.partials.header.header-nav-v6')
    </header>
    @endif
    @endif
    {{-- header end --}}

    @yield('content')

    {{-- back to top start --}}
    @if (
    ($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6) &&
    request()->routeIs('front.user.detail.view'))
    <div class="go-top active">
        <i class="fal fa-long-arrow-up"></i>
    </div>
    @else
    <div class="back-to-top">
        <a href="#">
            <i class="fal fa-chevron-double-up"></i>
        </a>
    </div>
    @endif
    {{-- back to top end --}}

    {{-- announcement popup --}}
    @include('user-front.common.partials.popups')

    {{-- cookie alert --}}
    @php
    $cookieStatus = !empty($cookieAlertInfo) && $cookieAlertInfo->cookie_alert_status == 1 ? true : false;
    $cookieName = str_replace(' ', '_', $userBs->website_title . '_' . $user->username);
    $cookieName = strtolower($cookieName) . '_cookie';

    \Config::set('cookie-consent.enabled', $cookieStatus);
    \Config::set('cookie-consent.cookie_name', $cookieName);
    @endphp
    {{-- cookie alert --}}
    <div class="cookie">
        @include('cookie-consent::index')
    </div>

    {{-- WhatsApp Chat Button --}}
    <div id="WAButton"></div>
    {{-- ----- Shop Cart------ --}}
    @if (!empty($packagePermissions) && in_array('Ecommerce', $packagePermissions))
    @php
    $userShop = \App\Models\Ecommerce\UserShopSetting::where('user_id', $user->id)->first();
    @endphp
    @if (!empty($userShop))
    @if ($userShop->is_shop == 1)
    <div id="cartIconWrapper">
        <a class="d-block" id="cartIcon" href="{{ route('front.user.cart', getParam()) }}">
            <div class="cart-length">
                <i class="fal fa-shopping-bag"></i>
                <span class="length">{{ cartLength() }} {{ $keywords['ITEMS'] ?? __('ITEMS') }}</span>
            </div>
            <div class="cart-total">
                {{ $userBs->base_currency_symbol_position == 'left' ? $userBs->base_currency_symbol : '' }}{{ cartTotal() }}{{ $userBs->base_currency_symbol_position == 'right' ? $userBs->base_currency_symbol : '' }}
            </div>
        </a>
    </div>
    @endif
    @endif
    @endif
    {{-- ----- Shop Cart------ --}}

    {{-- include footer --}}
    @if (!request()->routeIs('customer.my_course.curriculum'))
    @if ($userBs->theme_version == 1 || $userBs->theme_version == 3)
    @includeIf('user-front.common.partials.footer.footer')
    @elseif($userBs->theme_version == 4)
    @includeIf('user-front.common.partials.footer.footer-v4')
    @elseif($userBs->theme_version == 5)
    @includeIf('user-front.common.partials.footer.footer-v5')
    @elseif($userBs->theme_version == 6)
    @includeIf('user-front.common.partials.footer.footer-v6')
    @else
    @includeIf('user-front.common.partials.footer.footer-v2')
    @endif
    @endif
    {{-- include scripts --}}
    @includeIf('user-front.common.partials.scripts')
    {{-- additional script --}}
    @yield('script')
</body>

</html>
