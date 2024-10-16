<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title title-inline mb-50" data-aos="fade-up">
                <h2 class="title">
                    {{ !empty($secTitleInfo->course_section_title) ? $secTitleInfo->course_section_title : '' }}</span>
                    <img class="title-shape lazyload"
                        data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/title-shape.png') }}"
                        alt="Shape">
                </h2>
                <div class="tabs-navigation">
                    <ul class="nav nav-tabs" data-hover="fancyHover">

                        @if($categories->count() > 0)
                        <li class="nav-item active">
                            <button class="nav-link hover-effect btn-md rounded-pill active" data-bs-toggle="tab"
                                data-bs-target="#all" type="button">{{ $keywords['all'] ?? __('All') }}</button>
                        </li>
                        @endif

                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <button class="nav-link hover-effect btn-md rounded-pill" data-bs-toggle="tab"
                                    data-bs-target="#tab_{{ $category->slug }}"
                                    type="button">{{ $category->name }}</button>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="tab-content" data-aos="fade-up">
                <div class="tab-pane slide show active" id="all">
                    <div class="row">
                        @foreach ($allCourses as $course)
                            @if ($loop->iteration <= 8)
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="product-default border radius-md mb-30">
                                        <figure class="product-img">
                                            <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                title="Image" target="_self" class="lazy-container ratio ratio-2-3">
                                                <img class="lazyload"
                                                    data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $course->thumbnail_image ?? '', $userBs) }}"
                                                    alt="Product">
                                            </a>
                                            <div class="hover-show">
                                                <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                    class="btn btn-md btn-primary rounded-pill"
                                                    title="{{ $keywords['enroll_now'] ?? __('Enroll Now') }}"
                                                    target="_self">{{ $keywords['enroll_now'] ?? __('Enroll Now') }}</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="p-3">
                                                <a href="{{ route('front.user.courses', [getParam(), 'category' => $course->categorySlug]) }}"
                                                    target="_self" title="{{ $course->categoryName }}"
                                                    class="tag font-sm color-primary">{{ $course->categoryName }}</a>

                                                <h6 class="product-title lc-2 mb-0">
                                                    <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                        target="_self" title="Link">
                                                        {{ strlen($course->title) > 45 ? mb_substr($course->title, 0, 45, 'UTF-8') . '...' : $course->title }}
                                                    </a>
                                                </h6>
                                                <div class="authors mt-15">
                                                    <div class="author">
                                                        <img class="lazyload blur-up radius-sm"
                                                            data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $course->instructorImage ?? '', $userBs) }}"
                                                            alt="Image">
                                                        <span class="font-sm">
                                                            <a target="_self" title="{{ $course->instructorName }}">
                                                                {{ strlen($course->instructorName) > 10 ? mb_substr($course->instructorName, 0, 10, 'utf-8') . '...' : $course->instructorName }}
                                                            </a>
                                                        </span>
                                                    </div>
                                                    @php
                                                        $period = $course->duration;
                                                        $array = explode(':', $period);
                                                        $hour = $array[0];
                                                        $courseDuration = \Carbon\Carbon::parse($period);
                                                    @endphp

                                                    <span class="font-sm icon-start"><i
                                                            class="fas fa-clock"></i>{{ $hour == '00' ? '00' : $courseDuration->format('h') }}h
                                                        {{ $courseDuration->format('i') }}m</span>
                                                </div>
                                            </div>
                                            <div class="product-bottom-info px-3 py-2">

                                                <span class="price-area">
                                                    @if ($course->pricing_type == 'premium')
                                                        @if ($course->current_price)
                                                            <i class="fas fa-usd-circle"></i>
                                                            <span class="font-sm font-s-bold">
                                                                {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}{{ $course->current_price }}{{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}
                                                            </span>
                                                        @endif
                                                        @if ($course->previous_price)
                                                            <span class="font-xsm prev">
                                                                <del>
                                                                    {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}{{ $course->previous_price }}{{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}
                                                                </del>
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span
                                                            class="">{{ $keywords['free'] ?? __('Free') }}</span>
                                                    @endif
                                                </span>

                                                <span class="font-sm">
                                                    <i class="fas fa-book-alt"></i>
                                                    @if ($course->moduleCount > 0)
                                                        {{ $course->moduleCount }}
                                                    @endif

                                                    @if ($course->moduleCount > 0)
                                                        @if ($course->moduleCount == 1)
                                                            {{ $keywords['lesson'] ?? __('Lesson') }}
                                                        @else
                                                            {{ $keywords['lessons'] ?? __('Lessons') }}
                                                        @endif
                                                    @else
                                                        {{ $keywords['no_lesson'] ?? __('No Lesson') }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if ($allCourses->count() > 4)
                        <div class="cta-btn text-center mt-15">
                            <a href="{{ route('front.user.courses', getParam()) }}"
                                class="btn btn-lg btn-primary rounded-pill"
                                title="{{ $keywords['view_more'] ?? __('View More') }} "
                                target="_self">{{ $keywords['view_more'] ?? __('View More') }}</a>
                        </div>
                    @endif
                </div>

                @forelse ($categories as $category)
                    <div class="tab-pane slide" id="tab_{{ $category->slug }}">
                        @if (count($category->courseInfoList) > 0)
                            <div class="row">
                                @foreach ($category->courseInfoList()->take(8)->get() as $courseInfo)
                                    @if ($courseInfo->course)
                                        @if ($courseInfo->course->status == 'published')
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <div class="product-default border radius-md mb-30">
                                                    <figure class="product-img">
                                                        <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $courseInfo->slug]) }}"
                                                            title="Image" target="_self"
                                                            class="lazy-container ratio ratio-2-3">
                                                            <img class="lazyload"
                                                                data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $courseInfo->course->thumbnail_image ?? '', $userBs) }}"
                                                                alt="Product">
                                                        </a>
                                                        <div class="hover-show">
                                                            <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $courseInfo->slug]) }}"
                                                                class="btn btn-md btn-primary rounded-pill"
                                                                title="{{ $keywords['enroll_now'] ?? __('Enroll Now') }}"
                                                                target="_self">{{ $keywords['enroll_now'] ?? __('Enroll Now') }}</a>
                                                        </div>
                                                    </figure>
                                                    <div class="product-details">
                                                        <div class="p-3">
                                                            <a href="{{ route('front.user.courses', [getParam(), 'category' => $category->slug]) }}"
                                                                target="_self" title="{{ $category->name }}"
                                                                class="tag font-sm color-primary">{{ $category->name }}</a>
                                                            <h6 class="product-title lc-2 mb-0">
                                                                <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                                    target="_self" title="Link">
                                                                    {{ strlen($courseInfo->title) > 45 ? mb_substr($courseInfo->title, 0, 45, 'UTF-8') . '...' : $courseInfo->title }}
                                                                </a>
                                                            </h6>
                                                            <div class="authors mt-15">
                                                                @if ($courseInfo->instructor)
                                                                    <div class="author">
                                                                        <img class="lazyload blur-up radius-sm"
                                                                            data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $courseInfo->instructor->image ?? '', $userBs) }}"
                                                                            alt="Image">
                                                                        <span class="font-sm">
                                                                            <a href="javaScript:void(0)"
                                                                                target="_self"
                                                                                title="{{ $courseInfo->instructor->name }}">
                                                                                {{ strlen($courseInfo->instructor->name) > 10 ? mb_substr($courseInfo->instructor->name, 0, 10, 'utf-8') . '...' : $courseInfo->instructor->name }}
                                                                            </a>
                                                                        </span>
                                                                    </div>
                                                                @endif

                                                                @php
                                                                    $period = $courseInfo->course->duration;
                                                                    $array = explode(':', $period);
                                                                    $hour = $array[0];
                                                                    $courseDuration = \Carbon\Carbon::parse($period);
                                                                @endphp

                                                                <span class="font-sm icon-start"><i
                                                                        class="fas fa-clock"></i>{{ $hour == '00' ? '00' : $courseDuration->format('h') }}h
                                                                    {{ $courseDuration->format('i') }}m</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-bottom-info px-3 py-2">

                                                            <span class="price-area">
                                                                @if ($course->pricing_type == 'premium')
                                                                    @if ($course->current_price)
                                                                        <i class="fas fa-usd-circle"></i>
                                                                        <span class="font-sm font-s-bold">
                                                                            {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}{{ $courseInfo->course->current_price }}{{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}
                                                                        </span>
                                                                    @endif
                                                                    @if ($course->previous_price)
                                                                        <span class="font-xsm prev">
                                                                            <del>
                                                                                {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}{{ $courseInfo->course->previous_price }}{{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}
                                                                            </del>
                                                                        </span>
                                                                    @endif
                                                                @else
                                                                    <span
                                                                        class="">{{ $keywords['free'] ?? __('Free') }}</span>
                                                                @endif
                                                            </span>
                                                            <span class="font-sm">
                                                                <i class="fas fa-book-alt"></i>
                                                                @if ($courseInfo->module()->where('status', 'published')->count() > 0)
                                                                    {{ $courseInfo->module()->where('status', 'published')->count() }}
                                                                @endif

                                                                @if ($courseInfo->module()->where('status', 'published')->count() > 0)
                                                                    @if ($courseInfo->module()->where('status', 'published')->count() == 1)
                                                                        {{ $keywords['lesson'] ?? __('Lesson') }}
                                                                    @else
                                                                        {{ $keywords['lessons'] ?? __('Lessons') }}
                                                                    @endif
                                                                @else
                                                                    {{ $keywords['no_lesson'] ?? __('No Lesson') }}
                                                                @endif
                                                            </span>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            @if (count($category->courseInfoList) > 8)
                                <div class="cta-btn text-center mt-15">
                                    <a href="{{ route('front.user.courses', [getParam(), 'category' => $category->slug]) }}"
                                        class="btn btn-lg btn-primary rounded-pill"
                                        title="{{ $keywords['view_more'] ?? __('View More') }}"
                                        target="_self">{{ $keywords['view_more'] ?? __('View More') }}</a>
                                </div>
                            @endif
                        @else
                            <div class="row">
                                <h4>{{ $keywords['no_course_found'] ?? __('No Course Found') }} </h4>
                            </div>
                        @endif

                    </div>
                @empty
                  <div class="alert alert-secondary">
                      {{ $keywords['no_featured_course_category_found'] ?? __('No Featured Course Category Found') }}
                  </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
<!-- Shapes -->
<div class="shape">
    <img class="shape-1 lazyload" data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-4.png') }}"
        alt="Shape">
    <img class="shape-2 lazyload" data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-6.png') }}"
        alt="Shape">
    <img class="shape-3 lazyload" data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-2.png') }}"
        alt="Shape">
    <img class="shape-4 lazyload" data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-1.png') }}"
        alt="Shape">
</div>
