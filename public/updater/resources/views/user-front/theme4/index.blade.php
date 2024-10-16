@extends('user-front.common.layout')
@section('pageHeading')
    {{ $keywords['Home'] ?? 'Home' }}
@endsection

@section('metaKeywords')
    @if (!empty($seoInfo))
        {{ $seoInfo->home_meta_keywords }}
    @endif
@endsection

@section('metaDescription')
    @if (!empty($seoInfo))
        {{ $seoInfo->home_meta_description }}
    @endif
@endsection
@section('style')
    <style>
        .requestLoader {
            border: 4px solid #f3f3f3;
            /* Light gray border */
            border-top: 4px solid #3498db;
            /* Blue border on top */
            border-radius: 50%;
            /* Rounded shape */
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            /* Animation properties */
            margin: 0 auto;
            /* Center the loader */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endsection

@section('content')
    <!-- Home-area start-->
    <section class="hero-banner hero-banner_v1 header-next pb-60">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-6">
                    <div class="banner-content mb-40">
                        <h1 class="title mb-30" data-aos="fade-up" data-aos-delay="100">
                            {{ !empty($heroInfo->first_title) ? $heroInfo->first_title : '' }}
                            <img class="title-shape lazyload"
                                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/title-shape.png') }}"
                                alt="Shape">
                        </h1>
                        <p class="text" data-aos="fade-up" data-aos-delay="100">
                            {{ !empty($heroInfo->second_title) ? $heroInfo->second_title : '' }}
                        </p>
                        <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="150">
                            <div class="form-wrapper border rounded-pill bg-white">
                                <form action="{{ route('front.user.courses', getParam()) }}" method="GET">
                                    <div class="row align-items-center">
                                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search"><i class="fas fa-search"></i></label>
                                                <input type="text" id="search" class="form-control" name="keyword"
                                                    placeholder="{{ $keywords['search_course_here'] ?? __('Search Course Here') }}">
                                                <div class="vr"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search"><i class="fas fa-th-large"></i></label>
                                                <select class="niceselect" name="category">
                                                    <option
                                                        data-display=" {{ $keywords['select_category'] ?? __('Select a Category') }}"
                                                        value="">
                                                        {{ $keywords['select_category'] ?? __('Select a Category') }}
                                                    </option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->slug }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-2 col-md-4 col-sm-6">
                                            <button class="btn btn-lg btn-primary rounded-pill w-100" type="submit"
                                                aria-label=" {{ $keywords['find_course'] ?? __('Find Course') }}">

                                                <span> {{ $keywords['find_course'] ?? __('Find Course') }}</span>
                                                <i class="fal fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="banner-image mb-40">
                        @if (!empty($heroInfo))
                            <img class="lazyload blur-up"
                                data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_HERO_SECTION_IMAGE, $heroInfo->image ?? '', $userBs) }}"
                                alt="{{ $keywords['banner_image'] ?? __('Banner Image') }}">
                        @else
                            <img class="lazyload blur-up" data-src="{{ asset('assets/tenant/image/static/no-image.png') }}"
                                alt="{{ $keywords['banner_image'] ?? __('Banner Image') }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Shapes -->
        <div class="shape">
            <img class="shape-1 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-1.png') }}" alt="Shape">
            <img class="shape-2 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-2.png') }}" alt="Shape">
            <img class="shape-3 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-3.png') }}" alt="Shape">
            <img class="shape-4 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-4.png') }}" alt="Shape">
            <img class="shape-5 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-5.png') }}" alt="Shape">
            <img class="shape-6 lazyload"
                data-src="{{ asset('assets/front/theme_4_5_6/assets/images/shape/shape-6.png') }}" alt="Shape">
        </div>
    </section>
    <!-- Home-area end -->
    <!-- Category-area start -->
    @includeif('user-front.theme4.course-category')
    <!-- Category-area end -->
    <!-- About-area start -->
    @includeif('user-front.theme4.about-area')
    <!-- About-area end -->


    {{-- Feature Product-area start  --}}
    @includeif('user-front.theme4.featured-courses')
    <!--Feature Product-area end -->

    <!-- Counter-area start -->
    @includeif('user-front.theme4.counter-area')
    <!-- Counter-area end -->

    <!--course section-->
    @if ($secInfo->courses_section_status == 1)
        <section class="product-area latest ptb-100 lazyloadview d-flex justify-content-center align-items-center"
            data-url="{{ route('front.lazyload', ['viewpage' => 'index', 'part' => 1, getParam()]) }}">
            <div class="requestLoader"></div>
        </section>
    @endif
    <!--course section-->
    <!-- Instructor-area start -->
    @includeif('user-front.theme4.instructor-area')
    <!-- Instructor-area end -->

    <!-- Feature-area start -->
    @includeif('user-front.theme4.feature-area')
    <!-- Feature-area end -->

    <!-- Testimonial-area start -->
    @includeif('user-front.theme4.testimonials')
    <!-- Testimonial-area end -->

    <!-- Newsletter-area start -->
    @includeif('user-front.theme4.newsletter-area')
    <!-- Newsletter-area end -->
@endsection
@section('script')
    @if ($secInfo->courses_section_status == 1)
        <script>
            $(document).ready(function() {
                function loadajax() {
                    var url = $('.lazyloadview').attr('data-url');
                    $.ajax({
                        url: url,
                        type: "get",
                        cache: false,

                    }).done(function(response) {
                        $('.lazyloadview').empty().append(response.page);
                        $("[data-hover='fancyHover']").mouseHover();
                    });
                }
                setTimeout(loadajax, 1000);
            });
        </script>
    @endif
@endsection
