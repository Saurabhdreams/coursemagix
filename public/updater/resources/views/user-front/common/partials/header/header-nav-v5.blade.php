
        <div class="main-navbar">
            <div class="header-top bg-white py-3 mobile-item">
                <div class="container">
                    <div class="d-flex flex-wrap justify-content-between gap-15 align-items-center">
                        <a href="mailTo:{{ $userBs->email }}" class="icon-start" target="_self" title="{{ $userBs->email }}">
                            <i class="fal fa-envelope"></i>
                            {{ $userBs->email }}
                        </a>
                        <div class="social-link style-2 size-md">
                            @foreach($socialMediaInfos as $socialMediaInfo)
                            <a class="rounded-pill" href="{{ $socialMediaInfo->url }}" target="_blank" title="instagram"><i class="{{ $socialMediaInfo->icon }}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        @if (!is_null($websiteInfo->logo))
                        <a class="navbar-brand" href="{{ route('front.user.detail.view', getParam()) }}" target="_self" title="{{env('APP_NAME')}}">
                            <img src="{{\App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_LOGO,$websiteInfo->logo,$userBs,'assets/front/img/'.$bs->logo)}}" alt="Brand Logo">
                        </a>
                        @else
                        <a class="navbar-brand" href="{{ route('front.user.detail.view', getParam()) }}" target="_self" title="{{env('APP_NAME')}}">
                            <img src="{{asset('assets/tenant/image/static/logo.png')}}" alt="Brand Logo">
                        </a>
                        @endif
                        <!-- Navigation items -->

                        <div class="collapse navbar-collapse">
                            <ul id="mainMenu" class="navbar-nav mobile-item mx-auto">
                                @php
                                    $links = json_decode($userMenus, true);
                                @endphp
                                @foreach ($links as $link)
                                    @php
                                        $href = getUserHref($link, $currentLanguageInfo->id);
                                    @endphp
                                    @if (!array_key_exists('children', $link))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ $href }}">{{ $link['text'] }}</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ $href }}" class="nav-link toggle"> {{ $link['text'] }} <i
                                                    class="fal fa-plus"></i></a>
                                            <ul class="menu-dropdown">
                                                @foreach ($link['children'] as $level2)
                                                    @php
                                                        $l2Href = getUserHref($level2, $currentLanguageInfo->id);
                                                    @endphp
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="{{ $l2Href }}">{{ $level2['text'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="more-option mobile-item">
                            <div class="item">
                                <div class="language">
                                    <form action="{{ route('changeUserLanguage', getParam()) }}" method="GET">
                                        <select class="niceselect" name="lang_code" onchange="this.form.submit()">
                                            @foreach ($allLanguageInfos as $languageInfo)
                                                <option value="{{ $languageInfo->code }}"
                                                    {{ $languageInfo->code == $currentLanguageInfo->code ? 'selected' : '' }}>
                                                    {{ $languageInfo->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="item">
                                @guest('customer')
                                <a href="{{route('customer.login', getParam())}}" class="btn-icon-text" target="_self" aria-label="User" title="{{$keywords['login'] ?? __('Login') }}">
                                    <i class="fal fa-sign-in-alt"></i>
                                    <span>{{$keywords['login'] ?? __('Login') }}</span>
                                </a>
                                @endguest

                                @auth('customer')
                                @php $authUserInfo = Auth::guard('customer')->user(); @endphp
                                <a href="{{route('customer.dashboard', getParam())}}" class="btn-icon-text" target="_self" aria-label="User" title="{{$keywords['dashboard'] ?? __('Dashboard') }}">
                                    <i class="fal fa-user"></i>
                                    <span>{{$keywords['dashboard'] ?? __('Dashboard') }}</span>
                                </a>
                                @endauth
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
