@if ($secInfo->course_categories_section_status == 1)
    <section class="category-area category-area_v3 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">
                            {{ !empty($secTitleInfo->category_section_title) ? $secTitleInfo->category_section_title :'' }}
                        </h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    @if (count($categories) > 0)
                        <div class="swiper category-slider" id="category-slider-3" data-slides-per-view="4"
                            data-swiper-loop="true">
                            <div class="swiper-wrapper">
                                @foreach ($categories as $category)
                                    <div class="swiper-slide">

                                        <div class="card p-25 border radius-md">
                                            <div class="card-img mb-20">
                                                <a
                                                    href="{{ route('front.user.courses', [getParam(), 'category' => $category->slug]) }}">
                                                    <img class="lazyload"
                                                        data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_CATEGORY_SECTION_IMAGE, $category->image ?? '', $userBs) }}"
                                                        alt="{{ $category->name }}">
                                                </a>
                                            </div>
                                            <h5 class="card-title lc-1 mb-1">
                                                <a href="{{ route('front.user.courses', [getParam(), 'category' => $category->slug]) }}"
                                                    title="{{ $category->name }}">
                                                    {{ $category->name }}
                                                </a>
                                            </h5>
                                            <p class="card-text">
                                                @if ($category->courseInfoList->count() > 0)
                                                    @if ($category->courseInfoList->count() == 1)
                                                        {{ $category->courseInfoList->count() }}

                                                        {{ $keywords['course'] ?? __('Course') }}
                                                    @else
                                                        {{ $category->courseInfoList->count() }}
                                                        {{ $keywords['courses'] ?? __('Courses') }}
                                                    @endif
                                                @else
                                                    {{ __('No') }} {{ __('Course Found !') }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="swiper-pagination swiper-pagination_gradient position-static mt-30"
                                id="category-slider-3-pagination"></div>
                        </div>
                    @else
                        <div class="col">
                            <div class="alert alert-secondary">
                                {{ $keywords['no_course_category_found'] ?? __('No Course Category Found') }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endif
