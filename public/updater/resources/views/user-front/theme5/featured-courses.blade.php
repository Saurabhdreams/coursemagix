@if ($secInfo->featured_courses_section_status == 1)
    @php
        $totalCourses = count($courses);
    @endphp
    <section class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">
                            {{ !empty($secTitleInfo->featured_courses_section_title) ? $secTitleInfo->featured_courses_section_title : '' }}
                        </h2>

                        @if ($totalCourses > 0)
                        <div class="cta-btn">
                            <a href="{{ route('front.user.courses', getParam()) }}"
                                class="btn btn-lg btn-primary radius-sm"
                                title="{{ $keywords['see_all_course'] ?? __('See All Course') }}"
                                target="_self">{{ $keywords['see_all_course'] ?? __('See All Course') }}</a>
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
                                    @include('user-front.theme5.course')
                                @endforeach
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination position-static" id="product-slider-1-pagination"></div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-secondary">
                            {{ $keywords['no_featured_course_found'] ?? __('No Featured Course Found') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
