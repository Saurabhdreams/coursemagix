@if ($secInfo->features_section_status == 1)
    <section class="feature-area feature-area_v3 pb-100">
        <div class="banner-img z-1" data-aos="fade-up">
            <div class="lazy-container ratio ratio-21-8">
                <img class="lazyload"
                    data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_FEATURE_SECTION_IMAGE, $userBs->features_section_image ?? '', $userBs) }}"
                    alt="Image">
            </div>
            @if ($userBs->feature_url)
                <a href="{{ $userBs->feature_url }}" class="video-btn youtube-popup p-absolute"
                    title="{{ $keywords['play_video'] ?? __('Play Video') }}">
                    <i class="fas fa-play"></i>
                </a>
            @endif
        </div>
        @includeIf('user-front.theme6.counter-area')
    </section>
@endif
