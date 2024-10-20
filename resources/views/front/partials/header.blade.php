
<!-- Header Start -->
<header class="header-area">
    <!-- Start mobile menu -->
    <div class="mobile-menu d-xl-none">
        <div class="container">
            <div class="mobile-menu-wrapper"></div>
        </div>
    </div>
    <!-- End mobile menu -->

    <div class="main-responsive-nav">
        <div class="container">
            <!-- Mobile Logo -->
            <div class="logo">
                <a href="{{route('front.index')}}">
                    <img src="{{asset('assets/front/img/'.$bs->logo)}}" alt="logo">
                </a>
            </div>
            <!-- Menu toggle button -->
            <button class="menu-toggler" type="button">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <!-- Logo -->
                <a class="navbar-brand" href="{{route('front.index')}}">
                    <img src="{{asset('assets/front/img/'.$bs->logo)}}" alt="logo">
                </a>
                <!-- Navigation items -->
                <div class="collapse navbar-collapse">
                    <ul id="mainMenu" class="navbar-nav mobile-item">
                        @php
                            $links = json_decode($menus, true);
                        @endphp
                        @foreach ($links as $link)
                            @php
                                $href = getHref($link);
                            @endphp

                            @if (!array_key_exists("children",$link))
                                <li class="nav-item">
                                    <a class="nav-link " target="{{$link["target"]}}" href="{{$href}}">{{$link["text"]}}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link toggle" target="{{$link["target"]}}" href="{{$href}}">{{$link["text"]}}<i class="fal fa-plus"></i></a>
                                    <ul class="menu-dropdown">
                                        @foreach ($link["children"] as $level2)
                                            @php
                                                $l2Href = getHref($level2);
                                            @endphp
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{$l2Href}}" target="{{$level2["target"]}}">{{$level2["text"]}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="more-option mobile-item">
                    @guest
                        <div class="item">
                            <a href="{{route('user.login')}}" class="btn primary-btn">
                                <span>{{__('Login')}}</span>
                            </a>
                        </div>
                    @endguest
                    @auth
                        <div class="item">
                            <a href="{{route('user-dashboard')}}" class="btn primary-btn">
                                <span>{{__('Dashboard')}}</span>
                            </a>
                        </div>
                    @endauth
                       {{-- <div class="item">
                        <div class="language">
                            @if(!empty($currentLang))
                                <select onchange="handleSelect(this)">
                                    @foreach($langs as $key =>$lang)
                                        <option
                                            value="{{$lang->code}}" {{$currentLang->code === $lang->code ?"selected":""}}>{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- Header End -->
