@if ($secInfo->featured_courses_section_status == 1)
    @php
        $totalCourses = count($courses);
    @endphp
    <section class="product-area popular ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">
                            {{ !empty($secTitleInfo->featured_courses_section_title) ? $secTitleInfo->featured_courses_section_title : '' }}
                            <img class="title-shape lazyload"
                                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/title-shape.png') }}"
                                alt="Shape">
                        </h2>
                        @if ($totalCourses > 0)
                            <div class="cta-btn">
                                <a href="{{ route('front.user.courses', getParam()) }}"
                                    class="btn btn-lg btn-primary rounded-pill" title="{{ __('See All Course') }}"
                                    target="_self">{{ $keywords['See_All_Course'] ?? __('See All Course') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
                @if ($totalCourses > 0)
                    <div class="col-12">
                        <!-- Slider main container -->
                        <div class="swiper product-slider" id="product-slider-1" data-slides-per-view="4"
                            data-swiper-loop="false" data-aos="fade-up">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">

                                @foreach ($courses as $course)
                                    @include('user-front.theme4.course')
                                @endforeach


                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination position-static" id="product-slider-1-pagination"></div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-secondary" role="alert">
                            {{ $keywords['no_featured_course_found'] ?? __('No Featured Course Found') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-4.png') }}" alt="Shape">
            <img class="shape-2 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-3 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-4 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-6.png') }}" alt="Shape">
        </div>
    </section>
@endif
