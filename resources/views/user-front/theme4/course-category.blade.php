@if ($secInfo->course_categories_section_status == 1)

    <section class="category-area category-area_v1 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-0">
                            {{ !empty($secTitleInfo->category_section_title) ? $secTitleInfo->category_section_title : '' }}
                            <img class="title-shape lazyload"
                                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/title-shape.png') }}"
                                alt="Shape">
                        </h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    @if (count($categories) > 0)
                        <div class="swiper category-slider" id="category-slider-1" data-slides-per-view="5"
                            data-swiper-loop="false">
                            <div class="swiper-wrapper">
                                @foreach ($categories as $category)
                                    <div class="swiper-slide">
                                        <div class="card p-25 border radius-md">
                                            <div class="card-icon radius-md mb-20"
                                                style="background-color: #{{ $category->color }} !important">
                                                <i class="{{ $category->icon }}"></i>
                                            </div>
                                            <h6 class="card-title lc-1 mb-0">
                                                <a href="{{ route('front.user.courses', [getParam(), 'category' => $category->slug]) }}"
                                                    target="_self" title="{{ $category->name }}">
                                                    {{ $category->name }}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination position-static mt-30" id="category-slider-1-pagination">
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="alert alert-secondary">
                                <p>{{ $keywords['no_course_category_found'] ?? __('No Course Category Found') }}</p>
                            </div>
                        </div>
                    @endif

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
