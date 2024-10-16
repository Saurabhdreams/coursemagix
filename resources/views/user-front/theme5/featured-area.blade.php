@if ($secInfo->features_section_status == 1)
    <section class="feature-area feature-area_v2 pb-100">
        <div class="banner-img z-1" data-aos="fade-up">
            <div class="lazy-container ratio ratio-21-8">
                @if($userBs->features_section_image)
                <img class="lazyload"
                    data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE, $userBs->features_section_image ?? '', $userBs) }}"
                    alt="Image">
                    @else
                      <img class="lazyload" data-src="{{ asset('assets/tenant/image/static/no-image.png') }}"
                                    alt="Image">
                    @endif
            </div>
            @if($userBs->feature_url)
            <a href="{{ $userBs->feature_url }}" class="video-btn youtube-popup p-absolute"
                title=" {{ $keywords['play_video'] ?? __('Play Video') }}">
                <i class="fas fa-play"></i>
            </a>
            @endif
        </div>
        @if($features->count() > 0)
        <div class="feature-cards mtn-50" data-aos="fade-up">
            <div class="container">
                <div class="wrapper bg-white shadow-md radius-md px-30 pb-30">
                    <div class="row">
                        @foreach ($features as $item)
                            <div class="col-sm-2">
                                <div class="card text-center mt-30">
                                    <div class="card-icon mx-auto mb-20">
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
                    <div class="arrows d-none d-lg-block">
                        @foreach ($features as $item)
                            @if ($loop->last)
                            @else
                                <img class="arrow lazyload"
                                    data-src="{{ asset('assets/front/theme_4_5_6/assets/images/icon/line-arrow-2.png') }}"
                                    alt="Image">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
@endif
