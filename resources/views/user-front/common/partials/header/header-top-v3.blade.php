<div class="header-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-7 col-sm-5">
        <div class="header-logo d-flex align-items-center justify-content-center justify-content-sm-start">
          <div class="logo">
            @if (!is_null($websiteInfo->logo))
              <a href="{{ route('front.user.detail.view', getParam()) }}">
                <img data-src="{{\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_LOGO,$websiteInfo->logo,$userBs,'assets/front/img/'.$bs->logo)}}" class="lazy" alt="website logo">
              </a>
            @else
              <a href="{{ route('front.user.detail.view', getParam()) }}">
                  <img data-src="{{asset('assets/tenant/image/static/logo.png')}}" class="lazy" alt="website logo">
              </a>
            @endif
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-5 col-sm-7">
        <div class="header-btns d-flex align-items-center justify-content-center justify-content-sm-end">

          <div class="menu-btns">
            <ul>
              @guest('customer')
                <li><a href="{{route('customer.login', getParam())}}"><i class="fal fa-sign-in-alt"></i> {{ $keywords['login'] ?? __('Login') }}</a></li>
                <li><a href="{{route('customer.signup', getParam())}}"><i class="fal fa-user-plus"></i> {{ $keywords['signup'] ?? __('Signup') }}</a></li>
              @endguest

              @auth('customer')
              @php $authUserInfo = Auth::guard('customer')->user(); @endphp

                <li><a href="{{route('customer.dashboard', getParam())}}"><i class="fal fa-user"></i> {{ $authUserInfo->username }}</a></li>
                <li><a href="{{route('customer.logout', getParam())}}"><i class="fal fa-sign-out-alt"></i> {{ $keywords['logout'] ?? __('Logout') }}</a></li>
              @endauth
              
            </ul>
          </div>

          <div class="menu-dropdown mobile-item mobile-hide">
            <form action="{{ route('changeUserLanguage', getParam()) }}" method="GET">
              <select class="wide" name="lang_code" onchange="this.form.submit()">
                @foreach ($allLanguageInfos as $languageInfo)
                  <option value="{{ $languageInfo->code }}" {{ $languageInfo->code == $currentLanguageInfo->code ? 'selected' : '' }}>
                    {{ $languageInfo->name }}
                  </option>
                @endforeach
              </select>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
