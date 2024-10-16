@if ($secInfo->courses_section_status == 1)
    <section class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title">
                            {{ !empty($secTitleInfo->course_section_title) ? $secTitleInfo->course_section_title : '' }}
                        </h2>
                        <div class="tabs-navigation tabs-navigation_gradient">
                            <ul class="nav nav-tabs" data-hover="fancyHover">
                                @if($categories->count() > 0)
                                <li class="nav-item active">
                                    <button class="nav-link hover-effect active btn-md rounded-pill"
                                        data-bs-toggle="tab" data-bs-target="#all"
                                        type="button">{{ $keywords['all'] ?? __('All') }}</button>
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
                                    @if ($loop->iteration <= 6)
                                        <div class="col-xl-6 col-lg-4 col-sm-6">
                                            <div
                                                class="row g-0 product-default product-column border radius-md mb-25 align-items-center">
                                                <figure class="product-img col-sm-12 col-xl-5">
                                                    <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                        title="Image" target="_self"
                                                        class="lazy-container radius-md ratio ratio-5-4">
                                                        <img class="lazyload"
                                                            data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $course->thumbnail_image ?? '', $userBs) }}"
                                                            alt="Product">
                                                    </a>
                                                    <div class="hover-show radius-md">
                                                        <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                            class="btn btn-md btn-primary btn-gradient rounded-pill"
                                                            title="{{ $keywords['enroll_now'] ?? __('Enroll Now') }}"
                                                            target="_self">
                                                            {{ $keywords['enroll_now'] ?? __('Enroll Now') }} </a>
                                                    </div>
                                                </figure>
                                                <div class="product-details col-sm-12 col-xl-7 ps-xl-2">
                                                    <div class="p-3">
                                                        <a href="{{ route('front.user.courses', [getParam(), 'category' => $course->categorySlug]) }}"
                                                            target="_self" title="{{ $course->categoryName }}"
                                                            class="tag font-sm color-primary">{{ $course->categoryName }}</a>
                                                        <h6 class="product-title lc-2 mb-0">
                                                            <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                                target="_self" title="{{ $course->title }}">
                                                                {{ strlen($course->title) > 45 ? mb_substr($course->title, 0, 45, 'UTF-8') . '...' : $course->title }}
                                                            </a>
                                                        </h6>
                                                        <div class="authors mt-15">
                                                            <div class="author">
                                                                <img class="lazyload blur-up radius-sm"
                                                                    data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_INSTRUCTOR_IMAGE, $course->instructorImage ?? '', $userBs) }}"
                                                                    alt="Image">
                                                                <span class="font-sm">
                                                                    <a target="_self"
                                                                        title="{{ $course->instructorName }}">
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
                                                                    class="fas fa-clock"></i>{{ $hour == '00' ? '00' : $courseDuration->format('h') }}{{ __('h') }}
                                                                {{ $courseDuration->format('i') }}{{ __('m') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="px-xl-3 mb-1">
                                                        <div class="product-bottom-info py-2 px-3 px-xl-0">
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

                                                            <span class="font-sm"><i class="fas fa-book-alt"></i>
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
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @if ($allCourses->count() > 6)
                                <div class="cta-btn text-center mt-15">
                                    <a href="{{ route('front.user.courses', getParam()) }}"
                                        class="btn btn-lg btn-primary btn-gradient rounded-pill"
                                        title="{{ $keywords['view_more'] ?? __('View More') }}"
                                        target="_self">{{ $keywords['view_more'] ?? __('View More') }} </a>
                                </div>
                            @endif
                        </div>

                        @foreach ($categories as $category)
                            <div class="tab-pane slide" id="tab_{{ $category->slug }}">
                                @if (count($category->courseInfoList) > 0)
                                    <div class="row">
                                        @foreach ($category->courseInfoList()->take(6)->get() as $courseInfo)
                                            @if ($courseInfo->course)
                                                @if ($courseInfo->course->status == 'published')
                                                    <div class="col-xl-6 col-lg-4 col-sm-6">
                                                        <div
                                                            class="row g-0 product-default product-column border radius-md mb-25 align-items-center">
                                                            <figure class="product-img col-sm-12 col-xl-5">
                                                                <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                                    title="Image" target="_self"
                                                                    class="lazy-container radius-md ratio ratio-5-4">
                                                                    <img class="lazyload"
                                                                        data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $courseInfo->course->thumbnail_image ?? '', $userBs) }}"
                                                                        alt="Product">
                                                                </a>
                                                                <div class="hover-show radius-md">
                                                                    <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $courseInfo->slug]) }}"
                                                                        class="btn btn-md btn-primary btn-gradient rounded-pill"
                                                                        title="{{ $keywords['enroll_now'] ?? __('Enroll Now') }}"
                                                                        target="_self">{{ $keywords['enroll_now'] ?? __('Enroll Now') }}</a>
                                                                </div>
                                                            </figure>
                                                            <div class="product-details col-sm-12 col-xl-7 ps-xl-2">
                                                                <div class="p-3">
                                                                    @if ($courseInfo->courseCategory)
                                                                        <a href="{{ route('front.user.courses', [getParam(), 'category' => $courseInfo->courseCategory->slug]) }}"
                                                                            target="_self"
                                                                            title="{{ $courseInfo->courseCategory->name }}"
                                                                            class="tag font-sm color-primary">{{ $courseInfo->courseCategory->name }}</a>
                                                                    @endif

                                                                    <h6 class="product-title lc-2 mb-0">
                                                                        <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                                                                            target="_self"
                                                                            title="{{ $courseInfo->title }}">
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
                                                                                    <a target="_self"
                                                                                        title="{{ $courseInfo->instructor->name }}">
                                                                                        {{ strlen($courseInfo->instructor->name) > 10 ? mb_substr($courseInfo->instructor->name, 0, 10, 'utf-8') . '...' : $courseInfo->instructor->name }}
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                        @endif
                                                                        @php
                                                                            $period = $courseInfo->course ? $courseInfo->course->duration : 0;
                                                                            $array = explode(':', $period);
                                                                            $hour = $array[0];
                                                                            $courseDuration = \Carbon\Carbon::parse($period);
                                                                        @endphp
                                                                        <span class="font-sm icon-start"><i
                                                                                class="fas fa-clock"></i>{{ $hour == '00' ? '00' : $courseDuration->format('h') }}{{ __('h') }}
                                                                            {{ $courseDuration->format('i') }}{{ __('m') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="px-xl-3 mb-1">
                                                                    <div class="product-bottom-info py-2 px-3 px-xl-0">


                                                                        @if ($courseInfo->course)
                                                                            <span class="price-area">
                                                                                @if ($courseInfo->course->pricing_type == 'premium')
                                                                                    @if ($courseInfo->course->current_price)
                                                                                        <i
                                                                                            class="fas fa-usd-circle"></i>
                                                                                        <span
                                                                                            class="font-sm font-s-bold">
                                                                                            {{ $currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : '' }}{{ $courseInfo->course->current_price }}{{ $currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : '' }}
                                                                                        </span>
                                                                                    @endif
                                                                                    @if ($courseInfo->course->previous_price)
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
                                                                        @endif


                                                                        <span class="font-sm"><i
                                                                                class="fas fa-book-alt"></i>
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
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    @if (count($category->courseInfoList) > 6)
                                        <div class="cta-btn text-center mt-15">
                                            <a href="{{ route('front.user.courses', [getParam(), 'category' => $category->slug]) }}"
                                                class="btn btn-lg btn-primary rounded-pill"
                                                title="{{ $keywords['view_more'] ?? __('View More') }}"
                                                target="_self">{{ $keywords['view_more'] ?? __('View More') }}</a>
                                        </div>
                                    @endif
                                @else
                                    <div class="row">
                                        <h4> {{ $keywords['no_course_found'] ?? __('No Course Found') }} </h4>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
