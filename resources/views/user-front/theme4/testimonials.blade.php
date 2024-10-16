@if ($secInfo->testimonials_section_status == 1)
    <section class="testimonial-area testimonial-area_v1 pb-60">
        <div class="container">
            <div class="row align-items-center justify-content-between gx-xl-5">
                <div class="col-lg-5" data-aos="fade-up">
                    <div class="content-title mb-30">
                        <h2 class="title">
                            {{ !empty($secTitleInfo->testimonials_section_title) ? $secTitleInfo->testimonials_section_title : '' }}
                            <img class="title-shape lazyload"
                                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/title-shape.png') }}"
                                alt="Shape">
                        </h2>
                    </div>
                    @if ($testimonials->count() > 0)
                        <div class="swiper testimonial-slider mb-40" id="testimonial-slider-1">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="slider-item bg-white">
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
                    @else
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-secondary">
                                    {{ $keywords['no_testimonial_found'] ?? __('No Testimonial Found') }}
                                </div>
                            </div>
                        </div>

                    @endif
                </div>

                <div class="col-lg-6" data-aos="fade-up">
                    <div class="testimonial-images pb-10">
                        <div class="row align-items-center">
                            <div class="col-sm-12" data-aos="fade-up">
                                <div class="lazy-container radius-md mb-30 ratio ratio-1-2">
                                    @if (!empty($testimonialData->testimonials_section_image))
                                        <img class="lazyload blur-up"
                                            data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_TESTIMONIAL_SECTION_IMAGE, $testimonialData->testimonials_section_image ?? '', $userBs) }}"
                                            alt="Client Image">
                                    @else
                                        <img class="lazyload blur-up"
                                            data-src="{{ asset('assets/tenant/image/static/no-image.png') }}"
                                            alt="Testimonial Section Image">
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif
