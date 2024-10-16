@if ($secInfo->about_us_section_status == 1)
    <section class="about-area about-area_v1 pt-100 pb-60 bg-primary-light">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="image mb-40 img-left">
                        @if (!empty($aboutUsInfo))
                            <img class="lazyload blur-up"
                                data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_ABOUT_US_SECTION_IMAGE, $aboutUsInfo->image ?? '', $userBs) }}"
                                alt="Image">
                        @else
                            <img class="lazyload blur-up"
                                data-src="{{ asset('assets/tenant/image/static/no-image.png') }}" alt="Image">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="content-title mb-40">
                        <h2 class="title mb-30">
                            {{ !empty($aboutUsInfo->title) ? $aboutUsInfo->title : __('About Us') }}
                            <img class="title-shape lazyload"
                                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/title-shape.png') }}"
                                alt="Shape">
                        </h2>
                        <div class="content-text">
                            <p>
                                {{ !empty($aboutUsInfo->text) ? $aboutUsInfo->text : '' }}
                            </p>
                        </div>
                        <div class="info-list mt-40">
                            @foreach ($aboutSectionPoints as $point)
                                <div class="card bg-none mb-30">
                                    <div class="card-icon radius-md">
                                        <i class="{{ $point->icon }}"></i>
                                    </div>
                                    <div class="card-content">
                                        <h6 class="card-title mb-2">{{ $point->title }}</h6>
                                        <p class="card-text">{{ $point->text }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-2 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-3 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-4.png') }}" alt="Shape">
        </div>
    </section>
@endif
