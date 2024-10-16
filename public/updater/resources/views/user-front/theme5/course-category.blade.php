@if ($secInfo->course_categories_section_status == 1)
    <section class="category-area category-area_v2 pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-0">
                            {{ !empty($secTitleInfo->category_section_title) ? $secTitleInfo->category_section_title : '' }}
                        </h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    @if (count($categories) > 0)
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="card radius-md mb-25">
                                        <a href="{{ route('front.user.courses', [getParam(), 'category' => $category->slug]) }}"
                                            target="_self" title="{{ $category->name }}">
                                            <div class="card-img">
                                                <img class="lazyload"
                                                    data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_COURSE_CATEGORY_SECTION_IMAGE, $category->image ?? '', $userBs) }}"
                                                    alt="{{ $category->name }}">
                                            </div>
                                            <div class="card-text text-center">
                                                <h5 class="card-title color-white mb-1">{{ $category->name }}</h5>
                                                @if ($category->courseInfoList->count() > 0)
                                                    @if ($category->courseInfoList->count() == 1)
                                                        <span class="font-sm">
                                                            {{ $category->courseInfoList->count() }}
                                                            {{ $keywords['course'] ?? __('Course') }}

                                                        </span>
                                                    @else
                                                        <span class="font-sm">
                                                            {{ $category->courseInfoList->count() }}
                                                            {{ $keywords['courses'] ?? __('Courses') }}
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="font-sm">
                                                        {{ $keywords['no_course_found'] ?? __('No Course Found') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row text-center">
                            <div class="col">
                                <div class="alert alert-secondary">
                                    {{ $keywords['no_course_category_found'] ?? __('No Course Category Found') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
