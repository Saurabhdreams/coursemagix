{{-- -condition wise style loadd --}}
@if (
    ($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6) &&
        request()->routeIs('front.user.detail.view'))
     @include('user-front.common.partials.theme_4_5_6_home_css')
@else
    @if ($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6)
        @include('user-front.common.partials.theme_4_5_6_header_footer_css')
    @endif

    @include('user-front.common.partials.multipurpose_style')

@endif
@if ($websiteInfo->whatsapp_status == 1)
    <style>
        .back-to-top {
            left: 30px;
            right: auto;
        }
    </style>
@endif
