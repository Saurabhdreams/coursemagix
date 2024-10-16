@if ($secInfo->testimonials_section_status == 1)
    <section class="testimonial-area testimonial-area_v2 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title">
                            {{ !empty($secTitleInfo->testimonials_section_title) ? $secTitleInfo->testimonials_section_title : '' }}
                        </h2>
                    </div>
                </div>
            </div>
            @if ($testimonials->count() > 0)
                <div class="row align-items-center gx-xl-5">
                    <div class="col-lg-5">
                        <div class="swiper testimonial-slider mb-40" id="testimonial-slider-1" data-aos="fade-up">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="slider-item bg-white">
                                            <span class="icon"><i class="fas fa-quote-right"></i></span>
                                            <div class="quote">
                                                <p class="text font-lg mb-0">
                                                    {{ $testimonial->comment }}
                                                </p>
                                            </div>
                                            <div class="client-info d-flex align-items-center mt-30">
                                                <div class="client-img">
                                                    <div class="lazy-container rounded-pill ratio ratio-1-1">
                                                        <img class="lazyload"
                                                            data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TESTIMONIAL_CLIENT_IMAGE, $testimonial->image ?? '', $userBs) }}"
                                                            alt="{{ $testimonial->name }}">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h6 class="name mb-0">{{ $testimonial->name }}</h6>
                                                    <span
                                                        class="designation font-sm">{{ $testimonial->occupation }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination" id="testimonial-slider-1-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-7" data-aos="fade-up">
                        <div class="testimonial-images mb-40 ps-lg-5">
                            <div class="wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <img class="lazyload"
                                        data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TESTIMONIAL_CLIENT_IMAGE, $testimonial->image ?? '', $userBs) }}"
                                        alt="{{ $testimonial->name }}">
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="row">
                    <div class="alert alert-secondary">
                        {{ $keywords['no_testimonial_found'] ?? __('No Testimonial Found') }}
                    </div>
                </div>
            @endif

        </div>
    </section>
@endif
