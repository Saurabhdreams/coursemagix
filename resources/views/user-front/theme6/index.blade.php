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

@section('content')
    <!-- Home-area start-->
    <section class="hero-banner hero-banner_v3 header-next pb-60">
        <div class="container">
            <div class="row align-items-center gx-xl-5">
                <div class="col-lg-6">
                    <div class="banner-content mb-40">
                        <h1 class="title mb-30" data-aos="fade-up" data-aos-delay="100">
                            {{ !empty($heroInfo->first_title) ? $heroInfo->first_title : '' }}
                        </h1>
                        <p class="text" data-aos="fade-up" data-aos-delay="100">
                            {{ !empty($heroInfo->second_title) ? $heroInfo->second_title : '' }}
                        </p>
                        <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="150">
                            <div class="form-wrapper border rounded-pill">
                                <form action="{{ route('front.user.courses', getParam()) }}" method="GET">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search"><i class="fas fa-search"></i></label>
                                                <input type="text" id="search" class="form-control" name="keyword"
                                                    placeholder="{{ $keywords['search_course_here'] ?? __('Search Course Here') }}">
                                                <div class="vr"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <label for="search"><i class="fas fa-th-large"></i></label>
                                                <select class="niceselect" name="category">
                                                    <option data-display="Select Category" value="">
                                                        {{ $keywords['select_category'] ?? __('Select a Category') }}
                                                    </option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->slug }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <button class="btn btn-lg btn-primary btn-gradient rounded-pill w-100"
                                                type="submit"
                                                aria-label=" {{ $keywords['find_course'] ?? __('Find Course') }}">
                                                {{ $keywords['find_course'] ?? __('Find Course') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="banner-image mb-40">
                        @if (!is_null($heroInfo))
                            <img class="lazyload blur-up"
                                data-src="{{ \App\Http\Helpers\Uploader::getImageUrl(Constant::WEBSITE_HERO_SECTION_IMAGE, $heroInfo->image ?? '', $userBs) }}"
                                alt="Banner Image">
                        @else
                            <img class="lazyload blur-up" data-src="{{ asset('assets/tenant/image/static/no-image.png') }}"
                                alt="Banner Image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Bg shapes -->
        <div class="shapes">
            <span class="shape"></span>
            <span class="shape"></span>
            <span class="shape"></span>
        </div>
    </section>
    <!-- Home-area end -->

    <!-- Category-area start -->
    @includeIf('user-front.theme6.course-category')
    <!-- Category-area end -->

    <!-- Product-area start -->
    @includeIf('user-front.theme6.featured-course')
    <!-- Product-area end -->

    <!-- Feature-area start -->
    @includeIf('user-front.theme6.featured-area')
    <!-- Feature-area end -->

    <!-- Product-area start -->
    @includeIf('user-front.theme6.featured-course-category')
    <!-- Product-area end -->

    <!-- Instructor-area start -->
    @include('user-front.theme6.instructors')
    <!-- Instructor-area end -->

    <!-- Testimonial-area start -->
    @includeIf('user-front.theme6.testimonials')
    <!-- Testimonial-area end -->

    <!-- Newsletter-area start -->
    @includeIf('user-front.theme6.newsletter')
    <!-- Newsletter-area end -->
@endsection
