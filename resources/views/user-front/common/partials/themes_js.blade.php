@if (($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6) &&  request()->routeIs('front.user.detail.view'))
        @include('user-front.common.partials.theme_4_5_6_home_js')
@else
@if($userBs->theme_version == 4 || $userBs->theme_version == 5 || $userBs->theme_version == 6)
        @include('user-front.common.partials.theme_4_5_6_header_footer_js')
 @endif
 @include('user-front.common.partials.multipurpose_js')
@endif
