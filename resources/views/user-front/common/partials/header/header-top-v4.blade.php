        <!-- Start mobile menu -->
        <div class="mobile-menu">
            <div class="container">
                <div class="mobile-menu-wrapper"></div>
            </div>
        </div>
        <!-- End mobile menu -->

        <div class="main-responsive-nav">
            <div class="container">
                <!-- Mobile Logo -->
                <div class="logo">
                    @if (!is_null($websiteInfo->logo))
                    <a href="{{ route('front.user.detail.view', getParam()) }}" target="_self" title="{{env('APP_NAME')}}">
                        <img src="{{\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_LOGO,$websiteInfo->logo,$userBs,'assets/front/img/'.$bs->logo)}}" alt="website logo">
                    </a>
                    @else
                    <a href="{{ route('front.user.detail.view', getParam()) }}" target="_self" title="{{env('APP_NAME')}}">
                        <img src="{{asset('assets/tenant/image/static/logo.png')}}" alt="website logo">
                    </a>

                    @endif
                </div>
                <!-- Menu toggle button -->
                <button class="menu-toggler" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>