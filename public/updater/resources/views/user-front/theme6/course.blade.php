<div class="row g-0 product-default product-column border radius-md mb-25 align-items-center">
    <figure class="product-img col-sm-12 col-xl-5">
        <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}" title="Image"
            target="_self" class="lazy-container radius-md ratio ratio-5-4">
            <img class="lazyload"
                data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_THUMBNAIL_IMAGE, $course->thumbnail_image ?? '', $userBs) }}"
                alt="Product">
        </a>
        <div class="hover-show radius-md">
            <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}"
                class="btn btn-md btn-primary btn-gradient rounded-pill"
                title="{{ $keywords['enroll_now'] ?? __('Enroll Now') }}"
                target="_self">{{ $keywords['enroll_now'] ?? __('Enroll Now') }}</a>
        </div>
    </figure>
    <div class="product-details col-sm-12 col-xl-7 ps-xl-2">
        <div class="p-3">
            <a href="{{ route('front.user.courses', [getParam(), 'category' => $course->categorySlug]) }}"
                target="_self" title="{{ $course->categoryName }}"
                class="tag font-sm color-primary">{{ $course->categoryName }}</a>
            <h6 class="product-title lc-2 mb-0">
                <a href="{{ route('front.user.course.details', [getParam(), 'slug' => $course->slug]) }}" target="_self"
                    title="Link">
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
                        <span class="">{{ $keywords['free'] ?? __('Free') }}</span>
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
