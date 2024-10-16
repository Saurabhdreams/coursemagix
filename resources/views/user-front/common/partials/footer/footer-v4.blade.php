    <!-- Footer-area start -->
    @if ($footerSecStatus == 1)

        <footer class="footer-area bg-primary-light"
            style="background: #{{ $footerInfo->footer_background_color ?? '' }} !important">
            <div class="footer-top pt-100 pb-70">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-3 col-sm-8">
                            <div class="footer-widget" data-aos="fade-up">
                                <!-- Logo -->
                                <div class="logo mb-20">
                                    @if (!is_null($userBs->footer_logo))
                                        <a class="navbar-brand" href="{{ route('front.user.detail.view', getParam()) }}"
                                            target="_self" title="Link">
                                            <img src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FOOTER_LOGO, $userBs->footer_logo, $userBs) }}"
                                                alt="Logo">
                                        </a>
                                    @else
                                        <img src="{{ asset('assets/tenant/image/static/logo.png') }}" alt="Logo">
                                    @endif
                                </div>
                                @if (!is_null($footerInfo))
                                    <p>
                                        {{ $footerInfo->about_company }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4">
                            <div class="footer-widget" data-aos="fade-up">
                                <h5>{{ $keywords['useful_links'] ?? __('Useful Links') }}</h5>
                                @if (count($quickLinkInfos) == 0)
                                    <div class="alert-secondary mt-4">
                                        {{ $keywords['no_link_found'] ?? __('No Link Found') }}
                                    </div>
                                @else
                                    <ul class="footer-links">
                                        @foreach ($quickLinkInfos as $quickLinkInfo)
                                            <li>
                                                <a href="{{ $quickLinkInfo->url }}" target="_self"
                                                    title="link">{{ $quickLinkInfo->title }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-widget" data-aos="fade-up">
                                <h5 class="mb-0">{{ $keywords['latest_post'] ?? __('Latest Posts') }}</h5>
                                <div class="row">
                                    @if (count($latestBlogInfos) == 0)
                                        <div class="alert-secondary mt-4">
                                            {{ $keywords['no_blog_found'] ?? __('No Post Found') }}
                                        </div>
                                    @else
                                        @foreach ($latestBlogInfos as $latestBlogInfo)
                                            <div class="col-md-6">
                                                <article class="article-item mt-25">
                                                    <div class="image">
                                                        <a href="{{ route('front.user.blog_details', [getParam(), 'slug' => $latestBlogInfo->slug]) }}"
                                                            target="_self" title="Link"
                                                            class="lazy-container ratio ratio-1-1 radius-sm">
                                                            <img class="lazyload"
                                                                data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_BLOG_IMAGE, $latestBlogInfo->image, $userBs) }}"
                                                                alt="Blog Image">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <ul class="info-list">
                                                            <li>{{ $latestBlogInfo->author }} </li>
                                                            <li>{{ date_format($latestBlogInfo->created_at, 'M d, Y') }}
                                                            </li>
                                                        </ul>
                                                        <h6 class="lc-2 mb-0">
                                                            <a href="{{ route('front.user.blog_details', [getParam(), 'slug' => $latestBlogInfo->slug]) }}"
                                                                target="_self" title="Blog">
                                                                {{ strlen($latestBlogInfo->title) > 55 ? mb_substr($latestBlogInfo->title, 0, 55, 'UTF-8') . '...' : $latestBlogInfo->title }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right-area border-top ptb-30">
                <div class="container">
                    <div class="copy-right-content">

                        @if (count($socialMediaInfos) > 0)
                            <div class="social-link rounded style-2 justify-content-center mb-10">
                                @foreach ($socialMediaInfos as $socialMediaInfo)
                                    <a href="{{ $socialMediaInfo->url }}" target="_blank" title="">
                                        <i class="{{ $socialMediaInfo->icon }}"></i>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        <span>
                            {!! !empty($footerInfo->copyright_text) ? $footerInfo->copyright_text : '' !!}
                        </span>
                    </div>
                </div>
            </div>
            <!-- Shapes -->
            <div class="shape">
                <img class="shape-1 lazyload"
                    src="{{ asset('assets/front/theme_4_5_6/assets/images/placeholder.png') }}"
                    data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-3.png') }}" alt="Shape">
                <img class="shape-2 lazyload"
                    src="{{ asset('assets/front/theme_4_5_6/assets/images/placeholder.png') }}"
                    data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-1.png') }}" alt="Shape">
                <img class="shape-3 lazyload"
                    src="{{ asset('assets/front/theme_4_5_6/assets/images/placeholder.png') }}"
                    data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-6.png') }}" alt="Shape">
                <img class="shape-4 lazyload"
                    src="{{ asset('assets/front//theme_4_5_6/assets/images/placeholder.png') }}"
                    data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-4.png') }}" alt="Shape">
            </div>
        </footer>
    @endif
    <!-- Footer-area end-->
