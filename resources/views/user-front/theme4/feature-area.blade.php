@if ($secInfo->features_section_status == 1)
    <section class="feature-area feature-area_v1 pt-100 pb-60">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-5" data-aos="fade-up">
                    <div class="content-title mb-40">
                        <h2 class="title mb-0">
                            {{ !empty($secTitleInfo->features_section_title) ? $secTitleInfo->features_section_title : __('Our Featured') }}

                            <img class="title-shape lazyload"
                                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/title-shape.png') }}"
                                alt="Shape">
                        </h2>
                        <div class="row">
                            @foreach ($features as $item)
                                <div class="col-sm-6">
                                    <div class="card p-30 bg-primary-light radius-md mt-30">
                                        <div class="card-icon mb-20">
                                            <img class="lazyload"
                                                data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE, $item->image ?? '', $userBs) }}"
                                                alt="Image">
                                        </div>
                                        <h6 class="card-title lc-1 mb-0">
                                            <a target="_self" title="{{ $item->title }}">
                                                {{ $item->title }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-first" data-aos="fade-up">
                    <div class="banner-img img-left mb-40">
                        <div class="lazy-container radius-lg ratio ratio-2-3">
                            @if ($userBs->features_section_image)
                                <img class="lazyload"
                                    data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE, $userBs->features_section_image ?? '', $userBs) }}"
                                    alt="Image">
                            @else
                                <img class="lazyload" data-src="{{ asset('assets/tenant/image/static/no-image.png') }}"
                                    alt="Image">
                            @endif
                        </div>
                        @if ($userBs->feature_url)
                            <a href="{{ $userBs->feature_url }}" class="video-btn youtube-popup p-absolute"
                                title="{{ $keywords['play_video'] ?? __('Play Video') }}">
                                <i class="fas fa-play"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-2 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-3 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-6.png') }}" alt="Shape">
            <img class="shape-4 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-4.png') }}" alt="Shape">
        </div>
    </section>
@endif
